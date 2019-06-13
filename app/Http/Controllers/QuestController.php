<?php

namespace App\Http\Controllers;

use App\Quest;
use Illuminate\Http\Request;

class QuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Quest::all());
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
            'title' => 'required|string',
            'experience' => 'required|integer',
            'gold' => 'required|integer',
            'publisher' => 'required|integer',
            'holder' => 'required|integer',
        ]);

        return response()->json(
            Quest::create([
                'title' => $request->get("title"),
                'experience' => $request->get("experience"),
                'gold' => $request->get("gold"),
                'publisher' => $request->get("publisher"),
                'holder' => $request->get("holder"),

            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function show(Quest $quest)
    {
        return response()->json($quest);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function edit(Quest $quest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quest $quest)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'experience' => 'required|integer',
            'gold' => 'required|integer',
            'publisher' => 'required|integer',
            'holder' => 'required|integer',
        ]);

        $quest->title = $request->get('title');
        $quest->experience = $request->get('experience');
        $quest->gold = $request->get('gold');
        $quest->publisher = $request->get('publisher');
        $quest->holder = $request->get('holder');

        $quest->update();

        return response()->json($quest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quest $quest)
    {
        Quest::destroy($quest->id);
        return response()->json(["message" => "Quest succesvol verwijderd"]);
    }
}
