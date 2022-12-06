<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kyslik\ColumnSortable\Sortable;
use App\Models\File;
use App\Models\Account;

class Driver extends  Authenticatable  implements JWTSubject
{
    use HasFactory;
    use Sortable;

    protected $fillable =['name','email','password','nationality_id','phonenumber','id','status','id_number','start_cost'];

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
    public function nation(){
        return $this->belongsTo(\App\Models\Nationlity::class,'nationality_id');
    }
    public function file(){

        return $this->morphMany(File::class,'Fileable');
    }
    public function account(){

        return $this->morphOne(Account::class,'User');
    }



}
