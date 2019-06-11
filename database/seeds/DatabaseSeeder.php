<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class
DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

//        $types = [
//            'A+',
//            'A-',
//            'B+',
//            'B-',
//            'AB+',
//            'AB-',
//            'O+',
//            'O-',
//        ];
//
//        foreach ($types as $type) {
//            DB::table('blood_types')->insert([
//                'blood_type' => $type
//
//            ]);
//
//        }
//                $roles = [
//                'admin',
//                'client',
//                'insurance',
//                'doctor',
//                'pharmacy',
//                'hospital',
//                'specialist',
//            ];
//
//            foreach ($roles as $role) {
//                Role::create(['name' => $role]);
//            }

        $permissions = [
//                'role-list',
//                'role-create',
//                'role-edit',
//                'role-delete',
//                'permission-list',
//                'permission-create',
//                'permission-edit',
//                'permission-delete',
//                'user-list',
//                'user-create',
//                'user-edit',
//                'user-delete',
//                'client-list',
//                'client-create',
//                'client-edit',
//                'client-delete',
//                'doctor-list',
//                'doctor-create',
//                'doctor-edit',
//                'doctor-delete',
//                'consult-list',
//                'consult-create',
//                'consult-edit',
//                'consult-delete',
//                'disease-list',
//                'disease-create',
//                'disease-edit',
//                'disease-delete',
//            'treatment-list',
//            'treatment-create',
//            'treatment-edit',
//            'treatment-delete',
//            'medicine-list',
//            'medicine-create',
//            'medicine-edit',
//            'medicine-delete',
//            'insurers-list',
//            'insurers-create',
//            'insurers-edit',
//            'insurers-delete',
//            'department-list',
//            'department-create',
//            'department-edit',
//            'department-delete',
//            'bed-list',
//            'bed-create',
//            'bed-edit',
//            'bed-delete',
//        'bed-show',
//        'role-show',
//        'permission-show',
//        'user-show',
//        'client-show',
//        'doctor-show',
//        'consult-show',
//        'disease-show',
//        'treatment-show',
//        'medicine-show',
//        'insurers-show',
//        'department-show',
        'prescription-create',
        'prescription-show',
        'prescription-edit',
        'prescription-delete',
        'prescription-list',



        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }


//        factory(App\User::class, 10)->create()->each(function ($user) {
//            $user->assignRole('specialist');
//
//        });
        // factory(App\User::class, 10)->create()->each(function ($user) {
        //     $user->assignRole('doctor');
        // });
        // factory(App\User::class, 10)->create()->each(function ($user) {
        //     $user->assignRole('admin');
        // });
        // factory(App\User::class, 10)->create()->each(function ($user) {
        //     $user->assignRole('client');
        // });
        // factory(App\User::class, 10)->create()->each(function ($user) {
        //     $user->assignRole('pharmacy');
        // });
        // factory(App\User::class, 10)->create()->each(function ($user) {
        //     $user->assignRole('specialist');
        // });
        // factory(App\User::class, 10)->create()->each(function ($user) {
        //     $user->assignRole('hospital');
        // });
//        // $this->call(UsersTableSeeder::class);


    }
}
