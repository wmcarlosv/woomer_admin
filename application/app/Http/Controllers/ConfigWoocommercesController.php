<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConfigWoocommerce;

class ConfigWoocommercesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cws = ConfigWoocommerce::all();

        return view('admin.config_woocommerces.home',['cws' => $cws]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.config_woocommerces.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
        $request->validate([
            'url' => 'required',
            'client_key' => 'required',
            'client_secret' => 'required'
        ]);

        $cw = new ConfigWoocommerce();
        $cw->url = $request->input('url');
        $cw->client_key = $request->input('client_key');
        $cw->client_secret = $request->input('client_secret');
        $cw->version = $request->input('version');
        $cw->save();

        flash('Registro Insertado con Exito!!')->success();

        return redirect()->route('config_woocommerces.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cw = ConfigWoommerce::findorfail($id);
        return view('admin.config_woocommerces.edit',['cw'=>$cw]);
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
        $request->validate([
            'url' => 'required',
            'client_key' => 'required',
            'client_secret' => 'required'
        ]);

        $cw = ConfigWoocommerce::findorfail($id);
        $cw->url = $request->input('url');
        $cw->client_key = $request->input('client_key');
        $cw->client_secret = $request->input('client_secret');
        $cw->version = $request->input('version');
        $cw->update();

        flash('Registro Actualizado con Exito!!')->success();

        return redirect()->route('config_woocommerces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cw = ConfigWoocommerce::findorfail($id);
        $cw->delete();

        flash('Registro Eliminado con Exito!!')->success();

        return redirect()->route('config_woocommerces.index');
    }
}
