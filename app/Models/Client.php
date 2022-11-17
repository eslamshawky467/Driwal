<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Client extends Model
{
    protected $guarded = [];
    use Sortable;
    public function nationality(){
        return $this->belongsTo(Nationlity::class, 'nationality_id');
    }
}