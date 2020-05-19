<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use Illuminate\Validation\Rule;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return $cars;
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
        $validatedData = $request->validate([
            'nome' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'marca' => 'required|string|in:Fiat,GM,Volkswagen|max:50',
            'tipo' => 'required|string|in:Passeio,SUV,Caminhonete|max:50',
            'ano' => 'required|',
            'placa' => 'required|string|max:50|unique:App\Car,placa',
        ]);

        $car              = new Car;

        $car->nome        = $request->nome;
        $car->modelo      = $request->modelo;
        $car->marca       = $request->marca;
        $car->tipo        = $request->tipo;
        $car->ano         = $request->ano;
        $car->placa       = $request->placa;

        $car->save();
        return $car;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'marca' => 'required|string|in:Fiat,GM,Volkswagen|max:50',
            'tipo' => 'required|string|in:Passeio,SUV,Caminhonete|max:50',
            'ano' => 'required|',
            'placa' => ['required', 'string', 'max:50', Rule::unique('cars')->ignore($id)],
        ]);

        $car              = Car::find($id);

        $car->nome        = $request->nome;
        $car->modelo      = $request->modelo;
        $car->marca       = $request->marca;
        $car->tipo        = $request->tipo;
        $car->ano         = $request->ano;
        $car->placa       = $request->placa;

        $car->save();
        return $car;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
        return $car;
    }
}
