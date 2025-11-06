<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Schudeli;
use App\Models\SmenaType;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class SchudeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // smena, class va lessons bilan birga olish
        $schudeli = Schudeli::with('smena', 'classModel', 'lessons')->get();
        return view('admin.schudeli.index', compact('schudeli'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $smenatype = SmenaType::all();
        $classes = ClassModel::all();
        $lessons = Lesson::all(); // 🔥 qo‘shildi!

        return view('admin.schudeli.create', compact('smenatype', 'classes', 'lessons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'smena_id' => 'required|exists:smena_types,id',
            'class_id' => 'required|exists:classes,id',
            'lesson_id' => 'nullable|exists:lessons,id',
            'pdf_file' => 'nullable|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $pdfName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admin/pdfs/'), $pdfName);
            $requestData['pdf_file'] = $pdfName;
        }

        // DBda NOT NULL ustunlari uchun sukut qiymatlar
        $requestData += [
            'week_day' => '',
            'room' => '',
            'time' => '00:00',
            'image' => '',
        ];

        Schudeli::create($requestData);

        return redirect()->route('admin.schedule.index')
            ->with('success', 'Dars jadvali muvaffaqiyatli yaratildi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $schedule = Schudeli::with('smena', 'classModel', 'lessons')->findOrFail($id);
        return view('admin.schudeli.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $schedule = Schudeli::findOrFail($id);
        $smenatype = SmenaType::all();
        $classes = ClassModel::all();
        $lessons = Lesson::all();

        return view('admin.schudeli.edit', compact('schedule', 'smenatype', 'classes', 'lessons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $schedule = Schudeli::findOrFail($id);

        $requestData = $request->validate([
            'smena_id' => 'nullable|exists:smena_types,id',
            'class_id' => 'nullable|exists:classes,id',
            'pdf_file' => 'nullable|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('pdf_file')) {
            // eski faylni o‘chirish
            if ($schedule->pdf_file && file_exists(public_path('admin/pdfs/' . $schedule->pdf_file))) {
                unlink(public_path('admin/pdfs/' . $schedule->pdf_file));
            }

            $file = $request->file('pdf_file');
            $pdfName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admin/pdfs/'), $pdfName);
            $requestData['pdf_file'] = $pdfName;
        }

        $schedule->update($requestData);

        return redirect()->route('admin.schedule.index')
            ->with('success', 'Dars jadvali muvaffaqiyatli yangilandi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $schedule = Schudeli::findOrFail($id);

        // PDF faylni o‘chirish
        if ($schedule->pdf_file && file_exists(public_path('admin/pdfs/' . $schedule->pdf_file))) {
            unlink(public_path('admin/pdfs/' . $schedule->pdf_file));
        }

        $schedule->delete();

        return redirect()->route('admin.schedule.index')
            ->with('success', 'Dars jadvali muvaffaqiyatli o\'chirildi!');
    }
}
