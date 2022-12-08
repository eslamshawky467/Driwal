<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;

class Advertisement extends Model
{
    use HasFactory;
    protected $fillable =['name'];

    public function file(){

        return $this->morphMany(File::class,'Fileable');
    }

}
