<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ClientRepositoryInterface;
use Illuminate\Http\Request;

class CleintController extends Controller
{
    protected $client;
    public function __construct(ClientRepositoryInterface $client){
        $this->client=$client;
    }
    public function index()
    {
        return $this->client->index();
    }

    public function create()
    {
        return $this->client->create();
    }

    public function store(Request $request)
    {
        return $this->client->store($request);
    }

    public function edit($id)
    {
        return $this->client->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->client->update($request,$id);
    }

    public function destroy($id)
    {
        return $this->client->destroy($id);
    }

    public function bulk_Delete()
    {
        return $this->client->bulk_Delete();
    }
}
