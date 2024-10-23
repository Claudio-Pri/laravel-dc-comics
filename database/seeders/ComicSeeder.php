<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Comic;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comic::truncate();
        // leggo il file comics.php e creo una nuova istanza di comic
        $comics = config('comics');
        // dd($comics);
        foreach ($comics as $singleComic) {
            $comic = new Comic();

            $comic->title = $singleComic['title'];
            $comic->description = $singleComic['description'];
            $comic->thumb = $singleComic['thumb'];

            //prendo il prezzo senza il simbolo di valuta
            $priceNumber = floatval(substr($singleComic['price'], 1));
            //uso il numero
            $comic->price = $priceNumber;

            $comic->series = $singleComic['series'];
            $comic->sale_date = $singleComic['sale_date'];
            $comic->type = $singleComic['type'];

            //codifico l'array
            $jsonArtists = json_encode($singleComic['artists']);
            //salvo l'array trasformato in stringa json
            $comic->artists = $jsonArtists;

            $jsonWriters = json_encode($singleComic['writers']);
            $comic->writers = $jsonWriters;

            $comic->save();
        }

    }
}
