<?php

namespace Modules\Roles\Entities;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [];

    public function role()
    {
        return $this->belongsTo('Modules\Roles\Entities\Role');
    }


}
