<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\tweets;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\tweets::class, 1)->create()->each(function($tweets) {
            $entity = factory(App\Models\tweets::class)->make();

            $address = factory(App\Models\tweets::class)->create([
                'name' => $entity,
                'email' => $entity,
                'password' => $entity
            ]);

            $tweets = entities()->save($entity);
        });
    }
}
