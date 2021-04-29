<?php

namespace Modules\User\Http\Exports;

use Modules\User\Entities\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Role',
            'Created At',
            'Updated'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users         = User::with('role')->select('id','name','email','role_id','created_at','updated_at')->get();
        $list_of_users = array();
        foreach($users as &$user)
        {
            $user->role_id =   $user->role->name;
            array_push($list_of_users, $user);
        }

        return collect($list_of_users);

    }
}
