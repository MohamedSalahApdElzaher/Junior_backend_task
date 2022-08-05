<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class DataTableController extends Controller
{
    public function index()
    {
        return view('datatable.employee_list');
    }

    public function get()
    {
        return datatables()->of(Employee::query())->make(true);
    }

}
