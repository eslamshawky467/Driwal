<?php
namespace App\Repositries;


use App\Models\File;
use App\Models\Client;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Interfaces\ClientAccountRepositoryInterface;
use App\Http\Traits\FileTrait;

class ClientAccountRepository implements ClientAccountRepositoryInterface
{
    use FileTrait;
    public function index()
    {
        $accounts = Account::all();
        return view('admin.client_accounts.index', compact('accounts'));
    }
    public function create(){
        $clients = Client::all();
        return view('admin.client_accounts.create', compact('clients'));
    }

    public function approve($id){
        $account = Account::findOrFail($id);
        $account->status = 'approved';
        $account->save();
        session()->flash('Add',trans('admin.approvemsg'));
        return redirect()->back();
       }

       public function delete($id){
        $account = Account::findOrFail($id);
        $account->status = 'canceled';
        $account->save();
        session()->flash('Add',trans('admin.cancelmsg'));
        return redirect()->back();
       }

       public function edit($id){
        $account = Account::findOrFail($id);
        return view('admin.client_accounts.edit',compact('account'));
       }


       public function update(Request $request,$id){
        $account = Account::findOrFail($id);
        $account->status = $request->status ;
        $account->update();
        session()->flash('Add',trans('admin.change'));
        return redirect()->back();
       }

    public function show($id){
        $account = Account::with('file')->findorfail($id);
        return view('admin.client_accounts.show',compact('account'));

     }

     public function deletefile($id){
        $account = File::find($id);
      $account->delete();
      session()->flash('delete',trans('admin.deletemsg'));
      return redirect()->back();
       }

       public function store(Request $request){
        $request->validate([
            'name'=> 'required',
            'image'=> 'required',
        ]);
       $var =  Account::create([

            'user_id'=>$request->name,
            'status'=>'pending',
            'balance'=>0,
            'user_type'=>'App\Models\Client',
        ]);
        foreach($request->file('image') as $index=> $image)
  {
      $type= $this->FileType($image->getClientOriginalExtension());
      $name= $this->saveImage($image,$index,'Accounts',$request->user_id);
      // insert in image_table

      $images= new File();
      $images->file_name=$name;
      $images->Fileable_id= $var->id;
      $images->Fileable_type = 'App\Models\Account';
      $images->type=$type;
      $images->save();
  }
        return redirect()->route('client_accounts.index')->with('Add',trans('admin.addmsg'));
    }


}
