<?php

use Illuminate\Database\Seeder;

class AdvertisementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\Advertisement::class, 100) 
       	->create()
       	->each(function ($a) {
       		$a->media()->save(factory(App\Media::class)->make());
          $a->comments()->save(factory(App\Comment::class)->make());
       	});
    }
}
