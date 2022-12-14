<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Package extends Model
{
    use HasFactory, Sortable;
    protected $guarded=[];
    protected $table='packges';

    public function file(){

        return $this->morphOne(File::class,'Fileable');
    }
    public function zones(){
        return $this->hasMany(Zone::class,'package_id');
    }
}
