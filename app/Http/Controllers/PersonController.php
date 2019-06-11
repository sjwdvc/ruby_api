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
        return response()->json(Person::all());
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

        return response()->json(
            Person::create([
                'id' => $request->get("id"),
                'name' => $request->get("name"),
                'sex' => $request->get("sex"),
                'max_health' => $request->get("max_health"),
                'attack' => $request->get("attack"),
                'defense' => $request->get("defense"),
                'agility' => $request->get("agility"),
                'experience' => $request->get("experience"),
                'gold' => $request->get("gold"),
                'weapon' => $request->get("weapon"),
                'armor' => $request->get("armor"),
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
        return response()->json($person);
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

        $person->name = $request->get('name');
        $person->sex = $request->get('sex');
        $person->max_health = $request->get('max_health');
        $person->attack = $request->get('attack');
        $person->defense = $request->get('defense');
        $person->agility = $request->get('agility');
        $person->experience = $request->get('experience');
        $person->gold = $request->get('gold');
        $person->weapon = $request->get('weapon');
        $person->armor = $request->get('armor');

        $person->update();

        return response()->json($person);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        Person::destroy($person->id);
        return response()->json(["message" => "Person succesvol verwijderd"]);
    }
}
