<?php

namespace App\Http\Controllers;

use App\Models\Statictik;
use Illuminate\Http\Request;

class StatictikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statick = Statictik::all();
        return view('admin.statictik.index',compact('statick'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.statictik.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valiData = $request->validate([
           'classesCount' => 'required',
            'studentsCount' => 'required',
            'teachersCount' => 'required',
            'graduatesCount' => 'required',
        ]);
        Statictik::create($valiData);
        return  redirect()->route('admin.statictik.index');
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
        Statictik::destroy($id);
        return  redirect()->route('admin.statictik.index');
    }
}
