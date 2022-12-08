<?php
namespace App\Repositries;



use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\AdminRepositoryInterface;

class AdminRepository implements AdminRepositoryInterface
{
    public function index(){
        return view('admin.admins.index');
    }

    public function profile(){
        $admin=User::findOrFail(Auth::id());
        return view('admin.admins.edit', compact('admin'));
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
            'password'  => Hash::make($request->password),
        ]);

        return back()->with('success', trans('admin.createmsg'));

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

        if($request->password){
            $request->validate([
                'password'=>'required|confirmed',
            ]);
            $admin->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('admins.index')->with('success', trans('admin.editmsg'));
    }
    public function destory($id){
        $admin = User::find($id);
        $admin->delete();
        session()->flash('delete',trans('admin.deletemsg'));
        return redirect()->back();
    }
    public function bulk_Delete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $users = User::FindOrFail($recordId);
            $this->delete($users);

        }
        session()->flash('delete',trans('admin.deletemsg'));
        return redirect()->back();
    }

    private function delete(User $user)
    {
        $user->delete();
    }

}

