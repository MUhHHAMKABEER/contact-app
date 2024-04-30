<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {

         $this->middleware(['auth', 'verified']);
     }
    public function index()
    {
        $user = auth()->user();
        $companies = $user->companies()->with('contacts')->latest()->paginate(10);

        return view('companies.index',compact('companies'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $company = new Company;

        return view('companies.create_companies',compact('company'));

    }

    /**
     * Display the specified resource.
     */
    public function store (CompanyRequest $request)
    {
        $request->user()->companies()->create($request->all());

        return redirect()->route('companies.index')->with('messege', "Companyhas been added sucessfully");


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(Company $company)
    {
        return view('companies.show_companies', compact('company'));
    }


    public function edit(Company $company)

    {
        return view('companies.edit_companies',compact('company'));
    }

    public function update(CompanyRequest $request , Company $company)

    {
        $company->update($request->all());

        return redirect()->route('companies.index')->with('messege', "Companyhas been updated sucessfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
    }
}
