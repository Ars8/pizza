<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavoritePizzaRequest;
use App\Models\FavoritePizza;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FavoritePizzaResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response('work');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $favoritePizza = new FavoritePizza();
        $favoritePizza->pizza_id = $request->item_id;
        $favoritePizza->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(FavoritePizza $favoritePizza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FavoritePizza $favoritePizza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FavoritePizza $favoritePizza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FavoritePizza $favoritePizza)
    {
        //
    }
}
