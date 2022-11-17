<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Driver extends Model
{
    protected $guarded = [];

    use Sortable;

    public $table = 'drivers';

    use HasFactory;

    public function nation(){
        return $this->belongsTo(Nationlity::class, 'nationality_id');
    }
}
