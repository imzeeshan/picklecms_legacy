<?php

namespace Modules\Roles\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PermissionsSeederTableSeeder extends Seeder
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
        DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('permissions')->insert([
            'permissions' => 111,
            'entity' => 'user',
            'entity_type' => 'module',
            'role_id'     => 1
        ]);

        DB::table('permissions')->insert([
            'permissions' => 111,
            'entity' => 'roles',
            'entity_type' => 'module',
            'role_id'     => 1
        ]);

        DB::table('permissions')->insert([
            'permissions' => 100,
            'entity' => '/home',
            'entity_type' => 'route',
            'role_id'     => 1
        ]);

        DB::table('permissions')->insert([
            'permissions' => 111,
            'entity' => 'posts',
            'entity_type' => 'module',
            'role_id'     => 1
        ]);

        DB::table('permissions')->insert([
            'permissions' => 111,
            'entity' => 'media',
            'entity_type' => 'module',
            'role_id'     => 1
        ]);

        DB::table('permissions')->insert([
            'permissions' => 111,
            'entity' => 'categories',
            'entity_type' => 'route',
            'role_id'     => 1
        ]);

        DB::table('permissions')->insert([
            'permissions' => 111,
            'entity' => 'pages',
            'entity_type' => 'module',
            'role_id'     => 1
        ]);


        DB::table('permissions')->insert([
            'permissions' => 100,
            'entity' => 'user',
            'entity_type' => 'module',
            'role_id'     => 2
        ]);

        DB::table('permissions')->insert([
            'permissions' => 100,
            'entity' => 'roles',
            'entity_type' => 'module',
            'role_id'     => 2
        ]);
    }
}
