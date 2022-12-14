<?php
namespace App\Repositries;



use Illuminate\Http\Request;
use App\Interfaces\AdvertisementRepositoryInterface;
use App\Models\Advertisement;
use App\Models\File;
use App\Http\Traits\FileTrait;

class AdvertisementRepository implements AdvertisementRepositoryInterface
{

    use FileTrait;
    public function index()
    {
        $advertisements = Advertisement::get();
        return view('admin.advertisement.index',compact('advertisements'));
    }

    public function create()
    {
        return view('admin.advertisement.create');
    }

    public function store(Request $request)
    {
        ///save in ads table then save image in
        $request->validate([
            'name' => 'required',
        ]);
        $ads=Advertisement::create([
            'name'  => $request->name,
        ]);
            foreach($request->file('image') as $index=> $image)
            {
                $name= $this->saveImage($image,$index,'Ads',$request->name);
                $images= new File();
                $images->file_name=$name;
                $images->Fileable_id= $ads->id;
                $images->Fileable_type = 'App\Models\Advertisement';
                $images->type=$this->FileType($image->getClientOriginalExtension());
                $images->save();
            }

        return redirect()->route('ad.index')->with('success', trans('admin.createmsg'));
    }

    public function show_iamge($id){
        try{
        $advertisement = Advertisement::with('file')->findorfail($id);
        // return $accounts->file;
        return view('admin.advertisement.show',compact('advertisement'));
      }  catch(\Exception $e){

		return redirect()->back()->withErrors(['error' => $e->getMessage()]);
	}
    }

    public function fileDelete($id)
    {
        $file = File::find($id);
        $file->delete();
        return redirect()->route('ad.index')->with('success', trans('admin.deletemsg'));
    }

    public function adDelete($id)
    {
        $ad = Advertisement::find($id);
        $ad->delete();
        return redirect()->route('ad.index')->with('success', trans('admin.deletemsg'));
    }

}

