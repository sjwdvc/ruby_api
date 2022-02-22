<?php

namespace App\Http\Controllers;

use App\Http\Resources\Region as RegionResource;
use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return RegionResource::collection(Region::all());
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
     * @return RegionResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'holder' => 'required|integer',
        ]);

        return new RegionResource(
            Region::create([
                'name' => $request->get("name"),
                'holder' => $request->get("holder"),
            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return RegionResource
     */
    public function show(Region $region)
    {
        return new RegionResource($region);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Region $region
     * @return RegionResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Region $region)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'holder' => 'required|integer',
        ]);

        $region->name = $request->get('name');
        $region->holder = $request->get('holder');

        $region->update();

        return new RegionResource($region);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        Region::destroy($region->id);
        return response()->json(["message" => "Region succesvol verwijderd"]);
    }
}
