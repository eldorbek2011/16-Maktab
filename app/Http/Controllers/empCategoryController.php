<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\empCategory;
use Illuminate\Http\Request;

class empCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empCategorys = empCategory::all();
        return view('admin.empCategory.index',compact('empCategorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.empCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name_uz' => 'required',
            'name_ru' => 'required',
        ]);
        empCategory::create($requestData);
        return redirect()->route('admin.empCategory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $empCategory = empCategory::findOrFail($id);
        return view("admin.empCategory.show",compact('empCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empCategory = empCategory::findOrFail($id); // Bitta kategoriya olish uchun shunday bo‘lishi kerak
        return view('admin.empCategory.edit', compact('empCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
        ]);

        $empCategory = empCategory::findOrFail($id);
        $empCategory->update($requestData);

        return redirect()->route('admin.empCategory.index')->with('success', 'Xodim kategoriyasi muvaffaqiyatli yangilandi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        empCategory::destroy($id);
        return redirect()->route('admin.empCategory.index');
    }
}
