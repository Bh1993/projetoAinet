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
        $this->call(UsersTableSeeder::class);
        $this->call(AdvertisementsTableSeeder::class);
        //$this->call(MediaTableSeeder::class);
        //$this->call(BidsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
       }
}
