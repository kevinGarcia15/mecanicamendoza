<?php

namespace App\Http\Controllers;
use App\vehicle_db;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
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
}