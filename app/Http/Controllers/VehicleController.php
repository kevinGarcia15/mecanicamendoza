<?php

namespace App\Http\Controllers;
use App\{vehicle_db,worksheet_db,work_to_do_db};
use Illuminate\Http\Request;

class VehicleController extends Controller
{
  public function index()
  {
    $vehicleList = vehicle_db::
     join('car_color_dbs', 'vehicle_dbs.color_id', '=', 'car_color_dbs.color_id')
     ->join('car_line_dbs', 'vehicle_dbs.line_id', '=', 'car_line_dbs.line_id')
     ->join('brand_car_dbs', 'car_line_dbs.brand_car_id', '=', 'brand_car_dbs.brand_id')
     ->orderBy('brand_car_dbs.brand_name', 'ASC')->paginate(10);
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
}
