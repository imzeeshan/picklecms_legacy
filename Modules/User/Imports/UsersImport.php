<?php

namespace Modules\User\Http\Imports;

use Modules\User\Entities\User;
use Modules\Roles\Entities\Role;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'     => $row['name'],
            'email'    => $row['email'],
            'role_id'  => Role::where('name',$row['role'])->first()->id,
            'password' => bcrypt(Str::random(10))
        ]);
    }
}
