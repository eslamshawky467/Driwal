<?php
namespace App\Repositries;
use App\Interfaces\DriversAccountRepositryInterface;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Driver;
use App\Http\Traits\FileTrait;
use App\Models\File;


class DriversAccountRepositry implements DriversAccountRepositryInterface{

    use FileTrait;
    public function index(){
        $accounts=Account::where('user_type','App\Models\Driver')->paginate(PAGINATION);
        return view('admin.driver.drivers_accounts.index',compact('accounts'));
    }

    public function create(){
        $drivers=Driver::all();
        return view('admin.driver.drivers_accounts.create',compact('drivers'));
    }

    public function store(Request $request){
        $request->validate( [
            'driver_id'=>'required|exists:drivers,id',
            'status'=>'required|in:pending,approved,canceled',
            'files'=>'required',
        ]);

        if (Account::where('user_id', $request->driver_id)->where('user_type', 'App\Models\Driver')->exists()) {
            return redirect()->back()->with('message',trans('admin.exist'));
        }
        else{
            $acc= Account::create([
                'balance'=>0,
                'status'=>$request->status,
                'user_id'=>$request->driver_id,
                'user_type'=>'App\Models\Driver',
            ]);

            foreach($request->file('files') as $index=> $file)
            {

                $type= $this->FileType($file->getClientOriginalExtension());
                $name= $this->saveImage($file,$index,'accounts',$acc->id);
                // insert in image_table
                $files= new File();   //files
                $files->file_name=$name;
                $files->Fileable_id= $acc->id;
                $files->Fileable_type ='App\Models\Account';
                $files->type=$type;
                $files->save();
            }
            return redirect()->route('driversaccounts.index')->with('Add',trans('admin.createmsg'));
        }
    }

    public function show($id){
        $account=Account::findOrFail($id);
        return view('admin.driver.drivers_accounts.edit',compact('account'));
    }



    public function update(Request $request, $id){
        $request->validate([
            'status'=>'required|in:pending,approved,canceled',
        ]);
        $account=Account::FindOrFail($request->id);
        $account->status=$request->status;
        $account->save();
        return redirect()->route('driversaccounts.index')->with('edit',trans('admin.editmsg'));
    }
    public function show_attachments($id){
        $files=Account::FindOrFail($id)->file;
        return view('admin.driver.drivers_accounts.show',compact('files'));
    }
    public function approve($id){
        $account=Account::findOrFail($id);
        $account->status='approved';
        $account->save();
        return redirect()->back()->with('Add',trans('admin.active'));
    }
    public function cancel($id){
        $account=Account::findOrFail($id);
        $account->status='canceled';
        $account->save();
        return redirect()->back()->with('delete',trans('admin.inactive'));
    }

    public function destroy($id){
        $account=Account::FindOrFail($id);
        if($account->status=='approved'){
            $account->status='canceled';
        }
        else{
            $account->status='approved';
        }
        $account->save();
        return redirect()->back()->with('edit',trans('admin.statuschange'));
    }

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $account = Account::FindOrFail($recordId);
            $this->delete($account);

        }
        session()->flash('delete',trans('admin.deletemsg'));
        return redirect()->back();
    }

    private function delete(Account $account)
    {
        $account->status='canceled';
        $account->save();
    }

}
