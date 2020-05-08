<?php

namespace Modules\Media\Entities;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [];

    public function author(){
        return $this->hasOne('Modules\User\Entities\User','id','created_by');
    }

}
