<?php
namespace App\Repositries;



use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Nationlity;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\ClientRepositoryInterface;
use App\Mail\UserRegister;
use Illuminate\Support\Facades\Mail;

class ClientRepository implements ClientRepositoryInterface
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        $countries = Nationlity::all();
        return view('admin.users.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate( [
            'name'=>'required|string',
            'email'=>'required|email|unique:clients,email,'.$request->id,
            'phone_number'=>'required',
            'identity_card' =>'required',
            'country_id'=>'required',
            'status'=>'required',
            'password' => 'required|confirmed|min:6',
        ]);
        $name = $request->name;
        $email = $request->email;
        $phone_number = $request->phone_number;
        $password = Hash::make($request->password);
        $identity_card = $request->identity_card;
        $country_id = $request->country_id;
        $status = $request->status;

        Client::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phonenumber' => $phone_number,
            'id_number' => $identity_card,
            'nationality_id' => $country_id,
            'status' => $status,
        ]);

        Mail::to($request->email)->send(new UserRegister($request->email,$request->password));

        return back()->with('success', trans('admin.createmsg'));
    }

    public function edit($id)
    {
        $users = Client::where('id' , $id)->first();
        $countries = Nationlity::all();
        return view('admin.users.edit', compact('users', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $request->validate( [
            'name'=>'required|string',
            'email'=>'required|email|unique:clients,email,'.$request->id,
            'phone_number'=>'required',
            'identity_card' =>'required',
            'nationality_id'=>'required',
            'status'=>'required',
            'password' => 'required',

        ]);
        $name = $request->name;
        $email = $request->email;
        $phone_number = $request->phone_number;
        $password = $request->password;
        $identity_card = $request->identity_card;
        $nationality_id = $request->nationality_id;
        $status = $request->status;

        $Client = Client::where('id', $request->id);
        $Client->update([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($request->password),
            'phonenumber' => $phone_number,
            'id_number' => $identity_card,
            'nationality_id' => $nationality_id,
            'status' => $status,
        ]);
        return back()->with('success', trans('admin.updatemsg'));
    }

    public function destroy($id)
    {
        $user=Client::findOrFail($id);
        if($user->status=='active'){
            $user->status='inactive';
        }else{
            $user->status='active';
        }
        $user->save();
        return redirect()->back()->with('delete', trans('admin.deletemsg'));
    }
    public function bulk_Delete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $users = Client::FindOrFail($recordId);
            $this->block($users);

        }
        session()->flash('delete',trans('admin.deletemsg'));
        return redirect()->back();
    }

    private function block(Client $user)
    {
        $user->status = "inactive";
        $user->save();
    }

    private function delete(Client $Client)
    {
        $Client->delete();

    }

}

