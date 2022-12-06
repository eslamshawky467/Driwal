<?php
namespace App\Repositries;
use App\Interfaces\SettingRepositoryInterface;

use Illuminate\Http\Request;
use App\Models\Setting;



class SettingRepository implements SettingRepositoryInterface{

    public function about_us(){
        $about = Setting::where('type','about_us')->first();
        return view('admin.setting_view.about_us.about_us',compact('about'));
    }
    public function about_us_store (Request $request){
        $request->validate([
            'title_en'=>'required|string',
            'title_ar'=>'required|string',
            'description_ar'=>'required|string',
            'description_en'=>'required|string',
        ]);
        $about = Setting::where('type','about_us')->first();
        $about->title_en=$request->title_en;
        $about->title_ar=$request->title_ar;
        $about->description_en=$request->description_en;
        $about->description_ar=$request->description_ar;
        $about->save();
        return redirect()->back()->with('edit',trans('admin.editmsg'));
    }
    public function contact_us_index(){
        $contact_us=Setting::where('type','contact_us')->paginate(PAGINATION);
        return view('admin.setting_view.contact_us.index',compact('contact_us'));
    }
    public function contact_us_create(){
        return view('admin.setting_view.contact_us.create');
    }
    public function contact_us_store(Request $request){
        $request->validate([
            'title_en'=>'required|string',
            'title_ar'=>'required|string',
            'url'=>'required|string',
            'icon'=>'required|string',
        ]);
        Setting::create([
            'title_ar'=>$request->title_ar,
            'title_en'=>$request->title_en,
            'description_ar'=>$request->url,
            'description_en'=>$request->url,
            'icon'=>$request->icon,
            'type'=>'contact_us'
        ]);
        return redirect()->route('contact_us.index')->with('Add',trans('admin.addmsg'));
    }
    public function contact_us_update($id){
        $contact=Setting::findOrFail($id);
        if($contact->type!='contact_us'){
            return redirect()->back()->with('message',trans('admin.noedit'));
        }
        return view('admin.setting_view.contact_us.edit',compact('contact'));

    }
    public function about_us_edit(Request $request){
        $contact=Setting::findOrFail($request->id);
        if($contact->type!='contact_us'){
            return redirect()->route('contact_us.index')->with('message',trans('admin.noedit'));
        }
        $request->validate([
            'title_en'=>'required|string',
            'title_ar'=>'required|string',
            'url'=>'required|string',
            'icon'=>'required|string',
        ]);
        $contact->title_ar=$request->title_ar;
        $contact->title_en=$request->title_en;
        $contact->description_ar=$request->url;
        $contact->description_en=$request->url;
        $contact->icon=$request->icon;
        $contact->save();
        return redirect()->route('contact_us.index')->with('edit',trans('admin.editmsg'));
    }
    public function destroy($id){
        $setting=Setting::findOrFail($id);
        if($setting->type=='about_us'){
                return redirect()->route('contact_us.index')->with('message',trans('admin.nodelete'));
             }
        $setting->delete();
        return redirect()->back()->with('delete',trans('admin.deletemsg'));

    }
    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {
            if(Setting::FindOrFail($recordId)->type=='about_us'){
                continue;
            }

            $settings = Setting::FindOrFail($recordId);
            $this->delete($settings);

        }
        session()->flash('delete',trans('admin.deletemsg'));
        return redirect()->back();
    }

    private function delete(Setting $settings)
    {
        $settings->delete();

    }

    public function qa_index(){
        $qa=Setting::where('type','qa')->paginate(PAGINATION);
        return view('admin.setting_view.qa.index',compact('qa'));
    }

    public function qa_create(){
        return view('admin.setting_view.qa.create');
    }
    public function qa_store(Request $request){
        $request->validate([
            'title_en'=>'required|string',
            'title_ar'=>'required|string',
            'description_ar'=>'required|string',
            'description_en'=>'required|string',
        ]);
        Setting::create([
            'title_en'=>$request->title_en,
            'title_ar'=>$request->title_en,
            'description_ar'=>$request->description_ar,
            'description_en'=>$request->description_en,
            'type'=>'qa',
        ]);
        return redirect()->route('qa.index')->with('Add',trans('admin.addmsg'));
    }
    public function qa_update($id){

        $qa=Setting::findOrFail($id);
        if($qa->type!='qa'){
            return redirect()->back()->with('message',trans('admin.noedit'));
        }
        return view('admin.setting_view.qa.edit',compact('qa'));
    }
    public function qa_edit(Request $request){
        $qa=Setting::findOrFail($request->id);
        if($qa->type!='qa'){
            return redirect()->back()->with('message',trans('admin.noedit'));
        }
        $request->validate([
            'title_en'=>'required|string',
            'title_ar'=>'required|string',
            'description_ar'=>'required|string',
            'description_en'=>'required|string',
        ]);
        $qa->title_en=$request->title_en;
        $qa->title_ar=$request->title_ar;
        $qa->description_ar=$request->description_ar;
        $qa->description_en=$request->description_en;
        $qa->save();
        return redirect()->route('qa.index')->with('edit',trans('admin.editmsg'));
    }

}

