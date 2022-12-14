<?php
namespace App\Repositries;
use App\Interfaces\ZoneRepositryInterface;
use App\Models\Zone;
use Illuminate\Http\Request;
use App\Models\Time;
use App\Models\Distance;
use App\Models\Package;

class ZoneRepositry implements ZoneRepositryInterface{
    public function index(){
        $zones=Zone::paginate(PAGINATION);
        return view('admin.zones.index',compact('zones'));
    }
    public function create(){
        $times=Time::all();
        $distances =Distance::all();
        $packages=Package::all();
        return view('admin.zones.create',compact('times','distances','packages'));

    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|string',
            'distance'=>'required|string|exists:distances,distance',
            'discount_trips'=>'required|numeric|min:0|not_in:0',
            'package_id'=>'required|exists:packges,id',
        ]);
        $zone=new Zone();
        $zone->name=$request->name;
        $zone->distance=$request->distance;
        $zone->package_id=$request->package_id;
        $zone->discount_trips=$request->discount_trips;
        $zone->save();
        return redirect()->route('zones.index')->with('Add',trans('admin.addmsg'));

    }
    public function show($id){

        $times=Time::all();
        $distances =Distance::all();
        $packages=Package::all();
        $zone=Zone::findOrFail($id);
        return view('admin.zones.edit',compact('times','distances','packages','zone'));

    }

    public function update(Request $request){
        $request->validate([
            'name'=>'required|string',
            'distance'=>'required|string|exists:distances,distance',
            'package_id'=>'required|exists:packges,id',
        ]);
        $zone= Zone::findOrFail($request->id);
        $zone->name=$request->name;
        $zone->distance=$request->distance;
        $zone->package_id=$request->package_id;
        $zone->save();
        return redirect()->route('zones.index')->with('eidt',trans('admin.editmsg'));

    }
    public function destroy($id){
        Zone::findOrFail($id)->delete();
        return redirect()->route('zones.index')->with('delete',trans('admin.deletemsg'));
    }

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $zone = Zone::FindOrFail($recordId);
            $this->delete($zone);

        }
        session()->flash('delete',trans('admin.deletemsg'));
        return redirect()->back();
    }

    private function delete(Zone $zone)
    {
        $zone->delete();

    }
}
