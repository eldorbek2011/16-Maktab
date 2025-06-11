<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Categorychildren;
use Illuminate\Http\Request;
use \App\Models\empCategory;

class ChildrenCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $childrens = Categorychildren::with('category')->get();
        return view('admin.categorychildren.index', compact('childrens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.categorychildren.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requesData = $request -> validate([
            'name_uz' => 'required',
            'name_ru' => 'required',
            'category_id' => 'required',
            'url' => 'required',

        ]);
        Categorychildren::create($requesData);
        return redirect() -> route('admin.categorychildren.index');
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
    public function edit(string $id)
    {
       $Category = Category::all();
         $category = Categorychildren::findOrFail($id);
         return view('admin.categorychildren.edit', compact('category','Category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string',
        ]);
        $category = Categorychildren::find($id);
        $category->update($request->all());
        return redirect()->route('admin.categorychildren.index')->with('success', 'Post yangilandi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categorychildren::destroy($id);
        return redirect() -> route('admin.categorychildren.index');
    }
}
