<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\News;
use App\Models\Category;
use App\Models\Tags;
use App\Models\NewsTags;
use App\Models\User;

use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news=News::orderBy('id' ,'desc')->get();
        $tags=Tags::orderBy('id' ,'desc')->get();

        // for show tag_name in blade using pivot table---->news_tags
        $results = DB::table('news_tags')
        ->join('news', 'news.id', 'news_tags.news_id')
        ->join('tags', 'tags.id', 'news_tags.tag_id')
        ->select('tags.tag_name')
        ->get()->pluck('tag_name');
 
        if(auth()->user()->role == "admin"){
            return view('admin.news.show', compact('news', 'tags', 'results'));
        }
        else if(auth()->user()->role == "composer"){
            return view('composer.news.show', compact('news', 'tags', 'results'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tags::all();

        if(auth()->user()->role == "admin"){
            return view('admin.news.add', compact('categories', 'tags'));
        }
        else if(auth()->user()->role == "composer"){
            return view('composer.news.add', compact('categories', 'tags'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {
        // return dd($request->all());
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:news|max:255',
            'content' => 'required',
            'news_image' => 'image|required',
            'composer_id' => 'required',
            'category_id' => 'required',
            'status' => 'required',
            'slug' => 'required',
        ]);

        // store image
        if($request->hasfile('news_image')){
            $img = $request->file('news_image');
            $img_name = $img->getClientOriginalName();
            $img->move(public_path('images'), $img_name);
        }

        News::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'news_image' => $request->news_image->getClientOriginalName(),
            'composer_id'=>auth()->id(),
            'category_id'=>$request->category_id,
            'status'=>$request->status,
            'slug'=>Str::slug($request->slug),
        ]);

        foreach($request->tag_id as $tag)
        {
            $news = News::latest()->first()->id;
            NewsTags::create([
                'news_id'=> $news,
                'tag_id'=> $tag,
            ]);
        }

        session()->flash('Add', 'تم إضافة الخبر بنجاح');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories=Category::all();
        $tags=Tags::all();
        $new = News::findOrFail($id);

        if(auth()->user()->role == "admin"){
            return view('admin.news.edit', compact('new', 'categories', 'tags'));
        }
        else if(auth()->user()->role == "composer"){
            return view('composer.news.edit', compact('new', 'categories', 'tags'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $new = News::findorFail($id);

        $new->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'news_image' => $request->news_image,
            // 'composer_id'=>$request->composer_id,
            'category_id'=>$request->category_id,
            'status'=>$request->status,
            'slug'=>Str::slug($request->slug),
        ]);

        session()->flash('Edit', 'تم تعديل الخبر بنجاح');
        return back(); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        News::findorFail($id)->first()->delete();
        session()->flash('delete', 'تم حذف التصنيف بنجاح');
        return back();
    }



    // public function newsList()
    // {
    //     $news = News::all();

    //     return view('admin.news.likes',compact('news'));
    // }



    // public function like(News $new)
    // {
    //     $new->toggleLike();
    
    //     return back();
    // }
    
    // public function unlike(News $new)
    // {
    //     $new->toggleLike();

    //     return back();
    // }


}
