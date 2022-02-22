<?php

namespace App\Http\Controllers;

use App\Creature;
use Illuminate\Http\Request;
use App\Http\Resources\Creature as CreatureResource;

class CreatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return CreatureResource::collection(Creature::all());
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
     * @return CreatureResource
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'attack' => 'required|integer',
            'defense' => 'required|integer',
            'max_health' => 'required|integer',
            'health' => 'required|integer',
            'gold' => 'required|integer',
            'experience' => 'required|integer',
            'spawn' => 'required|integer',
        ]);

        return new CreatureResource(
            Creature::create([
                'id' => $request->get("id"),
                'name' => $request->get("name"),
                'attack' => $request->get("attack"),
                'defense' => $request->get("defense"),
                'max_health' => $request->get("max_health"),
                'health' => $request->get("health"),
                'gold' => $request->get("gold"),
                'experience' => $request->get("experience"),
                'spawn' => $request->get("spawn"),
            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Creature  $creature
     * @return CreatureResource
     */
    public function show(Creature $creature)
    {
        return new CreatureResource($creature);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Creature  $creature
     * @return \Illuminate\Http\Response
     */
    public function edit(Creature $creature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Creature  $creature
     * @return CreatureResource
     */
    public function update(Request $request, Creature $creature)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'attack' => 'required|integer',
            'defense' => 'required|integer',
            'max_health' => 'required|integer',
            'health' => 'required|integer',
            'gold' => 'required|integer',
            'experience' => 'required|integer',
            'spawn' => 'required|integer',
        ]);

        $creature->name = $request->get('name');
        $creature->attack = $request->get('attack');
        $creature->defense = $request->get('defense');
        $creature->max_health = $request->get('max_health');
        $creature->health = $request->get('health');
        $creature->gold = $request->get('gold');
        $creature->experience = $request->get('experience');
        $creature->spawn = $request->get('spawn');

        $creature->update();

        return new CreatureResource($creature);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Creature  $creature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creature $creature)
    {
        Creature::destroy($creature->id);
        return response()->json(["message" => "Creature succesvol verwijderd"]);
    }
}
