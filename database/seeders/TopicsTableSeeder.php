<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('topics')->delete();
        
        \DB::table('topics')->insert(array (
            0 => 
            array (
                'id' => 6,
                'topic_name' => 'General',
            ),
            1 => 
            array (
                'id' => 5,
                'topic_name' => 'Literature',
            ),
            2 => 
            array (
                'id' => 3,
                'topic_name' => 'Movies',
            ),
            3 => 
            array (
                'id' => 4,
                'topic_name' => 'Music',
            ),
            4 => 
            array (
                'id' => 1,
                'topic_name' => 'Science',
            ),
            5 => 
            array (
                'id' => 2,
                'topic_name' => 'Sports',
            ),
        ));
        
        
    }
}