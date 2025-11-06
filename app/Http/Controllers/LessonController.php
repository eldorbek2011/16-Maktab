<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons =  Lesson::all();
        return view('admin.lessons.index',compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.lessons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name_uz' =>  'required|max:255',
            'name_ru' =>  'required|max:255',
        ]);
        Lesson::create($requestData);
        return redirect()->route('admin.lessons.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lessons = Lesson::findOrFail($id);
        return view('admin.lessons.show', compact('lessons'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lessons = Lesson::findOrFail($id);
        return view('admin.lessons.edit', compact('lessons'));
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

        $lessons = Lesson::findOrFail($id);
        $lessons->update($requestData);

        return redirect()->route('admin.lessons.index')->with('success', 'Dars muvaffaqiyatli yangilandi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Lesson::destroy($id);
        return redirect()->route('admin.lessons.index');
    }
}
