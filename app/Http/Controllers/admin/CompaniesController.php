<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    function index()
    {
        return view('Companies.index')->with(['companies' => Companies::all()]);
    }

    function create()
    {
        return view('Companies.create')->with(['companies' => Companies::all()]);
    }

    function store(CompanyRequest $request)
    {
        $originalNameLogo = $request->file('logo')->getClientOriginalName();
        $logoPath = $request->file('logo')->storeAs('public/Logo', $originalNameLogo);
        Companies::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' =>$logoPath
        ]);
        return redirect()->route('companies.index');
    }

    function show($id)
    {
        $companies = Companies::findorfail($id);
        return view('Companies.show', compact('companies'));
    }

    function edit($id)
    {
        $companies = Companies::findorfail($id);
        return view('Companies.update', compact('companies'));
    }

    public function update(CompanyRequest $request, Companies $company)
    {
        // Update company details
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        // Check if a new logo is uploaded
        if ($request->hasFile('logo')) {
            // Delete old logo if it exists
            if ($company->logo) {
                Storage::delete($company->logo);
            }

            // Store new logo
            $originalName = $request->file('logo')->getClientOriginalName();
            $logoPath = $request->file('logo')->storeAs('public/Logo', $originalName);
            $company->logo = $logoPath;
        }

        // Save updated company information
        $company->save();

        return redirect()->route('companies.index');
    }



    public function destroy($id)
    {
        $company = Companies::findOrFail($id);
        $company->delete();
        return redirect()->route('companies.index');
    }

}
