<?php
namespace App\Repositries;



use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\CompanyRepositoryInterface;

class CompanyRepository implements CompanyRepositoryInterface
{

    public function index()
    {
        return view('admin.companies.index');
    }


    public function create()
    {
        return view('admin.companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
        ]);

        Company::create([
            'name'  => $request->name,
            'phonenumber'  => $request->phone_number,
            'email'  => $request->email,
            'password'  => Hash::make($request->password),
            'status'  => $request->status,
        ]);

        return back()->with('success', trans('admin.createmsg'));

    }

    public function edit($id)
    {
        $campany = Company::FindOrFail($id);
        return view('admin.companies.edit', compact('campany'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
        ]);
        $Company = Company::find($request->id);
        $Company->update([
            'name'   => $request->name,
            'email'   => $request->email,
            'phonenumber'   => $request->phone_number,
            'status'   => $request->status,
        ]);
        return redirect()->route('Companies.index')->with('success',trans('admin.updatemsg'));
    }

    public function destroy($id)
    {
        $campany = Company::find($id);
        $campany->update([
            'status' => 'inactive',
        ]);
        return redirect()->route('Companies.index')->with('success', trans('admin.updatemsg'));
    }

    public function delete_All(Request $request){
        $ids = json_decode($request->record_ids);
        Company::whereIn('id', $ids)->update(['status' => 'inactive']);
        return back()->with('success', trans('admin.updatemsg'));
    }

}

