<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Packge;
use App\Models\Company;

class Request extends Model
{
    use HasFactory;
    protected $fillable =['package_id','company_id','staus'];

    public function Packge()
    {
        return $this->belongsTo(Packge::class,'package_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }

}
