<?php

use Illuminate\Database\Seeder;
use App\POst;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Post::create([
         

            'title' => 'Rubbish Rubbish Rubbish ' ,

            'body' => 'Rubbish Rubbish Rubbish Rubbish ',

           'featured' => 'Rubbish Rubbish Rubbish Rubbish Rubbish '

        ]);
    }
}
