<?php

namespace Modules\Posts\Entities;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use Sortable;
    protected $fillable = [];
    public $sortable = ['id','name'];
}
