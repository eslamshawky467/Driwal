<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Nationlity;
use App\Models\User;
use Illuminate\Http\Request;

class CleintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Client::paginate(25);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Nationlity::all();
        return view('admin.users.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $phone_number = $request->phone_number;
        $password = $request->password;
        $identity_card = $request->identity_card;
        $country_id = $request->country_id;
        $status = $request->status;

        Client::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone_number' => $phone_number,
            'identity_card' => $identity_card,
            'nationality_id' => $country_id,
            'status' => $status,
        ]);

        return back()->with('success', 'تم حفظ البيانات بنجاح');
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
        $users = Client::where('id' , $id)->first();
        $countries = Nationlity::all();
        return view('admin.users.edit', compact('users', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
            'password' => $password,
            'phone_number' => $phone_number,
            'identity_card' => $identity_card,
            'nationality_id' => $nationality_id,
            'status' => $status,
        ]);
        return back()->with('success', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=Client::findOrFail($id);
        if($user->status=='active'){
            $user->status='inactive';
        }else{
            $user->status='active';
        }
        $user->save();
        return redirect()->back()->with(['delete'=> 'تم حفظ البيانات بنجاح']);
    }
    public function bulk_Delete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $users = Client::FindOrFail($recordId);
            $this->block($users);

        }
        session()->flash('delete','تم حفظ البيانات بنجاح');
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
