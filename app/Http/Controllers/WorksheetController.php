<?php

namespace App\Http\Controllers;
use App\{worksheet_db, work_to_do_db,replacement_db};
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class WorksheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $work_to_do = work_to_do_db::get();
      $listworksheet = worksheet_db::
       join('vehicle_dbs', 'worksheet_dbs.vehicle_id', '=', 'vehicle_dbs.vehicle_id')
       ->join('car_color_dbs', 'vehicle_dbs.color_id', '=', 'car_color_dbs.color_id')
       ->join('car_line_dbs', 'vehicle_dbs.line_id', '=', 'car_line_dbs.line_id')
       ->join('brand_car_dbs', 'car_line_dbs.brand_car_id', '=', 'brand_car_dbs.brand_id')
//       ->where('statusWorksheet', '=', 1)
       ->orderBy('worksheet_dbs.workSheetCreated_at', 'DESC')->get();

      return view('worksheet/index', compact('listworksheet','work_to_do'));
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
      /*Valida si ya se ha seleccionasdo un mecanico responasble*/
      $verifyUserExist = worksheet_db::findOrFail($id);
      if ($verifyUserExist['users_id'] === NULL) {
        return redirect()->route('worktodo.show', $verifyUserExist)->with('error', 'Debe seleccionar un mecanico que se haga responsable de la hoja de trabajo');
      }
      $values = $this->getworksheet($id);
      $dateCreatedWorksheet = $values[0];
      $workToDo = $values[1];
      $remplacement = $values[2];
      $workSheetDetail = $values[3];

      return view('worksheet/worksheetDetails',compact(
        'workSheetDetail','dateCreatedWorksheet','workToDo','remplacement'
      ));
    }

    public function download($id){
      $values = $this->getworksheet($id);
      $dateCreatedWorksheet = $values[0];
      $workToDo = $values[1];
      $remplacement = $values[2];
      $workSheetDetail = $values[3];

      $pdf = PDF::loadView('worksheet/generatePdf',compact(
        'workSheetDetail','dateCreatedWorksheet','workToDo','remplacement'
      ));

      $date = date("d").'/'.date("m").'/'.date("Y");
      $nameFileDownload = strtoupper($workSheetDetail[0]['plateNumber']).'-'.$date;
      return $pdf->download($nameFileDownload);
    }

    private function getworksheet($id){
      /*Hace la consulta a la base de datos*/
      $dateCreatedWorksheet = worksheet_db::where('worksheet_id', $id)->get();
      $workToDo = work_to_do_db::where('worksheet_id', $id)->get();
      $remplacement = replacement_db::where('worksheet_id', $id)->get();
      $workSheetDetail = worksheet_db::
       join('vehicle_dbs', 'worksheet_dbs.vehicle_id', '=', 'vehicle_dbs.vehicle_id')
       ->join('car_color_dbs', 'vehicle_dbs.color_id', '=', 'car_color_dbs.color_id')
       ->join('car_line_dbs', 'vehicle_dbs.line_id', '=', 'car_line_dbs.line_id')
       ->join('brand_car_dbs', 'car_line_dbs.brand_car_id', '=', 'brand_car_dbs.brand_id')
       ->join('client_dbs', 'worksheet_dbs.client_id', '=', 'client_dbs.client_id')
       ->join('users', 'worksheet_dbs.users_id', '=', 'users.id')
       ->where('worksheet_id', $id)->get();
       return array($dateCreatedWorksheet,$workToDo,$remplacement,$workSheetDetail);
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
      worksheet_db::where('worksheet_id', $id)
       ->update([ 'users_id' => $request['user_id']]);
      return back()->with('status','El usuario fue asignado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(worksheet_db $worksheet)
    {
      $worksheet->delete();
      return back()->with('status','Hoja de trabajo fué eliminado exitosamente');//nombre de la ruta
    }
}
