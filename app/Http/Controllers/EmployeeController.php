<?php

namespace App\Http\Controllers;

use App\Events\SendMail;
use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::get(['id', 'name', 'email', 'logo', 'company_id']);
        $companies = Company::get(['id', 'name']);
        return view('website.employee.index', compact('employees', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::get(['id', 'name']);
        return view('website.employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        //return $request;
        try{
            $data = $request->validated();
            $image = $request->file('logo');
            // uniqe id for each image
            $img_gen = hexdec(uniqid());
            // get extension
            $ext = strtolower($image->getClientOriginalExtension());
            $image_Name = $img_gen . '.' . $ext;
            // save location
            $loc = 'uploads/employee/';
            $lastImage = $loc . $image_Name;
            $image->move($loc, $image_Name);
            $data['logo'] = $lastImage;
            $data['password'] = bcrypt($data['password']);
            $data['company_id'] = $request->company_id;
            Employee::create($data);
            return redirect()->route('employees.index')->with('success', 'Employee created successfully and welcome email sent');
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
         }
        }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $companies = Company::get(['id', 'name']);
        return view('website.employee.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        try {
            $data = $request->validated();
            $image = $request->file('logo');
            // uniqe id for each image
            $img_gen = hexdec(uniqid());
            // get extension
            $ext = strtolower($image->getClientOriginalExtension());
            $image_Name = $img_gen . '.' . $ext;
            // save location
            $loc = 'uploads/employee/';
            $lastImage = $loc . $image_Name;
            $image->move($loc, $image_Name);
            $data['logo'] = $lastImage;
            $data['password'] = bcrypt($data['password']);
            $data['company_id'] = $request->company_id;
            Employee::find($request->id)->update($data);
            return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            $employee = Employee::where('id',$request->employee_id)->first();
            if($employee){
                $employee->delete();
                return redirect()->back()->with(['success' => 'Employee deleted successfully']);
            }
        }catch (\Exception $exception){
            return redirect()->back()->with(['error' => $exception->getMessage()]);
        }
    }

}
