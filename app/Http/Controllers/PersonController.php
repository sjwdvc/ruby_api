<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return json_encode(Person::all());
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
            'sex' => 'required|in:m,f',
            'max_health' => 'required|integer',
            'attack' => 'required|integer',
            'defense' => 'required|integer',
            'agility' => 'required|integer',
            'experience' => 'required|integer',
            'gold' => 'required|integer',
            'weapon' => 'required|integer',
            'armor' => 'required|integer',
        ]);

        return json_encode(
            Person::create([
                'id' => $request["id"],
                'name' => $request["name"],
                'sex' => $request["sex"],
                'max_health' => $request["max_health"],
                'attack' => $request["attack"],
                'defense' => $request["defense"],
                'agility' => $request["agility"],
                'experience' => $request["experience"],
                'gold' => $request["gold"],
                'weapon' => $request["weapon"],
                'armor' => $request["armor"],
            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
    }
}
