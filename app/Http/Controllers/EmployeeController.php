<?php

namespace App\Http\Controllers;

use App\Models\empCategory;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Lesson;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empCategories = empCategory::all();
        $positions = Position::all();

        // ✅ Paginatsiya qo‘shildi
        $employees = Employee::with(['category', 'position', 'lesson'])
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.employee.index', compact('employees', 'positions', 'empCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empCategories = empCategory::all();
        $positions = Position::all();
        $lessons = Lesson::all();

        return view('admin.employee.create', compact('positions', 'empCategories', 'lessons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'work_time' => 'required|string|max:255',
            'category_id' => 'required|exists:emp_categories,id',
            'position_id' => 'required|exists:positions,id',
            'lesson_id' => 'nullable|exists:lessons,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/images/'), $imageName);
            $requestData['image'] = $imageName;
        } else {
            $requestData['image'] = 'default.jpg';
        }

        Employee::create($requestData);

        return redirect()->route('admin.employee.index')->with('success', 'Employee created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $empCategories = empCategory::all();
        $positions = Position::all();
        $employee = Employee::findOrFail($id);

        return view('admin.employee.show', compact('employee', 'positions', 'empCategories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empCategories = empCategory::all();
        $positions = Position::all();
        $employee = Employee::findOrFail($id);
        $lessons = Lesson::all();

        return view('admin.employee.edit', compact('employee', 'positions', 'empCategories', 'lessons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'work_time' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:emp_categories,id',
            'position_id' => 'required|exists:positions,id',
            'lesson_id' => 'nullable|exists:lessons,id',
        ]);

        $employee = Employee::findOrFail($id);

        $data = $request->only([
            'name_uz', 'name_ru', 'email', 'phone', 'work_time',
            'category_id', 'position_id', 'lesson_id'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admin/images'), $fileName);
            $data['image'] = $fileName;
        }

        $employee->update($data);

        return redirect()->route('admin.employee.index')->with('success', 'Employee updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);

        if ($employee->image && file_exists(public_path('admin/images/' . $employee->image))) {
            unlink(public_path('admin/images/' . $employee->image));
        }

        $employee->delete();

        return redirect()->route('admin.employee.index')->with('success', 'Employee deleted successfully!');
    }
}
