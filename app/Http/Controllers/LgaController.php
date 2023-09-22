<?php

namespace App\Http\Controllers;

use App\Models\Lga;
use Illuminate\Http\Request;

class LgaController extends Controller
{
 
    public function index()
    {
    
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lga  $lga
     * @return \Illuminate\Http\Response
     */
    public function getLga($state_id)
    {
        $lgas = Lga::where("state_id",$state_id)->get(['id', 'name']);
        return view("components.lga-component",
        [
            "lgas"=>$lgas
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lga  $lga
     * @return \Illuminate\Http\Response
     */
    public function edit(Lga $lga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lga  $lga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lga $lga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lga  $lga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lga $lga)
    {
        //
    }
}
