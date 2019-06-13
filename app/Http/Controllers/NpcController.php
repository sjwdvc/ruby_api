<?php

namespace App\Http\Controllers;

use App\Npc;
use Illuminate\Http\Request;
use App\Http\Resources\Npc as NpcResource;

class NpcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return NpcResource::collection(Npc::all());
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
     * @return NpcResource
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'health' => 'required|integer',
            'profession' => 'required|string',
            'city' => 'required|integer',
            'person' => 'required|integer',
        ]);

        return new NpcResource(
            Npc::create([
                'health' => $request->get("health"),
                'profession' => $request->get("profession"),
                'city' => $request->get("city"),
                'person' => $request->get("person"),
            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Npc  $npc
     * @return NpcResource
     */
    public function show(Npc $npc)
    {
        return new NpcResource($npc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Npc  $npc
     * @return \Illuminate\Http\Response
     */
    public function edit(Npc $npc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Npc $npc
     * @return NpcResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Npc $npc)
    {
        $this->validate($request, [
            'health' => 'required|integer',
            'profession' => 'required|string',
            'city' => 'required|integer',
            'person' => 'required|integer',
        ]);

        $npc->health = $request->get('health');
        $npc->profession = $request->get('profession');
        $npc->city = $request->get('city');
        $npc->person = $request->get('person');

        $npc->update();

        return new NpcResource($npc);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Npc  $npc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Npc $npc)
    {
        Npc::destroy($npc->id);
        return response()->json(["message" => "Npc succesvol verwijderd"]);
    }
}
