<?php

namespace Modules\Roles\Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RolesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('roles')->insert([ 'name' => 'Admin']);
        DB::table('roles')->insert([ 'name' => 'Editor']);
        DB::table('roles')->insert([ 'name' => 'User']);

        $this->call("Modules\Roles\Database\Seeders\PermissionsSeederTableSeeder");

    }
}
