<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin',
            'client',
            'insurance',
            'doctor',
            'pharmacy',
            'hospital',
            'medic',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
