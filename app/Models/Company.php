<?php

namespace App\Models;

use App\Models\Driver;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Company extends Authenticatable  implements JWTSubject
{
    use HasFactory;
    use Sortable;

    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }
    public function file(){

        return $this->morphMany(File::class,'Fileable');
    }

    protected $fillable =['name','email','password','phonenumber','id','status'];


    public function package()
    {
        return $this->belongsTo(Package::class,'package_id');

    }
}

