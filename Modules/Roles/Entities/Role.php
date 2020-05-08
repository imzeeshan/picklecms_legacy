<?php

namespace Modules\Roles\Entities;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Role extends Model
{
    use Sortable;
    protected $fillable = [];

    public $sortable = ['id','name'];

}
