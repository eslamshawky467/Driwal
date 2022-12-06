<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Package;
use App\Models\Company;

class Request extends Model
{
    use HasFactory;
    protected $fillable =['package_id','company_id','status','location'];


    protected $casts = [
        'location' => 'array',
    ];

    public function Packge()
    {
        return $this->belongsTo(Package::class,'package_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }
    public function file(){

        return $this->morphMany(File::class,'Fileable');
    }

}
