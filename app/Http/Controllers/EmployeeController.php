<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::all();

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $employee = $request->all();

        $employee['uuid'] = (string) Str::uuid();

        if ($request->hasFile('photo')) {

            $employee['photo'] = $request->photo->getClientOriginalName();

            $request->photo->storeAs('employees', $employee['photo']);
        }

        Employee::create($employee);

        return redirect()->route('employees.index');
    }

    public function download($uuid)
    {
        $employee = Employee::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/employees/' . $employee->photo);

        return response()->download($pathToFile);
    }
}
