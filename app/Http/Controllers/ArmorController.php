<?php

namespace App\Http\Controllers;

use App\Armor;
use Illuminate\Http\Request;
use App\Http\Resources\Armor as ArmorResource;

class ArmorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ArmorResource::collection(Armor::all());
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
     * @return ArmorResource
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'price' => 'required|integer',
            'defense' => 'required|integer',
        ]);

        return new ArmorResource(
            Armor::create([
                'name' => $request->get("name"),
                'price' => $request->get("price"),
                'defense' => $request->get("defense"),
            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Armor  $armor
     * @return ArmorResource
     */
    public function show(Armor $armor)
    {
        return new ArmorResource($armor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Armor  $armor
     * @return \Illuminate\Http\Response
     */
    public function edit(Armor $armor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Armor  $armor
     * @return ArmorResource
     */
    public function update(Request $request, Armor $armor)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'price' => 'required|integer',
            'defense' => 'required|integer',
        ]);

        $armor->name = $request->get('name');
        $armor->price = $request->get('price');
        $armor->defense = $request->get('defense');

        $armor->update();

        return new ArmorResource($armor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Armor  $armor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Armor $armor)
    {
        Armor::destroy($armor->id);
        return response()->json(["message" => "Armor succesvol verwijderd"]);
    }
}
