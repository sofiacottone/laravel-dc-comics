<?php

namespace Database\Seeders;

use App\Models\Comic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $comics = config('comics');

        foreach ($comics as $comic) {
            // create istance 
            $newComic = new Comic();

            // populate attributes with mass assignment
            $newComic->fill($comic);
            // $newComic->title = $comic['title'];
            // $newComic->description = $comic['description'];
            // $newComic->thumb = $comic['thumb'];
            // $newComic->price = $comic['price'];
            // $newComic->series = $comic['series'];
            // $newComic->sale_date = $comic['sale_date'];
            // $newComic->type = $comic['type'];

            // save
            $newComic->save();
        }
    }
}
