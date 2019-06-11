<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Animal::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required|string',
            'speed' => 'required|integer',
            'defense' => 'required|integer',
            'loyalty' => 'required|integer',
            'owner' => 'required|integer',
        ]);

        return response()->json(
            Animal::create([
                'type' => $request->get("type"),
                'speed' => $request->get("speed"),
                'defense' => $request->get("defense"),
                'loyalty' => $request->get("loyalty"),
                'owner' => $request->get("owner"),
            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        return response()->json($animal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $this->validate($request, [
            'type' => 'required|string',
            'speed' => 'required|integer',
            'defense' => 'required|integer',
            'loyalty' => 'required|integer',
            'owner' => 'required|integer',
        ]);

        $animal->type = $request->get('type');
        $animal->speed = $request->get('speed');
        $animal->defense = $request->get('defense');
        $animal->loyalty = $request->get('loyalty');
        $animal->owner = $request->get('owner');

        $animal->save();
        return response()->json($animal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        Animal::destroy($animal->id);
        return response()->json(["message" => "Animal succesvol verwijderd"]);
    }
}
