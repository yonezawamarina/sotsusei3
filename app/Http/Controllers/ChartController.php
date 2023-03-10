<?php

namespace App\Http\Controllers;

use App\Models\DogFood;
use App\Models\Chart;
use App\Models\Dog;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dog = Dog::find(1);
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
     * @param  \App\Models\Dogfood  $dogfood
     * @return \Illuminate\Http\Response
     */
    public function show(DogFood $dogFood)
    {
      
        return view('chart',['dogfood' => $dogfood]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dogfood  $dogfood
     * @return \Illuminate\Http\Response
     */
    public function edit(Dogfood $dogfood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dogfood  $dogfood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dogfood $dogfood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dogfood  $dogfood
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dogfood $dogfood)
    {
        //
    }
}
