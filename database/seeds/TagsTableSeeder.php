<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
        $i = 0; 
       factory(App\Tag::class, 4)
        ->create()
        ->each(function ($t, $i) {
            $tags = ["Carrots", "Trees", "Brocolli", "Tag"];         
            $t->name = $tags[$i];
            $t->save();
            $i++;
        });
    }

}
