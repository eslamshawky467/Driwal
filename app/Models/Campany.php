<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Campany extends Model
{
    protected $guarded = [];
    use Sortable;
    public $table = 'companies';
    use HasFactory;
}
