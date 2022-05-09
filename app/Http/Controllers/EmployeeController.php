<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('name')->pluck('name', 'id');
        $employees = Employee::orderBy('id', 'desc')->paginate(10);

        return view('employees.index', compact('employees', 'companies'));
    }

    public function create()
    {
        $employee = new Employee;
        $companies = Company::orderBy('name')->pluck('name', 'id');

        return view('employees.create', compact('companies', 'employee'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('message', 'Employee has been added successfully!');
    }

    public function edit(Employee $employee)
    {
        $companies = Company::orderBy('name')->pluck('name', 'id');

        return view('employees.edit', compact('companies', 'employee'));
    }

    public function update(Employee $employee, Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('message', 'Employee has been updated successfully!');
    }

    public function show(Employee $employee)
    {

        return view('employees.show', compact('employee'));
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return back()->with('message', 'Employee has been deleted successfully!');
    }
}
