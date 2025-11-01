<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomePageImageTag;

class HomePageImageTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homePageImageTags = HomePageImageTag::all();
        return view('admin.HomePageImageTag.index', compact('homePageImageTags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.HomePageImageTag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'body_uz' => 'required|string',
            'body_ru' => 'required|string',
        ]);

        HomePageImageTag::create($validatedData);

        return redirect()
            ->route('admin.HomePageImageTag.index')
            ->with('success', 'Maʼlumot muvaffaqiyatli qoʻshildi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $homePageImageTag = HomePageImageTag::findOrFail($id);
        return view('admin.HomePageImageTag.show', compact('homePageImageTag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $homePageImageTag = HomePageImageTag::findOrFail($id);
        return view('admin.HomePageImageTag.edit', compact('homePageImageTag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'body_uz' => 'required|string',
            'body_ru' => 'required|string',
        ]);

        $homePageImageTag = HomePageImageTag::findOrFail($id);
        $homePageImageTag->update($validatedData);

        return redirect()
            ->route('admin.HomePageImageTag.index')
            ->with('success', 'Maʼlumot yangilandi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = HomePageImageTag::findOrFail($id);
        $item->delete();

        return redirect()
            ->route('admin.HomePageImageTag.index')
            ->with('success', 'Maʼlumot o‘chirildi!');
    }
}
