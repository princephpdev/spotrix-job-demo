<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'job-list',
            'job-create',
            'job-edit',
            'job-delete'
         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['guard_name' => 'sanctum' , 'name' => $permission]);
         }
    }
}
