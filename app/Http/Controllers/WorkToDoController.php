<?php

namespace App\Http\Controllers;
use App\{work_to_do_db,worksheet_db,vehicle_db,User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        DB::transaction(function()use($request){
          $countWorks = count($request['description']);
          for ($i=0; $i < $countWorks; $i++) {
              work_to_do_db::create([
              "description" => $request['description'][$i],
              "worksheet_id"=> $request['worksheet_id'],
            ]);
          }
        });
        $countWorks = count($request['description']);
        return back()->with('status', 'Haz ingresado '.$countWorks.' tareas exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($newWorkSheet)
    {
      $responsable = User::get();
      $worksCreated = work_to_do_db::where('worksheet_id', $newWorkSheet)->get();
      $vehicleInfo = worksheet_db::
                join('vehicle_dbs', 'vehicle_dbs.vehicle_id', '=', 'worksheet_dbs.vehicle_id')
                ->where('worksheet_id', $newWorkSheet)->get();
      return view('client/fillWorkToDo', compact('newWorkSheet','worksCreated','vehicleInfo','responsable'));
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
      work_to_do_db::where('worktodo_id', $id)
       ->update([ 'statusWork' => $request['statusWork'] ]);
      return back()->with('status','El elemento fue actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      work_to_do_db::destroy($id);
      return back()->with('status','El elemento fue eliminado exitosamente');//nombre de la ruta
    }
}
