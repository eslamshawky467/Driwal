<?php
namespace App\Repositries;



use Illuminate\Http\Request;
use App\Models\Company;
use App\Interfaces\PackageCompanyRepositoryInterface;
use App\Models\Package;
use App\Models\Request as ModelsRequest;
use Illuminate\Support\Facades\Hash;

class PackageCompanyRepository implements PackageCompanyRepositoryInterface
{




    public function create()
    {
        $packages = Package::all();
        $companies = Company::all();
        return view('admin.package_company.create',compact('packages','companies'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'package_id' => 'required',
            'company_id' => 'required',
            'count' => 'required',
        ]);

        ModelsRequest::create([
            'package_id'  => $request->package_id,
            'company_id'  => $request->company_id,
            'status'  => $request->status,
            'count'  =>$request->count,
        ]);

        return back()->with('success', trans('admin.createmsg'));

    }



}

