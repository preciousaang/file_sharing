<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
               [                
                'username'=>'preciousaang',                
                'role_id'=>3,
                'email'=>'preciousaang@mail.com',
                'password'=>bcrypt('albert'),                
               ],
               [                
                'username'=>'preciousone',                
                'role_id'=>2,
                'email'=>'preciousone@mail.com',
                'password'=>bcrypt('albert'),
               ],
               [                
                'username'=>'precious',                
                'role_id'=>1,
                'email'=>'precious@mail.com',
                'password'=>bcrypt('albert'),
               ]
            ]
        );        
    }
}
