<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeesRequest;
use App\Models\Companies;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    function index()
    {
        return view('Employees.index')->with(['employees' => Employee::all() ]);
    }

    function create()
    {
        $companies = Companies::all();
        return view('Employees.create', compact('companies'))->with(['employees' => Employee::all()]);
    }
    function store(EmployeesRequest $request)
    {
        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_id' => $request->company_id, // Updated to company_id
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return redirect()->route('employees.index');
    }

    function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('Employees.show', compact('employee'));
    }

    function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $companies = Companies::all(); // Pass companies if needed for dropdowns
        return view('Employees.update', compact('employee', 'companies'));
    }


    public function update(EmployeesRequest $request, Employee $employee)
    {
        $employee->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_id' => $request->company_id, // Use company_id for foreign key
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return redirect()->route('employees.index');
    }


    function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
