<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagName = [
            'Internet',
            'Seo',
            'Programming',
            'Hobby'
        ];

        foreach ($tagName as $tag) {
            Tag::create([
                'name' => $tag
            ]);
        }

        $this->command->info('Successfully Create Tags!');
    }
}
