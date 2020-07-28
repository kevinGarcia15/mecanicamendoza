<?php
namespace App\Http\Controllers;

use App\car_line_db;
use Illuminate\Support\Facades\DB;
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

  public function store(Request $request)
  {
    $newLine = request()->validate([
      'brand_car_id'=>'required',
      'line_name'=> 'required'
    ]);
    DB::transaction(function()use($newLine){
          car_line_db::create($newLine);
    });
    return back()->with('status', 'Linea '.$newLine['line_name'].' ingresado exitosamente');
  }
}
