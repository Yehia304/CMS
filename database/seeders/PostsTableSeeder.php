<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posts')->delete();
        
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'created_at' => '2021-06-26 06:05:41',
                'updated_at' => '2021-06-26 06:05:41',
                'post_header' => 'Header1',
                'post_thumbnail' => 'users/1/twit.png',
                'post_content' => 'ContentContentContent',
                'user_id' => 1,
                'topic_id' => 6,
            ),
            1 => 
            array (
                'id' => 2,
                'created_at' => '2021-06-26 06:16:28',
                'updated_at' => '2021-06-26 06:16:28',
                'post_header' => 'Header1',
                'post_thumbnail' => 'users/1/twit.png',
                'post_content' => 'ContentContentContent',
                'user_id' => 1,
                'topic_id' => 6,
            ),
            2 => 
            array (
                'id' => 3,
                'created_at' => '2021-06-26 15:22:14',
                'updated_at' => '2021-06-26 15:22:14',
                'post_header' => 'User2s post',
                'post_thumbnail' => 'users/2/face.png',
                'post_content' => 'User2Postcontent',
                'user_id' => 2,
                'topic_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'created_at' => '2021-06-26 15:23:00',
                'updated_at' => '2021-06-26 15:23:00',
                'post_header' => 'Users2 2nd post',
                'post_thumbnail' => 'users/2/yo.png',
                'post_content' => 'PostContent321213124',
                'user_id' => 2,
                'topic_id' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'created_at' => '2021-06-26 15:25:25',
                'updated_at' => '2021-06-26 15:25:25',
                'post_header' => 'Header1',
                'post_thumbnail' => 'users/2/yo.png',
                'post_content' => 'safsadfasdfsaf',
                'user_id' => 2,
                'topic_id' => 4,
            ),
            5 => 
            array (
                'id' => 6,
                'created_at' => '2021-06-26 15:23:00',
                'updated_at' => '2021-06-26 15:23:00',
                'post_header' => 'Users2 2nd post',
                'post_thumbnail' => 'users/2/yo.png',
                'post_content' => 'PostContent321213124',
                'user_id' => 2,
                'topic_id' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'created_at' => '2021-06-26 15:22:14',
                'updated_at' => '2021-06-26 15:22:14',
                'post_header' => 'User2s post',
                'post_thumbnail' => 'users/2/face.png',
                'post_content' => 'User2Postcontent',
                'user_id' => 2,
                'topic_id' => 1,
            ),
        ));
        
        
    }
}