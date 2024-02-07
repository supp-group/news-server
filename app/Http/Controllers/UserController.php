<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::orderBy('id' ,'desc')->get();

        return view('admin.user.show', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'mobile' => 'required|unique:users',
            'role' => 'required',
            'status' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        User::create([
            'name'=>$request->name,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'address'=>$request->address,
            'mobile'=>$request->mobile,
            'role'=>$request->role,
            'status'=>$request->status,
            'email'=>$request->email,
            'password'=>$request->password,   
        ]);

        session()->flash('Add', 'تم إضافة المستخدم بنجاح');
        return back();

        // return redirect('/home');
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
        $user=User::findorFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findorFail($id);
        $user->update([
            'name'=>$request->name,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'address'=>$request->address,
            'mobile'=>$request->mobile,
            'role'=>$request->role,
            'status'=>$request->status,
            'email'=>$request->email,
            'password'=>$request->password,   
        ]);

        session()->flash('Edit', 'تم تعديل المستخدم بنجاح');
        return back(); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::findorFail($id)->first()->delete();
        session()->flash('delete', 'تم حذف المستخدم بنجاح');
        return back();
    }



    public function permission()
    {
        $admin=User::where('role','admin')->count();
        $composer=User::where('role','composer')->count();
        $visitor=User::where('role','visitor')->count();
 
        return view('admin.user.permission', compact('admin', 'composer', 'visitor'));
    }
}
