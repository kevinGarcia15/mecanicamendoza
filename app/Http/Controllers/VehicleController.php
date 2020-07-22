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
         join('car_model_dbs', 'vehicle_dbs.model_id', '=', 'car_model_dbs.model_id')
         ->join('car_color_dbs', 'vehicle_dbs.color_id', '=', 'car_color_dbs.color_id')
         ->join('brand_car_dbs', 'car_model_dbs.brand_car_id', '=', 'brand_car_dbs.brand_id')
         ->where('plateNumber', $request->plateNumber)->get();

        return response()->json($plateNumber);
    }
  }
}
