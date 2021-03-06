<?php

namespace App\Http\Controllers;
use App\{worksheet_db,work_to_do_db,replacement_db};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MechanicalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user_id = Auth::id();
      $listworksheet = worksheet_db::
       join('vehicle_dbs', 'worksheet_dbs.vehicle_id', '=', 'vehicle_dbs.vehicle_id')
       ->join('car_color_dbs', 'vehicle_dbs.color_id', '=', 'car_color_dbs.color_id')
       ->join('car_line_dbs', 'vehicle_dbs.line_id', '=', 'car_line_dbs.line_id')
       ->join('brand_car_dbs', 'car_line_dbs.brand_car_id', '=', 'brand_car_dbs.brand_id')
       ->where('users_id', $user_id )
       ->where('statusWorksheet', '!=', 0)
       ->orderBy('worksheet_dbs.workSheetCreated_at', 'DESC')->paginate(10);
      return view('mechanical/index',compact('listworksheet'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $dateCreatedWorksheet = worksheet_db::where('worksheet_id', $id)->get();
      $workToDo = work_to_do_db::where('worksheet_id', $id)->get();
      $remplacement = replacement_db::where('worksheet_id', $id)->get();
      $workSheetDetail = worksheet_db::
       join('vehicle_dbs', 'worksheet_dbs.vehicle_id', '=', 'vehicle_dbs.vehicle_id')
       ->join('car_color_dbs', 'vehicle_dbs.color_id', '=', 'car_color_dbs.color_id')
       ->join('car_line_dbs', 'vehicle_dbs.line_id', '=', 'car_line_dbs.line_id')
       ->join('brand_car_dbs', 'car_line_dbs.brand_car_id', '=', 'brand_car_dbs.brand_id')
       ->join('users', 'worksheet_dbs.users_id', '=', 'users.id')
       ->where('worksheet_id', $id)->get();

       if ($workSheetDetail[0]['statusWorksheet'] == 0) {
         return redirect()->route('mechanical.index');
       }
       return view('mechanical/worksheetDetail',compact(
         'workSheetDetail','dateCreatedWorksheet','workToDo','remplacement'
       ));
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
      if ($request['verifyEmptyWorks'] == 0) {
        return back()->with('error', 'No se pudo enviar la hoja de trabajo porque no tiene ninguna tarea asignada');
      }
/*valida si hay tareas activas-----------------------------------------------*/
      $worksNoFinished = work_to_do_db::where('worksheet_id', $id)
        ->where('statusWork', 1)->get();
        if (count($worksNoFinished) > 0) {
          return back()->with('error', 'No se pudo enviar la hoja de trabajo porque tiene tareas activas');
        }
      //cambia el staus a 2 el trabajo esta terminado----------
        worksheet_db::where('worksheet_id', $id)
         ->update([ 'statusWorksheet' => 2]);
         return redirect()->route('mechanical.index')->with('status', 'Hoja de trabajo enviada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
