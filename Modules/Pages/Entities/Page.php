<?php

namespace Modules\Pages\Entities;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [];

    public function author(){
        return $this->hasOne('Modules\User\Entities\User','id','created_by');
    }

}
