<?php

namespace App\Http\Controllers;

use App\Weapon;
use Illuminate\Http\Request;

class WeaponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Weapon::all());
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
            'name' => 'required|string',
            'price' => 'required|integer',
            'attack' => 'required|integer',
        ]);

        return response()->json(
            Weapon::create([
                'name' => $request->get("name"),
                'price' => $request->get("price"),
                'attack' => $request->get("attack"),
            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Weapon  $weapon
     * @return \Illuminate\Http\Response
     */
    public function show(Weapon $weapon)
    {
        return response()->json($weapon);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Weapon  $weapon
     * @return \Illuminate\Http\Response
     */
    public function edit(Weapon $weapon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Weapon  $weapon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Weapon $weapon)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'price' => 'required|integer',
            'attack' => 'required|integer',
        ]);

        $weapon->name = $request->get('name');
        $weapon->price = $request->get('price');
        $weapon->attack = $request->get('attack');

        $weapon->update();

        return response()->json($weapon);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Weapon  $weapon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weapon $weapon)
    {
        Weapon::destroy($weapon->id);
        return response()->json(["message" => "Weapon succesvol verwijderd"]);
    }
}
