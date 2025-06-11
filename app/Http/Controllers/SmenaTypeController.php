<?php

namespace App\Http\Controllers;

use App\Models\empCategory;
use App\Models\SmenaType;
use Illuminate\Http\Request;

class SmenaTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $smenatypes = SmenaType::all();
        return view('admin.smenatype.index', compact('smenatypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.smenatype.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name_uz' =>  'required',
            'name_ru' =>  'required',
        ]);
        SmenaType::create($requestData);
        return redirect()->route('admin.smenatype.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $smenatype = SmenaType::findOrFail($id);
        return view('admin.smenatype.show',compact('smenatype'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $smenatype = SmenaType::findOrFail($id);
        return view('admin.smenatype.edit',compact('smenatype'));
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

        $smenatype = SmenaType::findOrFail($id);
        $smenatype->update($requestData);

        return redirect()->route('admin.smenatype.index')->with('success', 'Smena o‘zgartirildi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SmenaType::destroy($id);
        return redirect()->route('admin.smenatype.index');
    }
}
