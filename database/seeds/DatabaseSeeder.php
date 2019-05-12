<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AccountSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(DiscussionSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(ReplyCommentSeeder::class);
        $this->call(ListeningPartSeeder::class);
        $this->call(Part1sSeeder::class);
        $this->call(Part2sSeeder::class);
    }
}
