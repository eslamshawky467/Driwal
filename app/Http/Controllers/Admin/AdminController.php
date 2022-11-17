<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view('admin.admins.index');
    }

    public function create(){
        return view('admin.admins.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'  => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name'  => $request->name,
            'email'  => $request->email,
            'password'  => $request->password,
        ]);

        return back()->with('success', 'تم إضافة البيانات بنجاح');

    }

    public function edit($id){
        $admin = User::where('id', $id)->first();
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(Request $request){

        $validated = $request->validate([
            'name'  => 'required',
            'email' => 'required',
        ]);

        $admin = User::find($request->id);
        $admin->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        if($request->password !== null){
            $admin->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('admins.index')->with('success', 'تم حفظ البيانات بنجاح');
    }
    public function destory($id){
        $admin = User::find($id);
        $admin->delete();
        return back();
    }   
    public function bulk_Delete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $admins = User::FindOrFail($recordId);
            $this->delete($admins);
        }
        session()->flash('delete',trans('admin.deletemsg'));
        return redirect()->back();
    }

    private function delete(User $user)
    {
        $user->delete();

    }
}
