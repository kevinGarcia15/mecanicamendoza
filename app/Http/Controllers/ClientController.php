<?php
namespace App\Http\Controllers;
use App\{client_db,
        vehicle_db,
        brand_car_db,
        car_color_db,
        User,
        worksheet_db};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $brand = brand_car_db::get();
      $color = car_color_db::get();
      $responsable = User::get();
      return view('client/newClient', compact('brand','color','responsable'));
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
      
      $newClient = request()->validate([
        'dpi'=>'required',
        'first_name'=>'required',
        'last_name'=>'required',
        'phone'=>'required',
        'address'=>'required',
      ]);

      $newVehicle = request()->validate([
        'plateNumber'=>'required|min:6|unique:vehicle_dbs',
        'model_id'=>'required',
        'color_id'=>'required',
        'line' => '',
      ]);
      $userResponsable = request()->validate([
        'user_id'=>'required'
      ]);
      $code = $this->saveNewClientVheicleInWorksheet($newClient,$newVehicle,$userResponsable);

      $messaje = 'Hoja de trabajo '.$code->code.', fue creado exitosamente';
      return back()->with('status', $messaje);
    }

    private function saveNewClientVheicleInWorksheet($newClient,$newVehicle,$userResponsable){
          $code = DB::transaction(function()use($newClient,$newVehicle,$userResponsable){
          $clientCreated = client_db::create($newClient);
          $vehicleCreated = vehicle_db::create($newVehicle);
          //obtiene los id para ingresarlo a la tabla Worksheet
          $getClient_id = client_db::select('client_id')->where('dpi', '=', $newClient['dpi'])->first();
          $getVehicle_id = vehicle_db::select('vehicle_id')->where('plateNumber', '=', $newVehicle['plateNumber'])->first();
          //crear codigo unico para la hoja de trabajo
          $codigo = strtoupper($newVehicle['plateNumber']).'-'.rand(100, 999);
          $worksheetCreted = worksheet_db::create([
            "code" => $codigo,
            "users_id"=> $userResponsable['user_id'],
            "client_id"=> $getClient_id['client_id'],
            "vehicle_id"=> $getVehicle_id['vehicle_id'],
          ]);
          return $worksheetCreted;
        });
        return $code;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      /*Funcion ajax que nos muestra si existe un cliente con un dpi existente*/
        if ($request->ajax()) {
          $clienteExist = client_db::where('dpi', $request->dpi)->get();
          return response()->json($clienteExist);
      }
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
        //
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
