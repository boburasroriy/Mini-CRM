<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Companies;
use App\Models\Employee;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    function index()
    {
        $companies  = Companies::all();
        $employees = Employee::all();
        return view('admin.dashboard', compact(['companies', 'employees']) ) ;
    }


}
