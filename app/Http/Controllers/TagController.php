<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Tags; 

use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags=Tags::orderBy('id' ,'desc')->get();

        if(auth()->user()->role == "admin"){
            return view('admin.tags.show', compact('tags'));
        }
        else if(auth()->user()->role == "composer"){
            return view('composer.tags.show', compact('tags'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->role == "admin"){
        return view('admin.tags.add');
        }
        else if(auth()->user()->role == "composer"){
            return view('composer.tags.add');
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'tag_name' => 'required|unique:tags|max:255',
            'tag_description' => 'required',
            'slug' => 'required',
        ]);

        Tags::create([
            'tag_name'=>$request->tag_name,
            'tag_description'=>$request->tag_description, 
            'slug'=>Str::slug($request->slug),
        ]);

        session()->flash('Add', 'تم إضافة الوسم بنجاح');
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
        $tag = Tags::findOrFail($id);

        if(auth()->user()->role == "admin"){
        return view('admin.tags.edit', compact('tag'));
        }
        else if(auth()->user()->role == "composer"){
            return view('composer.tags.edit', compact('tag'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tag = Tags::findorFail($id);
        $tag->update([
            'tag_name'=>$request->tag_name,
            'tag_description'=>$request->tag_description,
            'slug'=>Str::slug($request->slug),
        ]);

        session()->flash('Edit', 'تم تعديل الوسم بنجاح');
        return back(); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Tags::findorFail($id)->first()->delete();
        session()->flash('delete', 'تم حذف الوسم بنجاح');
        return back();
    }
}
