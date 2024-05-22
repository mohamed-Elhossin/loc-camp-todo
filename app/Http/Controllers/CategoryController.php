<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $auth_name = Auth::user()->name;
        if (Auth::user()->rule_id == 1) {
            $categories = Category::all();
        } else {
            $categories = Category::where('for_user', $auth_name)->get();
        }
        // SELECT * FROM `caregories_tasks_count`
        $counts =     DB::table('categories')
            ->leftJoin('passwords', 'categories.id', '=', 'passwords.category_id')
            ->select(
                'categories.id as id',
                'categories.title as title',
                DB::raw('COUNT(passwords.id) as all_tasks'),
                DB::raw("SUM(CASE WHEN passwords.status = 'waiting' THEN 1 ELSE 0 END) as waiting_count"),
                DB::raw("SUM(CASE WHEN passwords.status = 'done' THEN 1 ELSE 0 END) as done_count"),
                DB::raw("SUM(CASE WHEN passwords.status = 'In progress' THEN 1 ELSE 0 END) as in_progress")
            )
            ->groupBy('categories.id', 'categories.title')
            ->get();
        // dd($counts);
        return view('dashboard', compact('categories', 'counts'));
    }
    public function list()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        return view('categories.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
        $category = new Category();
        $category->title = $request->title;
        $category->description = $request->description;
        $category->for_user = $request->user;
        $category->save();
        return redirect()->back()->with('done', "Creat Category Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
        $category = Category::find($id);
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('category.list')->with('done', "Creat Category Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return redirect()->back()->with('done', "Delete Category Successfully");
    }
}
