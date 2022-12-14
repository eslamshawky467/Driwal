<?php
namespace App\Repositries;


use App\Models\Banner;
use Illuminate\Http\Request;
use App\Interfaces\BannerRepositoryInterface;

class BannerRepository implements BannerRepositoryInterface
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }


    public function create(){
        return view('admin.banners.create');
    }

    public function store(Request $request){
        {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            ]);

            if($request->file('image')){
                $file = $request->file('image');
                $filename=time().$file->getClientOriginalName();
                $file->move(public_path('images/banners'), $filename);
                Banner::create([
                    'file_name' => $filename,
                ]);
            }

            return redirect()->route('banner.index')->with('success',trans('admin.createmsg'));
        }
    }

    public function delete($id)
    {
        $image = Banner::find($id);

        $image_path = public_path('images/banners/') . $image->file_name;

        unlink($image_path);

        $image->delete();

        return redirect()->back()->with('success',trans('admin.deletemsg'));
    }
    public function destroy($id){
        return redirect()->back();
    }
}

