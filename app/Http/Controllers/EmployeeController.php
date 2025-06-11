<?php

namespace App\Http\Controllers;

use App\Models\empCategory;
use App\Models\Employee;
use App\Models\Position;
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
         $employees = Employee::all();
         return view('admin.employee.index',compact('employees','positions','empCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        $empCategories = empCategory::all();
        $positions = Position::all();
        return view('admin.employee.create',compact('positions','empCategories','employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name_uz' => 'required',
            'name_ru' => 'required',
            'phone'  => 'required',
            'email'  => 'required',
            'work_time'  => 'required',
            'category_id'  => 'required',
            'position_id'  => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/images/'), $imageName);
            $requestData['image'] = $imageName;
        }else {
            $requestData['image'] = 'default.jpg'; // mavjud bo'lgan default rasm nomi
        }

        Employee::create($requestData);

        return redirect()->route('admin.employee.index');

    }

    /**
     * Display the specified resource.
     */
  public function show($id)
{
     $empCategories = empCategory::all();
    $positions = Position::all();
    $employee = Employee::findOrFail($id);
    return view('admin.employee.show', compact('employee','positions','empCategories'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empCategories = empCategory::all();
        $positions = Position::all();
        $employee = Employee::findOrFail($id);  // shu yerda bitta employee olamiz
        return view('admin.employee.edit', compact('employee', 'positions', 'empCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:255',
            'work_time' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:emp_categories,id',
            'position_id' => 'required|exists:positions,id',
        ]);

        $employee = Employee::findOrFail($id);

        $data = $request->only([
            'name_uz', 'name_ru', 'email', 'phone', 'work_time', 'category_id', 'position_id'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admin/images'), $fileName);
            $data['image'] = $fileName;

            // eski rasmni o‘chirishni istasangiz shu yerga yozish mumkin
            // unlink(public_path('admin/images/' . $employee->image));
        }

        $employee->update($data);

        return redirect()->route('admin.employee.index')->with('success', 'Employee updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::destroy($id);
        return redirect()->route('admin.employee.index');
    }
}
