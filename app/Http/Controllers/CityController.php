<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(City::all());
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'region' => 'required|integer',
        ]);

        return response()->json(
            City::create([
                'name' => $request->get("name"),
                'region' => $request->get("region"),
            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return response()->json($city);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\City $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'region' => 'required|integer',
        ]);

        $city->name = $request->get('name');
        $city->region = $request->get('region');

        $city->update();

        return response()->json($city);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        City::destroy($city->id);
        return response()->json(["message" => "City succesvol verwijderd"]);
    }
}
