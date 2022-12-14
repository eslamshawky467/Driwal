<?php
namespace App\Repositries;


use App\Models\Order;
use Illuminate\Http\Request;
use App\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    public function active()
    {
        $orders = Order::all();
        return view('admin.orders.active', compact('orders'));
    }

    public function approved()
    {
        $orders = Order::where('status','approved')->get();
        return view('admin.orders.approved', compact('orders'));
    }

    public function finished()
    {
        $orders = Order::where('status','finished')->get();
        return view('admin.orders.finished', compact('orders'));
    }

    public function inActive()
    {
        $orders = Order::where('status','inactive')->get();
        return view('admin.orders.inactive', compact('orders'));
    }

    //////////////////////// payed orders /////////////////
    public function payedActive()
    {
        return view('admin.orders.payed.active');
    }

    public function payedApproved()
    {
        $orders = Order::where('status', 'approved')->get();
        return view('admin.orders.payed.approved', compact('orders'));
    }

    public function payedFinished()
    {
        $orders = Order::where('status', 'finished')->get();
        return view('admin.orders.payed.finished', compact('orders'));
    }

    public function payedInActive()
    {
        $orders = Order::where('status', 'inactive')->get();
        return view('admin.orders.payed.inactive', compact('orders'));
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
                Order::create([
                    'file_name' => $filename,
                ]);
            }

            return redirect()->route('banner.index')->with('success',trans('admin.createmsg'));
        }
    }

    public function show($id)
    {
        # code...
    }

    public function update($id)
    {

    }

    public function delete($id)
    {
        $image = Order::find($id);

        $image_path = public_path('images/banners/') . $image->file_name;

        unlink($image_path);

        $image->delete();

        return redirect()->back()->with('success',trans('admin.deletemsg'));
    }
    public function destroy($id){
        return redirect()->back();
    }
}

