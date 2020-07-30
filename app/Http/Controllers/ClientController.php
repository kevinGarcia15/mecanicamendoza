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
      $flagForInsert = 0;
      if ($request->id_clientExist != "0" and $request->id_vehicleExist != "0") {
        //"solo crear worksheet";
        $userResponsable = $this->responsableValidate();
        $flagForInsert = 1;
        $newWorkSheet = $this->saveNewClientVheicleInWorksheet(
          $request->id_clientExist,
          $request->id_vehicleExist,
          $userResponsable, $flagForInsert
        );
      }elseif ($request->id_clientExist != "0" and $request->id_vehicleExist == "0") {
        //"ingresar carro y worksheet";
        $userResponsable = $this->responsableValidate();
        $newVehicle = $this->vehicleValidate();
        $flagForInsert = 2;
        $newWorkSheet = $this->saveNewClientVheicleInWorksheet(
          $request->id_clientExist,
          $newVehicle,
          $userResponsable, $flagForInsert
        );
      }elseif ($request->id_clientExist == "0" and $request->id_vehicleExist != "0") {
        //"ingresar cliente y worksheet";
        $userResponsable = $this->responsableValidate();
        $newClient = $this->clientValidate();
        $flagForInsert = 3;
        $newWorkSheet = $this->saveNewClientVheicleInWorksheet(
          $newClient,
          $request->id_vehicleExist,
          $userResponsable, $flagForInsert
        );
      }else {
        //"ingresar cliente, carro y worksheet";
        $newClient = $this->clientValidate();
        $newVehicle = $this->vehicleValidate();
        $userResponsable = $this->responsableValidate();
        $flagForInsert = 4;
        $newWorkSheet = $this->saveNewClientVheicleInWorksheet(
          $newClient,
          $newVehicle,
          $userResponsable, $flagForInsert
        );
      }
      $message = 'Hoja de trabajo '.$newWorkSheet->code.', fue creado exitosamente. Llene las tareas a realizar';
      return redirect()->route('worktodo.show',$newWorkSheet)->with('status', $message);
    }
    private function clientValidate(){
      $newClient = request()->validate([
        'dpi'=>'',
        'first_name'=>'required',
        'last_name'=>'required',
        'phone'=>'required',
        'address'=>'required',
      ]);
      return $newClient;
    }

    private function vehicleValidate(){
      $newVehicle = request()->validate([
        'plateNumber'=>'required|min:6|unique:vehicle_dbs',
        'line_id'=>'required',
        'color_id'=>'required',
        'model' => 'required',
      ]);
      return $newVehicle;
    }

    private function responsableValidate(){
      $userResponsable = request()->validate([
        'user_id'=>''
      ]);
      return $userResponsable;
    }

    private function saveNewClientVheicleInWorksheet($Client,$Vehicle,$Responsable,$flagForInsert){
      // $currentDate = date('y').date('m').date('d');
      // $uniqueCode = $currentDate.'-'.rand(100, 999);
      $uniqueCode = $this->generateUniqueCode();

          if ($flagForInsert == 1) {
            $code = DB::transaction(function()use($Client,$Vehicle,$Responsable,$uniqueCode){
              //"solo crear worksheet";
              //crear codigo unico para la hoja de trabajo
//              $getPlateNumber = vehicle_db::select('plateNumber')->where('vehicle_id', '=', $Vehicle)->first();
//              $uniqueCode = strtoupper($getPlateNumber['plateNumber']).'-'.rand(100, 999);

              $worksheetCreted = worksheet_db::create([
                "code" => $uniqueCode,
                "users_id"=> $Responsable['user_id'],
                "client_id"=> $Client,
                "vehicle_id"=> $Vehicle,
              ]);
              return $worksheetCreted;
            });

          }elseif ($flagForInsert == 2) {
            $code = DB::transaction(function()use($Client,$Vehicle,$Responsable,$uniqueCode){
              $vehicleCreated = vehicle_db::create($Vehicle);
              $getVehicle_id = vehicle_db::select('vehicle_id')->where('plateNumber', '=', $Vehicle['plateNumber'])->first();
              //crear codigo unico para la hoja de trabajo
//              $uniqueCode = strtoupper($Vehicle['plateNumber']).'-'.rand(100, 999);

              $worksheetCreted = worksheet_db::create([
                "code" => $uniqueCode,
                "users_id"=> $Responsable['user_id'],
                "client_id"=> $Client,
                "vehicle_id"=> $getVehicle_id['vehicle_id'],
              ]);
              return $worksheetCreted;
            });
          }

          elseif ($flagForInsert == 3) {
            $code = DB::transaction(function()use($Client,$Vehicle,$Responsable,$uniqueCode){
              $clientCreated = client_db::create($Client);
              $getClient_id = client_db::select('client_id')->where('dpi', '=', $Client['dpi'])->first();
              // //crear codigo unico para la hoja de trabajo
              // $getPlateNumber = vehicle_db::select('plateNumber')->where('vehicle_id', '=', $Vehicle)->first();
              // $uniqueCode = strtoupper($getPlateNumber['plateNumber']).'-'.rand(100, 999);

              $worksheetCreted = worksheet_db::create([
                "code" => $uniqueCode,
                "users_id"=> $Responsable['user_id'],
                "client_id"=> $getClient_id['client_id'],
                "vehicle_id"=> $Vehicle,
              ]);
              return $worksheetCreted;
            });
          }

          elseif($flagForInsert == 4) {
            $code = DB::transaction(function()use($Client,$Vehicle,$Responsable,$uniqueCode){
              $clientCreated = client_db::create($Client);
              $vehicleCreated = vehicle_db::create($Vehicle);
              //obtiene los id para ingresarlo a la tabla Worksheet
              $getClient_id = client_db::select('client_id')->where('dpi', '=', $Client['dpi'])->first();
              $getVehicle_id = vehicle_db::select('vehicle_id')->where('plateNumber', '=', $Vehicle['plateNumber'])->first();
              // //crear codigo unico para la hoja de trabajo
              // $uniqueCode = strtoupper($Vehicle['plateNumber']).'-'.rand(100, 999);
              $worksheetCreted = worksheet_db::create([
                "code" => $uniqueCode,
                "users_id"=> $Responsable['user_id'],
                "client_id"=> $getClient_id['client_id'],
                "vehicle_id"=> $getVehicle_id['vehicle_id'],
              ]);
              return $worksheetCreted;
            });
          }
        return $code;
    }
    private function generateUniqueCode(){
      $currentDate = date('y');
      $uniqueCode = $currentDate.'-'.rand(1000,9999);
      $ifExist = worksheet_db::where('code', '=', $uniqueCode)->get();

      if (count($ifExist) >= 1) {
        while (count($ifExist) >= 1) {
          $uniqueCode = $currentDate.'-'.rand(1000,9999);
          $ifExist = worksheet_db::where('code', '=', $uniqueCode)->get();
        }
        return $uniqueCode;
      }
      return $uniqueCode;
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

    public function clienteExistWithName(Request $request){
      if ($request->ajax()) {
        if ($request->name) {
          $filter = client_db::where('first_name','LIKE',$request->name.'%')->get();
          foreach ($filter as $key) {
            $clientArray[$key->client_id] = $key->first_name.' '.$key->last_name;
          }
          return response()->json($clientArray);
        }
        if ($request->cliente_id) {
          $client = client_db::findOrFail($request->cliente_id);
          return response()->json($client);
        }
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
