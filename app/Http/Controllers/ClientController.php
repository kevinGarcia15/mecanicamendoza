<?php
namespace App\Http\Controllers;
use App\{client_db,
        vehicle_db,
        brand_car_db,
        car_color_db,
        User,
        worksheet_db,
        client_vehicle_db
  };
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
      $color = car_color_db::orderBy('color_name', 'ASC')->get();
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
/*----------------------------------------------------------------------------*/
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
/*----------------------------------------------------------------------------*/
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

/*----------------------------------------------------------------------------*/
    private function vehicleValidate(){
      $newVehicle = request()->validate([
        'plateNumber'=>'required|min:6|unique:vehicle_dbs',
        'line_id'=>'required',
        'color_id'=>'required',
        'model' => 'required',
      ]);
      return $newVehicle;
    }
/*----------------------------------------------------------------------------*/
    private function responsableValidate(){
      $userResponsable = request()->validate([
        'user_id'=>''
      ]);
      return $userResponsable;
    }
/*----------------------------------------------------------------------------*/
    private function saveNewClientVheicleInWorksheet($Client,$Vehicle,$Responsable,$flagForInsert){
      $uniqueCode = $this->generateUniqueCode();

          if ($flagForInsert == 1) {
            //"solo crear worksheet";
            $code = DB::transaction(function()use($Client,$Vehicle,$Responsable,$uniqueCode){
              client_vehicle_db::updateOrCreate([
                  'client_id' => $Client,
                  'vehicle_id' => $Vehicle
                ]);
              $worksheetCreted = worksheet_db::create([
                "code" => $uniqueCode,
                "users_id"=> $Responsable['user_id'],
                "client_id"=> $Client,
                "vehicle_id"=> $Vehicle,
              ]);
              return $worksheetCreted;
            });

          }elseif ($flagForInsert == 2) {
            //"ingresar carro y worksheet";
            $code = DB::transaction(function()use($Client,$Vehicle,$Responsable,$uniqueCode){
              $vehicleCreated = vehicle_db::create($Vehicle);
              client_vehicle_db::updateOrCreate([
                  'client_id' => $Client,
                  'vehicle_id' => $vehicleCreated['vehicle_id']
                ]);
              $worksheetCreted = worksheet_db::create([
                "code" => $uniqueCode,
                "users_id"=> $Responsable['user_id'],
                "client_id"=> $Client,
                "vehicle_id"=> $vehicleCreated['vehicle_id'],
              ]);
              return $worksheetCreted;
            });
          }

          elseif ($flagForInsert == 3) {
            //"ingresar cliente y worksheet";
            $code = DB::transaction(function()use($Client,$Vehicle,$Responsable,$uniqueCode){
              $clientCreated = client_db::create($Client);
              client_vehicle_db::updateOrCreate([
                  'client_id' => $clientCreated['client_id'],
                  'vehicle_id' => $Vehicle
                ]);

              $worksheetCreted = worksheet_db::create([
                "code" => $uniqueCode,
                "users_id"=> $Responsable['user_id'],
                "client_id"=> $clientCreated['client_id'],
                "vehicle_id"=> $Vehicle,
              ]);
              return $worksheetCreted;
            });
          }

          elseif($flagForInsert == 4) {
            //"ingresar cliente, carro y worksheet";
            $code = DB::transaction(function()use($Client,$Vehicle,$Responsable,$uniqueCode){
              $clientCreated = client_db::create($Client);
              $vehicleCreated = vehicle_db::create($Vehicle);

              client_vehicle_db::updateOrCreate([
                  'client_id' => $clientCreated['client_id'],
                  'vehicle_id' => $vehicleCreated['vehicle_id']
                ]);
              $worksheetCreted = worksheet_db::create([
                "code" => $uniqueCode,
                "users_id"=> $Responsable['user_id'],
                "client_id"=> $clientCreated['client_id'],
                "vehicle_id"=> $vehicleCreated['vehicle_id'],
              ]);
              return $worksheetCreted;
            });
          }
        return $code;
    }
/*----------------------------------------------------------------------------*/
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
/*----------------------------------------------------------------------------*/
    public function clienteExistWithName(Request $request){
      if ($request->ajax()) {
        if ($request->name) {
          $filter = client_db::where('first_name','LIKE',$request->name.'%')->get();
          if (count($filter) > 0) {
            foreach ($filter as $key) {
              $clientArray[$key->client_id] = $key->first_name.' '.$key->last_name;
            }
            return response()->json($clientArray);
          }else {
            return response('0');
          }
        }
        /*Buesqueda cuando el usuario le da click al link de sugerencias*/
        if ($request->cliente_id) {
//          $client = client_db::findOrFail($request->cliente_id);
          $sugestionOfVehicles = client_vehicle_db::
          join('client_dbs', 'client_dbs.client_id', '=', 'client_vehicle_dbs.client_id')
          ->join('vehicle_dbs', 'vehicle_dbs.vehicle_id', '=', 'client_vehicle_dbs.vehicle_id')
          ->join('car_color_dbs', 'vehicle_dbs.color_id', '=', 'car_color_dbs.color_id')
          ->join('car_line_dbs', 'vehicle_dbs.line_id', '=', 'car_line_dbs.line_id')
          ->join('brand_car_dbs', 'car_line_dbs.brand_car_id', '=', 'brand_car_dbs.brand_id')
          ->where('client_vehicle_dbs.client_id', $request->cliente_id)->get();
          return response()->json($sugestionOfVehicles);
        }
      }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
/*----------------------------------------------------------------------------*/
    public function edit($id)
    {
      return view('client/editClient', [
        'client' => client_db::findOrFail($id)
      ]);
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
      $UpdateClient = $this->clientValidate();
      client_db::where('client_id', $id)
      ->update($UpdateClient);
      return redirect()->route('balance.index')->with('status','El cliente fué actualizado exitosamente');
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
