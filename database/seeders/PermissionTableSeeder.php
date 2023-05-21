<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            "قائمة الصلاحيات",
            "انشاء صلاحيات لمدير",
            "تعديل صلاحيات لمدير",
            "انشاء مدير",
            "تعديل بيانات المستخدمين",
            "اظهار حسابات الادارة",
         ];

         foreach ($permissions as $permission) {
              Permission::create(['guard_name' => 'admin','name' => $permission]);
         }
    }
}
