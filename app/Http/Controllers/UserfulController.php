<?php

namespace App\Http\Controllers;

use App\Models\UsefulResource;
use Illuminate\Http\Request;

class UserfulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usefulResources = UsefulResource::all();
        return view('admin.usefulResource.index',compact('usefulResources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.usefulResource.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'body_uz'  => 'required|string',
            'body_ru'  => 'required|string',
            'url' => 'required|url',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/images/'), $imageName);
            $requestData['image'] = $imageName;
        }else {
            $requestData['image'] = 'default.jpg'; // mavjud bo'lgan default rasm nomi
        }
        UsefulResource::create($requestData);
        return redirect()->route('admin.usefulResource.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usefulResource = UsefulResource::findOrFail($id);
        return view('admin.usefulResource.show', compact('usefulResource'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usefulResource = UsefulResource::findOrFail($id);
        return view('admin.usefulResource.edit', compact('usefulResource'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'body_uz'  => 'required|string',
            'body_ru'  => 'required|string',
            'url' => 'required|url',
        ]);

        $usefulResource = UsefulResource::findOrFail($id);

        if ($request->hasFile('image')) {
            // Eski rasmini o'chirish
            if ($usefulResource->image && file_exists(public_path('admin/images/' . $usefulResource->image))) {
                unlink(public_path('admin/images/' . $usefulResource->image));
            }
            
            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/images/'), $imageName);
            $requestData['image'] = $imageName;
        }

        $usefulResource->update($requestData);
        return redirect()->route('admin.usefulResource.index')->with('success', 'Foydali resurs muvaffaqiyatli yangilandi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        UsefulResource::destroy($id);
        return redirect()->route('admin.usefulResource.index');
    }
}
