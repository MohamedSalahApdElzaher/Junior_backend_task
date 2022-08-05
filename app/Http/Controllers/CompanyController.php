<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::get(['id','name','address','logo']);
        return view('website.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
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
            $loc = 'uploads/company/';
            $lastImage = $loc . $image_Name;
            $image->move($loc, $image_Name);
            $data['logo'] = $lastImage;
            Company::create($data);
            return redirect()->route('companies.index')->with('success', 'Company created successfully');
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
        $company = Company::find($id);
        return view('website.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request)
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
            $loc = 'uploads/company/';
            $lastImage = $loc . $image_Name;
            $image->move($loc, $image_Name);
            $data['logo'] = $lastImage;
            Company::find($request->id)->update($data);
            return redirect()->route('companies.index')->with('success', 'Company updated successfully');
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
            $company = Company::where('id',$request->company_id)->first();
            if($company){
                $company->delete();
                return redirect()->back()->with(['success' => 'Company deleted successfully']);
            }
        }catch (\Exception $exception){
            return redirect()->back()->with(['error' => $exception->getMessage()]);
        }
    }
}
