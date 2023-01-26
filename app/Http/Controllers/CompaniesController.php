<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompaniesController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::get();
        return view('companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $validated = $request->validated();

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        if ($request->hasFile('logo')) {
            $destinationPath = 'public/companies';
            $image = $request->file('logo');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->putFileAs($destinationPath, $image, $fileName);
            $company->logo = $fileName;
        }

        if($company->save()) {
            $notification = ['toastr'=>"Company details store successfully",'type'=>'success'];
            return redirect()->route('company.index')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, $id)
    {
        $validated = $request->validated();

        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        if ($request->hasFile('logo')) {
            $destinationPath = 'public/companies';
            $image = $request->file('logo');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->putFileAs($destinationPath, $image, $fileName);
            $company->logo = $fileName;
        }

        if($company->save()) {
            $notification = ['toastr'=>"Company details update successfully",'type'=>'success'];
            return redirect()->route('company.index')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::withCount('employees')->find($id);
        if( $company->employees_count > 0) {
            $notification = ['toastr'=>"Sorry you can't delete this Company first delete all related emplyees",'type'=>'warning'];
            return redirect()->route('company.index')->with($notification);
        } else {
            if($company->delete()) {
                $notification = ['toastr'=>"Company delete successfully",'type'=>'success'];
                return redirect()->route('company.index')->with($notification);
            }
        }
    }
}
