<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client  extends Authenticatable  implements JWTSubject
{
    use Sortable;

    use HasFactory, Notifiable;

    protected $fillable =['name','email','password','nationality_id','phonenumber','id','status','id_number'];

    protected $hidden = [
        'password',
    ];



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

    public function nationality()
    {
        return $this->belongsTo(Nationlity::class,'nationality_id');
    }
}
