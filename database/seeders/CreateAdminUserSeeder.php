<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::create([
            'name' => 'Ammar Hasan',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin@admin.com'),
            'type' => 'Super',
            'status' => true,
            'phone' => '+963 123456789',
            'balance' => 0,
        ]);
        $fadee = User::create([
            'name' => 'fadee',
            'email' => 'user@user.com',
            'password' => bcrypt('user@user.com'),
            // 'type' => 'Super',
            'status' => true,
            'phone' => '+963 123456789',
            'balance' => 0,
        ]);


        // $role = Role::create(['name' => 'Super']);

        // $permissions = Permission::pluck('id','id')->all();

        // $role->syncPermissions($permissions);

        // $user->assignRole([$role->id]);

        //create Role For Admin in new guard
        // Create a manager role for users authenticating with the admin guard:
        $role = Role::create(['guard_name' => 'admin', 'name' => 'Super']);
        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
