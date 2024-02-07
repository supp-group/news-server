<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;
use App\Models\News;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::orderBy('id' ,'desc')->get();
        return view('admin.news.comments', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // if(auth()->user()){
            return view('site.news.new');
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id): RedirectResponse
    {
        $validator = $request->Validate([
            'content' => 'required|min:5|max:255', 
            'user_id' => 'required', 
        ]);

        Comment::create([
            'content'=>$request->content,
            'news_id'=>$id,
            'user_id'=>$request->user_id,
        ]);

        session()->flash('Add', 'تم إضافة التعليق بنجاح');
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
        $comment = Comment::findorFail($id);
        return view('admin.news.edit_comment', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::findorFail($id);

        $comment->update([
            'content'=>$request->content,
            'status'=>$request->status,
            // 'slug'=>Str::slug($request->slug),
        ]);

        session()->flash('Edit', 'تم تعديل التعليق بنجاح');
        return back(); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Comment::findorFail($id)->delete();
        session()->flash('delete', 'تم حذف التعليق بنجاح');
        return back();
    }
    


    public function show_news($id)
    {
        $news = News::where('id', $id)->get();
        $comments = Comment::where('news_id', $id)->get();

        return view('site.news.new', compact('news', 'comments'));
    }

}
