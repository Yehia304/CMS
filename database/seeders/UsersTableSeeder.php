<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Yehia Ibrahim',
                'email' => 'yehiafml20333@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$im3/qm91JtJxreA5.WSywOmHnE5rNSdoxNmTJfvlO1.xC0ZdOsXLu',
                'remember_token' => NULL,
                'created_at' => '2021-06-25 16:46:11',
                'updated_at' => '2021-06-25 16:46:11',
                'is_admin' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Blogger2',
                'email' => 'yehiafml20444@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$OgdofbG.cKyQpry35MH/cuevOjQVPJRYFHKmncs9zbGdesVdBHw4O',
                'remember_token' => NULL,
                'created_at' => '2021-06-26 15:19:54',
                'updated_at' => '2021-06-26 15:19:54',
                'is_admin' => 0,
            ),
        ));
        
        
    }
}