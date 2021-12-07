<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\tweets;

class TweetsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(tweets::class, 1)->create()->make();
    }
}