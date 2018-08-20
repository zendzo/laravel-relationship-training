<?php

use Illuminate\Database\Seeder;

class TaggableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taggableType = ['App\Post','App\Video'];

        for ($i=0; $i < 10; $i++) { 
            DB::table('taggables')->insert([
                'tag_id' => rand(1,4),
                'taggable_id' => rand(1,10),
                'taggable_type' => $taggableType[rand(0,1)]
            ]);
        }

        $this->command->info('Succesfully Create Taggable');
    }
}
