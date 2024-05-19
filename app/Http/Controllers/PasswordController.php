<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Password;
use Illuminate\Http\Request;


class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $passwords = Password::where('category_id', '=', $id)
            ->orderBy('status', 'desc')
            // ->orderBy('created_at', 'desc')
            ->get();

        return view('passwords.index', compact('passwords'));
    }
    public function showPassword($id)
    {
        $password = Password::find($id);
        return view('passwords.showPassword', compact('password'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $category = Category::find($id);

        return view('passwords.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => 'required|string',
            'password' => 'required|string',
        ]);
        $passwords = new Password();
        $passwords->title = $request->title;
        $passwords->description =  $request->password;
        $passwords->category_id = $request->categoryId;
        $passwords->save();
        return redirect()->back()->with('done', "create  Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Password $password)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $passwords =  Password::find($id);
        if ($passwords->status == 'wating') {
            $passwords->status = 'In progress';
            $passwords->save();
            return redirect()->back()->with('done', "Change To  In progress");
        } else if ($passwords->status == 'In progress') {
            $passwords->status = 'Done';
            $passwords->save();
            return redirect()->back()->with('done', "Change To  Done");
        }else{
            $passwords->status = 'wating';
            $passwords->save();
            return redirect()->back()->with('done', "Change To  wating");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Password $password)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $password = Password::find($id);
        $password->delete();
        return redirect()->back()->with('done', "Delete Password Successfully");
    }
}
