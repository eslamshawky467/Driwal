<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DriverFirebaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $database;
    public function __construct()
    {
        $this->database = \App\Services\FirebaseService::connect();
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.driverfirebase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->database
        ->getReference('test/orders/1' )
        ->set([
            'location_lat'=>'29.977473021013775',
            'location_long'=>' 31.132578405639414',
            'location' => $request->name ,
            'lat' => $request->phone_number,
            'long' => $request->start_cost,
            'client_id' => $request->email
        ]);

    return response()->json('driver has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $this->database->getReference('test/orders/1' )
        // ->set([
        //     'location_lat'=>'29.977473021013775',
        //     'location_long'=>'31.132578405639414',
        //     'location' => 'pyramids' ,
        //     'lat' => '30.033719850389883',
        //     'long' => '31.211876106355433',
        //     'my_location'=>'samsama',
        //     'client_id' => 4,
        // ]);
        return $this->database->getReference('test/dirvers/16' )->getValue();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $this->database->getReference('test/driver/' . $request->id)
        ->update([
            'location_lat'=>'29.977473021013775',
            'location_long'=>' 31.132578405639414',
            'name' => $request->name ,
            'phone_number' => $request->phone_number,
            'start_cost' => $request->start_cost,
            'email' => $request->email
        ]);

    return response()->json('driver has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
