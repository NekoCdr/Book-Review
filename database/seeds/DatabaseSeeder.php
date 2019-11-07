<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Author::class, 10)->create()->each(function($author){
            $author->books()->saveMany(factory(App\Book::class, 10)->make());
        });
    }
}
