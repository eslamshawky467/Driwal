<?php
namespace App\Repositries;
use App\Interfaces\PackageRepositryInterface;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class PackageRepositry implements PackageRepositryInterface{
    use FileTrait;
    public function index(){
        $packages=Package::sortable()->paginate(PAGINATION);
        return view('admin.packages.index',compact('packages'));
    }
    public function create(){
        return view('admin.packages.create');
    }
    public function store(Request $request){
        $today=date('Y-m-d');
        $request->validate([
            'name_ar'=>'required|string',
            'name_en'=>'required|string',
            'description_ar'=>'required|string',
            'description_en'=>'required|string',
            'price'=>'required|numeric|min:0|not_in:0',
            'number_trips'=>'required|numeric|min:0|not_in:0',
            'end_date' =>'required|date|after:'.$today,
            'status'=>'required|string|in:active,inactive',
            'image'=>'required',
        ]);
        try{
            DB::beginTransaction();
            $package=new Package();
            $package->name_ar=$request->name_ar;
            $package->name_en=$request->name_en;
            $package->description_ar=$request->description_ar;
            $package->description_en=$request->description_en;
            $package->price=$request->price;
            $package->number_trips=$request->number_trips;
            $package->end_date=$request->end_date;
            $package->status=$request->status;
            $package->save();
            $path=$this->saveImage($request->file('image'),$package->id,'packages',$package->id);
            $file = new File();
            $file->file_name=$path;
            $file->type=$this->FileType($request->file('image')->getClientOriginalExtension());
            $file->Fileable_id=$package->id;
            $file->Fileable_type='App\Models\Package';
            $file->save();
            DB::commit();
            return redirect()->route('packages.index')->with('Add',trans('admin.addmsg'));
        }catch(\Exception $ex){
            return redirect()->route('packages.index')->with('delete','error');
            DB::rollback();
        }

    }
    public function show($id){
        $package=Package::findOrFail($id);
        return view('admin.packages.edit',compact('package'));
    }

    public function update(Request $request){
        $today=date('Y-m-d');
        $request->validate([
            'name_ar'=>'required|string',
            'name_en'=>'required|string',
            'description_ar'=>'required|string',
            'description_en'=>'required|string',
            'price'=>'required|numeric|min:0|not_in:0',
            'number_trips'=>'required|numeric|min:0|not_in:0',
            'end_date' =>'required|date|after:'.$today,
            'status'=>'required|string|in:active,inactive',
        ]);

         try{
            DB::beginTransaction();
            $package=Package::findOrFail($request->id);
            $package->name_ar=$request->name_ar;
            $package->name_en=$request->name_en;
            $package->description_ar=$request->description_ar;
            $package->description_en=$request->description_en;
            $package->price=$request->price;
            $package->number_trips=$request->number_trips;
            $package->end_date=$request->end_date;
            $package->status=$request->status;
            $package->save();
            if($request->image){
                //Storage::delete($package->file->file_name);
                Storage::deleteDirectory('uploads/packages/'.$package->id);
                $path=$this->saveImage($request->file('image'),$package->id,'packages',$package->id);
                $file =$package->file;
                $file->file_name=$path;
                $file->type=$this->FileType($request->file('image')->getClientOriginalExtension());
                $file->Fileable_id=$package->id;
                $file->Fileable_type='App\Models\Package';
                $file->save();
            }

            DB::commit();
            return redirect()->route('packages.index')->with('edit',trans('admin.editmsg'));
         }catch(\Exception $ex){
            return redirect()->route('packages.index')->with('delete','error');
            DB::rollback();
        }
    }
    public function destroy($id){
        try{
            DB::beginTransaction();
            $package=Package::findOrFail($id);
            Storage::deleteDirectory('uploads/packages/'.$package->id);
            $package->file->delete();
            $package->delete();
            DB::commit();
            return redirect()->back()->with('delete',trans('admin.deletemsg'));
        }catch(\Exception $ex){
            return redirect()->route('packages.index')->with('delete','error');
            DB::rollback();
        }
    }

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $package = Package::FindOrFail($recordId);
            $this->delete($package);

        }
        session()->flash('delete',trans('admin.deletemsg'));
        return redirect()->back();
    }
    

    private function delete(Package $package)
    {
        try{
            DB::beginTransaction();
            Storage::deleteDirectory('uploads/packages/'.$package->id);
            $package->file->delete();
            $package->delete();
            DB::commit();
        }catch(\Exception $ex){
            return redirect()->route('packages.index')->with('delete','error');
            DB::rollback();
        }

    }
    public function search(){
        return view('admin.packages.search');
    }


    
}
