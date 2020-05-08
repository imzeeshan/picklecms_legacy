<?php

namespace Modules\Posts\Entities;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Post extends Model
{
    use Sortable;
    public $sortable = ['id','title','category_id','tags'];

    protected $fillable = [];

    public function category(){
        return $this->hasOne('Modules\Posts\Entities\Category','id','category_id');
    }

    public function author(){
        return $this->hasOne('Modules\User\Entities\User','id','created_by');
    }
}
