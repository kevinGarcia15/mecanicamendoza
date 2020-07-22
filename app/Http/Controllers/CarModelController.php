<?php
namespace App\Http\Controllers;

use App\car_model_db;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
  public function show(Request $request)
  {
    /*Funcion ajax que nos muestra el modelo del carro de forma dinamica*/
      if ($request->ajax()) {
        $carModel = car_model_db:: where('brand_car_id', $request->carBrand_id)->get();
        foreach ($carModel as $key) {
          $carModelArray[$key->model_id] = $key->model_name;
        }
        return response()->json($carModelArray);
      }
  }
}
