<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name'=>'student',
                'full_name'=>'Student',
                'description'=>'This is a student of the school'
            ],
            [
                'name'=>'staff',
                'full_name'=>'Staff',
                'description'=>'This is a staff of the school'
            ],
            [
                'name'=>'admin',
                'full_name'=>'Administrator',
                'description'=>'This is the administrator of the site.'
            ]            
        ]);        
    }
}
