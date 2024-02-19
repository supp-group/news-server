<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Comment;
use App\Models\Like;
class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id' ,'desc')->get();
        $news = News::orderBy('id' ,'desc')->get();
        $likes = Like::get();

        $count = News::count();
        return view('site.home', compact('categories', 'news', 'count', 'likes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.home');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $like = new Like();
        $like->news_id = $id;
        $like->user_id = auth()->id();
        $like->save();

        return back();
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
    public function destroy($id)
    {
        $dis = Like::where('news_id', $id)->where('user_id' ,auth()->id())->first();
        if($dis)
        $dis->delete();
        return back();
    }



    public function insert_like($id){

        $insert = Like::where('news_id', $id)->where('user_id' ,auth()->id())->first();
        if($insert == null)
        {
            $like = new Like();
            $like->news_id = $id;
            $like->user_id = auth()->id();
            $like->save();
        }
        return back();
    }

}
