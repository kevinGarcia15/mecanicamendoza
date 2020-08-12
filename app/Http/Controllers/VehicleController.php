<?php

namespace App\Http\Controllers;
use App\{vehicle_db,
         worksheet_db,
         work_to_do_db,
         car_color_db,
         brand_car_db,
         car_line_db};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
  public function index()
  {
    $vehicleList = vehicle_db::
     join('car_color_dbs', 'vehicle_dbs.color_id', '=', 'car_color_dbs.color_id')
     ->join('car_line_dbs', 'vehicle_dbs.line_id', '=', 'car_line_dbs.line_id')
     ->join('brand_car_dbs', 'car_line_dbs.brand_car_id', '=', 'brand_car_dbs.brand_id')
     ->orderBy('brand_car_dbs.brand_name', 'ASC')->get();
    return view('vehicle/index', compact('vehicleList'));
  }

  public function vehicleHistory(Request $request){
    $vehicleWorksheetHistory = worksheet_db::
       join('vehicle_dbs', 'worksheet_dbs.vehicle_id', '=', 'vehicle_dbs.vehicle_id')
       ->join('car_color_dbs', 'vehicle_dbs.color_id', '=', 'car_color_dbs.color_id')
       ->join('car_line_dbs', 'vehicle_dbs.line_id', '=', 'car_line_dbs.line_id')
       ->join('brand_car_dbs', 'car_line_dbs.brand_car_id', '=', 'brand_car_dbs.brand_id')
       ->where('worksheet_dbs.vehicle_id', $request->vehicle)
       ->orderBy('worksheet_dbs.workSheetUpdated_at', 'DESC')->get();

    $workToDo = vehicle_db::
      join('worksheet_dbs', 'worksheet_dbs.vehicle_id', '=', 'vehicle_dbs.vehicle_id')
      ->join('work_to_do_dbs', 'worksheet_dbs.worksheet_id', '=', 'work_to_do_dbs.worksheet_id')
      ->where('worksheet_dbs.vehicle_id', $request->vehicle)->get();

      if (count($vehicleWorksheetHistory) <= 0) {
        return back()->with('error', 'No hay hoja de trabajo asociado a este vehículo');
      }
    return view('vehicle/history',compact('vehicleWorksheetHistory','workToDo'));
  }

  public function show(Request $request)
  {
    /*Funcion ajax que nos muestra el modelo del carro de forma dinamica*/
      if ($request->ajax()) {
        $plateNumber = vehicle_db::
       join('car_line_dbs', 'vehicle_dbs.line_id', '=', 'car_line_dbs.line_id')
       ->join('car_color_dbs', 'vehicle_dbs.color_id', '=', 'car_color_dbs.color_id')
       ->join('brand_car_dbs', 'car_line_dbs.brand_car_id', '=', 'brand_car_dbs.brand_id')
       ->where('plateNumber', $request->plateNumber)->get();

        return response()->json($plateNumber);
    }
  }

  public function search(Request $request)
  {
    $plateNumber = $request['arg'];
    $plateFind = vehicle_db::join('car_line_dbs', 'vehicle_dbs.line_id', '=', 'car_line_dbs.line_id')
           ->join('car_color_dbs', 'vehicle_dbs.color_id', '=', 'car_color_dbs.color_id')
           ->join('brand_car_dbs', 'car_line_dbs.brand_car_id', '=', 'brand_car_dbs.brand_id')
           ->plateNumber($plateNumber)->get();
    return view('vehicle/search',compact('plateFind'));
  }

  public function edit($id)
  {
    $brand = brand_car_db::get();
    $color = car_color_db::get();
    $vehicle = vehicle_db::
    join('car_line_dbs', 'vehicle_dbs.line_id', '=', 'car_line_dbs.line_id')
    ->join('brand_car_dbs', 'car_line_dbs.brand_car_id', '=', 'brand_car_dbs.brand_id')
    ->findOrFail($id);
    $line = car_line_db::where('brand_car_id', $vehicle['brand_id'] )->get();
    return view('vehicle/editVehicle', compact('brand','color','vehicle','line'));
  }

  public function update(Request $request, $id)
  {
    $updateVehicle = request()->validate([
      'plateNumber'=>'required',
      'line_id'=>'required',
      'color_id'=>'required',
      'model' => 'required',
    ]);
    DB::transaction(function()use($updateVehicle,$id){
      vehicle_db::where('vehicle_id', $id)
      ->update($updateVehicle);
    });
    return redirect()->route('vehicle.history')
          ->with('status','El vehículo con placa '.strtoupper($updateVehicle['plateNumber']).' fué actualizado exitosamente');
  }
}
