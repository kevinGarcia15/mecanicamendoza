<?php
namespace App\Http\Controllers;

use App\car_line_db;
use Illuminate\Http\Request;

class CarLineController extends Controller
{
  public function show(Request $request)
  {
    /*Funcion ajax que nos muestra el lineo del carro de forma dinamica*/
      if ($request->ajax()) {
        $carLine = car_line_db:: where('brand_car_id', $request->carBrand_id)->get();
        foreach ($carLine as $key) {
          $carLineArray[$key->line_id] = $key->line_name;
        }
        return response()->json($carLineArray);
      }
  }
}
