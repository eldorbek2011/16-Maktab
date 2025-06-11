<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\HomePageImageTag;

class HomePageImageTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $HomePageImageTag = HomePageImageTag::all();
        return view('admin.HomePageImageTag.index',compact('HomePageImageTag'));
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
        $requestData = $request->validate([
            'title_uz' => 'required',
            'title_ru' => 'required',
            'body_uz' => 'required',
            'body_ru' => 'required',

        ]);
        HomePageImageTag::create($requestData);
        return redirect()->route('admin.HomePageImageTag.index');
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
    public function destroy(string $id)
    {
        HomePageImageTag::destroy($id);
        return redirect()->route('admin.HomePageImageTag.index');
    }
}
