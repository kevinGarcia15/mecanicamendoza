<?php

namespace App\Http\Controllers;
use App\replacement_db;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReplacementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      DB::transaction(function()use($request){
        $countReplacement = count($request['quantity']);
        for ($i=0; $i < $countReplacement; $i++) {
            replacement_db::create([
            "quantity" => $request['quantity'][$i],
            "description" => $request['description'][$i],
            "price" => $request['price'][$i],
            "worksheet_id"=> $request['worksheet_id'],
          ]);
        }
      });
      return back()->with('status', 'Elemento creado exitosamente');
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
      replacement_db::where('remplacement_id', $id)
       ->update(['quantity' => $request['quantity'],
                 'description' => $request['description'],
                 'price' => $request['price']
                ]);

      return back()->with('status','el elemento fué actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      replacement_db::destroy($id);
      return back()->with('status','El elemento fue eliminado exitosamente');//nombre de la ruta
    }
}
