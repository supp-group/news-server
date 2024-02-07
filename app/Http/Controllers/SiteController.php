<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Comment;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id' ,'desc')->get();
        $news = News::orderBy('id' ,'desc')->get();
        // $comments = Comment::all();


        // $comments = Comment::where('news_id', $news->id)->get();

        $count = News::count();
        return view('site.home', compact('categories', 'news', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    // public function add_comment(Request $request)
    // {
    //     if(Auth::id()){
    //         $comment = new Comment();
    //         $comment->user_id = Auth::user()->id;
    //         $comment->content = $request->content;
    //         $comment->save();
            
    //         return redirect()->back();
    //     }
    //     else{
    //         return redirect('login');
    //     }
    // }


}

