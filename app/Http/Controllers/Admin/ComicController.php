<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

// Models
use App\Models\Comic;


class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::get();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //visualizzazione del form
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validazione dati
        // $request->validate([
        //     //
        // ]);

        //salvataggio del dato (form)

        $data = $request->all();

        $comic = new Comic();

        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];

        //prendo il prezzo senza il simbolo di valuta
        $priceNumber = floatval($data['price']);
        //uso il numero
        $comic->price = $priceNumber;

        $comic->series = $data['series'];
        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type'];

        //ricevo una stringa separata da virgola
        //esplodo la stringa sulle virgole
        $explodedArtists = explode(',', $data['artists']);
        //codifico il nuovo array
        $jsonArtists = json_encode($explodedArtists);
        //salvo l'array trasformato in stringa json
        $comic->artists = $jsonArtists;


        $explodedWriters = explode(',', $data['writers']);
        $jsonWriters = json_encode($explodedWriters);
        $comic->writers = $jsonWriters;

        $comic->save();

        //opzione 1 redirect all'index
        // return redirect()->route('comics.index');

        //opzione 2 redirect allo show del comic inserito
        return redirect()->route('comics.show', ['comic' => $comic->id]);
        // dd($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        //restituisco la view con il dato comic
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        // dd($comic->artists);
        // $artistsString = implode(',', json_decode($comic->artists));
        // dd($artistsString);
        return view('comics.edit', compact('comic'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {

        $data = $request->all();
        // dd($data);

        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];

        
        $priceNumber = floatval($data['price']);
        
        $comic->price = $priceNumber;

        $comic->series = $data['series'];
        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type'];

        //ricevo una stringa separata da virgola
        //esplodo la stringa sulle virgole
        $explodedArtists = explode(',', $data['artists']);
        //codifico il nuovo array
        $jsonArtists = json_encode($explodedArtists);
        //salvo l'array trasformato in stringa json
        $comic->artists = $jsonArtists;

        $explodedWriters = explode(',', $data['writers']);
        $jsonWriters = json_encode($explodedWriters);
        $comic->writers = $jsonWriters;
        
        $comic->save();

        return redirect()->route('comics.show', ['comic' => $comic->id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        //
    }
}
