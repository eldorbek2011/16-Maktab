<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\HomePageImageTag;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $HomePageImageTag = HomePageImageTag::all();
        $gallerys = Gallery::latest()->get(); // yangi rasmlar avval chiqadi
        return view('admin.gallery.index', compact('gallerys', 'HomePageImageTag'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/images/'), $imageName);
            $requestData['image'] = $imageName;
        } else {
            $requestData['image'] = 'default.jpg'; // default rasm
        }

        Gallery::create($requestData);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Yangi rasm muvaffaqiyatli qo‘shildi!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $requestData = $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        // Agar yangi rasm yuklansa — eski faylni o‘chiradi
        if ($request->hasFile('image')) {
            // eski faylni o‘chirish
            if ($gallery->image && file_exists(public_path('admin/images/' . $gallery->image))) {
                unlink(public_path('admin/images/' . $gallery->image));
            }

            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/images/'), $imageName);
            $requestData['image'] = $imageName;
        }

        $gallery->update($requestData);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Rasm muvaffaqiyatli yangilandi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Faylni o‘chirish (agar mavjud bo‘lsa)
        if ($gallery->image && file_exists(public_path('admin/images/' . $gallery->image))) {
            unlink(public_path('admin/images/' . $gallery->image));
        }

        $gallery->delete();

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Rasm muvaffaqiyatli o‘chirildi!');
    }
}
