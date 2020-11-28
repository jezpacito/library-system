<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           \App\User::create([
            'fname' =>'admin',
            'lname' =>'admin',
            'mname' =>'admin',
            'res_address'=>'general santos city',
            'landline_no'=>1232323232,
            'mobile_no'=>1332323,
            'email'=>'admin@admin.com',
            'password'=>\Illuminate\Support\Facades\Hash::make('password')
        ])->assignRole('admin');

        \App\User::create([
            'fname' =>'member',
            'lname' =>'member',
            'mname' =>'member',
            'res_address'=>'general santos city',
            'landline_no'=>1232323232,
            'mobile_no'=>1332323,
            'email'=>'member@member.com',
            'password'=>\Illuminate\Support\Facades\Hash::make('password')
        ])->assignRole('member');

        \App\User::create([
            'fname' =>'member2',
            'lname' =>'member2',
            'mname' =>'member2',
            'res_address'=>'general santos city',
            'landline_no'=>1232323232,
            'mobile_no'=>1332323,
            'email'=>'member2@member.com',
            'password'=>\Illuminate\Support\Facades\Hash::make('password')
        ])->assignRole('member');

        foreach(Spatie\Permission\Models\Role::all() as $role) {
            $users = factory(\App\User::class, 10)->create();
            foreach($users as $user){
                $user->assignRole($role);
            }
        }
    }
}

