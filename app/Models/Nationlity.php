<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Nationlity extends Model
{
    use HasFactory;

    public function clients()
    {
       return $this->hasMany(Client::class);
    }
}
