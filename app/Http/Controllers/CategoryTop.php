<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \App\Models\CategoryTopp;

class CategoryTop extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryTop = CategoryTopp::all();
        return view('admin.categoryTop.index', compact('categoryTop'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categoryTop.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ma'lumotlarni tekshirish
        $validatedData = $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'url' => 'required|string|max:255',
        ]);

        // Ma'lumotlarni saqlash
        CategoryTopp::create($validatedData);

        // Foydalanuvchini qayta yo'naltirish
        return redirect()->route('admin.CategoryTop.index')->with('success', 'Kategoriya muvaffaqiyatli yaratildi!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = CategoryTopp::findOrFail($id);
        return view("admin.CategoryTop.show",compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = CategoryTopp::findOrFail($id); // Bitta kategoriya olish uchun shunday bo‘lishi kerak
        return view('admin.CategoryTop.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string',
            'url' => 'required|string|max:255',
        ]);
        $category = CategoryTopp::find($id);
        $category->update($request->all());
        return redirect()->route('admin.CategoryTop.index')->with('success', 'Post yangilandi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = CategoryTopp::findOrFail($id);
        $categories->delete();
        return redirect()->route('admin.CategoryTop.index')->with('success', 'Successfully deleted!');
    }
}
