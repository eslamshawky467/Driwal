<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\ClientAccountRepositoryInterface;

class ClientAccountController extends Controller
{
    protected $account;
    public function __construct(ClientAccountRepositoryInterface $account){
        $this->account=$account;
    }
    public function index()
    {
        return $this->account->index();
    }
    public function create()
    {
        return $this->account->create();
    }
    public function approve($id)
    {
        return $this->account->approve($id);
    }
    public function delete($id)
    {
        return $this->account->delete($id);
    }
    public function edit($id)
    {
        return $this->account->edit($id);
    }
    public function update(Request $request ,$id)
    {
        return $this->account->update($request ,$id);
    }

    public function show($id)
    {
        return $this->account->show($id);
    }

    public function deletefile($id)
    {
        return $this->account->deletefile($id);
    }
    public function store(Request $request )
    {
        return $this->account->store($request );
    }
}
