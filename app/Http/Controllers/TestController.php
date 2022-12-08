<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    private $database;

    public function __construct()
    {
        $this->database = \App\Services\FirebaseService::connect();
    }

    public function created(){
        return view('test');
    }
    public function edited(){
        return view('edit');
    }
        public function create(Request $request) 
        {
            $this->database
                ->getReference('test/blogs/' . $request['id'])
                ->set([
                    'location' => $request['location'] ,
                    'lat' => $request['lat'],
                    'long' => $request['long']
                ]);
    
            return response()->json('blog has been created');
        }
    
        public function index() 
        {
            return response()->json($this->database->getReference('test/blogs')->getValue());
        }

    public function edit(Request $request) 
    {
        $this->database->getReference('test/blogs/' . $request['id'])
            ->update([
                'location' => $request['location'] ,
                'lat' => $request['lat'],
                'long' => $request['long']
            ]);

        return response()->json('blog has been edited');
    }
    public function delete(Request $request)
        {
            $this->database
                ->getReference('test/blogs/' . $request['id'])
                ->remove();

            return response()->json('blog has been deleted');
        }


    public function show_location($id) 
    {
        $driver=$this->database->getReference('test/blogs/'.$id)->getValue();
        // return $driver;
        return view('admin.driver.show_location',compact('driver'));


    }

       
}
