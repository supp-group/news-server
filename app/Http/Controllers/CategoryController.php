<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::orderBy('id' ,'desc')->get();
        foreach($categories as  $category)
        {
            if($category->parent_id>0)
            {
                $parent = Category::find( $category->parent_id);
                $category->parent_name = $parent->category_name;
            }
        }

        if(auth()->user()->role == "admin"){
            return view('admin.category.show', compact('categories'));
        }
        else if(auth()->user()->role == "composer"){
            return view('composer.category.show', compact('categories'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $parents=Category::all();

        if(auth()->user()->role == "admin"){
            return view('admin.category.add', compact('parents'));
        }
        else if(auth()->user()->role == "composer"){
            return view('composer.category.add', compact('parents'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse 
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|unique:categories|max:255',
            'parent_id' => 'required',
            'category_description' => 'required',
            'category_image' => 'image|required',
            'slug' => 'required',
        ]);

        // store image
        if($request->hasfile('category_image')){
            $img = $request->file('category_image');
            $img_name = $img->getClientOriginalName();
            $img->move(public_path('images'), $img_name);
        }
     
        Category::create([
            'category_name'=>$request->category_name,
            'category_description'=>$request->category_description,
            'category_image' => $request->category_image->getClientOriginalName(),
            'parent_id' => $request->parent_id,
            'slug'=>Str::slug($request->slug),
        ]);

        // return redirect('/cpanel/category/show');

        session()->flash('Add', 'تم إضافة التصنيف بنجاح');
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
        $parents=Category::where('id', '!=', $id)->get();
        $category = Category::findorFail($id);

        if(auth()->user()->role == "admin"){
            return view('admin.category.edit', compact('category', 'parents'));
        }
        else if(auth()->user()->role == "composer"){
            return view('composer.category.edit', compact('category', 'parents'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $category = Category::findorFail($id);
        $category->update([
            'category_name'=>$request->category_name,
            'category_description'=>$request->category_description,
            'category_image' => $request->category_image,
            'parent_id' => $request->parent_id,
            'slug'=>Str::slug($request->slug),
        ]);

        session()->flash('Edit', 'تم تعديل التصنيف بنجاح');
        return back(); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::findorFail($id)->delete();
        session()->flash('delete', 'تم حذف التصنيف بنجاح');
        return back();
    }
}
