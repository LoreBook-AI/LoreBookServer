<?php

namespace App\Http\Controllers;

use App\Models\Effect;
use Illuminate\Http\Request;

class EffectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Effect $effect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Effect $effect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Effect $effect)
    {
        //
    }

    public function applyEffect(Effect $effect): void
    {

    }

    public function removeEffect(Effect $effect): void
    {

    }
}
