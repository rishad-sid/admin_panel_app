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
        $companies = Company::orderBy('name')->pluck('name', 'id');

        return view('employees.create', compact('companies'));
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

    public function show($id)
    {
        $employee = Employee::find($id);

        return view('employees.show', compact('employee'));
    }
}
