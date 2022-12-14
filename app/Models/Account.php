<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;

class Account extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function file(){

        return $this->morphMany(File::class,'Fileable');
    }
    public function User(){
        return $this->morphTo();
    }
}
