<?php

namespace App\Http\Controllers;

use App\Hero;
use Illuminate\Http\Request;
use App\Http\Resources\Hero as HeroResource;
use App\Http\Resources\WithRelations\HeroWithUser as HeroWithUserResource;


class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return HeroResource::collection(Hero::all());
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
     * @param  \Illuminate\Http\Request $request
     * @return HeroResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'level' => 'required|integer',
            'health' => 'required|integer',
            'stamina' => 'required|integer',
            'intelligence' => 'required|integer',
            'charisma' => 'required|integer',
            'resilience' => 'required|integer',
            'person' => 'required|integer',
        ]);

        return new HeroResource(
            Hero::create([
                'level' => $request->get("level"),
                'health' => $request->get("health"),
                'stamina' => $request->get("stamina"),
                'intelligence' => $request->get("intelligence"),
                'charisma' => $request->get("charisma"),
                'resilience' => $request->get("resilience"),
                'person' => $request->get("person"),
            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hero $hero
     * @return HeroResource
     */
    public function show(Hero $hero)
    {
        return new HeroResource($hero);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hero $hero
     * @return \Illuminate\Http\Response
     */
    public function edit(Hero $hero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Hero $hero
     * @return HeroResource
     */
    public function update(Request $request, Hero $hero)
    {
        $this->validate($request, [
            'level' => 'required|integer',
            'health' => 'required|integer',
            'stamina' => 'required|integer',
            'intelligence' => 'required|integer',
            'charisma' => 'required|integer',
            'resilience' => 'required|integer',
            'person' => 'required|integer',
        ]);

        $hero->level = $request->get("level");
        $hero->health = $request->get("health");
        $hero->stamina = $request->get("stamina");
        $hero->intelligence = $request->get("intelligence");
        $hero->charisma = $request->get("charisma");
        $hero->resilience = $request->get("resilience");
        $hero->person = $request->get("person");

        $hero->update();

        return new HeroResource($hero);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hero $hero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hero $hero)
    {
        Hero::destroy($hero->id);
        return response()->json(["message" => "Hero succesvol verwijderd"]);
    }

    public function highscore(){
        return HeroWithUserResource::collection(Hero::orderBy('level')->get());
    }
    public function heroesWithPerson($id){
        return new HeroWithUserResource(Hero::find($id));
    }
}
