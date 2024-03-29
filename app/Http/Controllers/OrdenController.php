<?php

namespace App\Http\Controllers;

use App\Models\orden;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $datos['ordens']=Orden::paginate(6);

      return view('orden.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('orden.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosOrden=request()->except('_token');

        Orden::insert($datosOrden);

        //return response()->json($datosBien);
        return redirect('Orden');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function show(Orden $orden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orden = Orden::findOrFail($id);

        return view('orden.edit',compact('orden'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosOrden=request()->except(['_token','_method']);
        Bien::where('id', '=', $id)->update($datosOrden);

        $bien = Bien::findOrFail($id);
        return view('orden.edit',compact('orden'));
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\orden  $orden
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        Orden::destroy($id);

        return redirect('Orden');
    }
}
