<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beer;

class BeerController extends Controller
{
    private $beerValidation = [
        'name' => 'required|string|max:30',
        'brand' => 'required|string|max:50',
        'price' => 'required|numeric',
        'content' => 'required|numeric',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $beers = Beer::all();
        // dd($beers);

        return view('beers.index', compact('beers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate($this->beerValidation);

        $beer = new Beer();
        // $beer->name = $data['name'];
        // $beer->brand = $data['brand'];
        // $beer->price = $data['price'];
        // $beer->content = $data['content'];
        $beer->fill($data);
        $beer->save();

        return redirect()
            ->route('beers.index')
            ->with('message', 'Birra '. $beer->name. ' creata correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Beer $beer)
    {
        // $beer = Beer::find($id);
        // dd($beer->getAttributes());
        return view('beers.show', compact('beer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {   
        $beer = Beer::find($id);
        return view('beers.edit', compact('beer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beer $beer)
    {
        $data = $request->all();

        $request->validate($this->beerValidation);

        $beer->update($data);

        return redirect()
            ->route('beers.index')
            ->with('message', 'Birra '. $beer->name. ' aggiornata correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beer $beer)
    {
        $beer->delete();

        return redirect()
            ->route('beers.index')
            ->with('message', 'Birra '. $beer->name. ' cancellata correttamente');
    }
}
