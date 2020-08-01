<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\{balanceCustumer_db,worksheet_db,client_db,payment_db};
class BalanceCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $balanceCustomer = client_db::
       where('total_balance', '>', 0)
       ->orderBy('total_balance', 'DESC')->get();
       return view('balanceCustomer/index', compact('balanceCustomer'));
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
      DB::transaction(function()use($request){
        $balance = client_db::where('client_id', $request['client_id'])->get('total_balance');
        $newBalance = ($balance[0]['total_balance'] + $request['active'])- $request['pasive'];
//Actualiza el saldo en la tabla clientes---------------------------------------
            client_db::where('client_id', $request['client_id'])
             ->update([ 'total_balance' => $newBalance]);
//Guarda todos losa datos en la tabla balanceCustomer---------------------------
            balanceCustumer_db::create([
            "active" => $request['active'],
            "balance" => $newBalance,
            "pasive" => $request['pasive'],
            "worksheet_id"=> $request['worksheet_id'],
            "client_id"=> $request['client_id'],
            ]);
//cambia el staus a 0 del worksheer para establecer que está congelado----------
            worksheet_db::where('worksheet_id', $request['worksheet_id'])
             ->update([ 'statusWorksheet' => 0]);
      });
      return back()->with('status', 'La hoja de trabajo fue CONGELADA exitosamente');
    }

    public function payment(Request $request)
    {
      DB::transaction(function()use($request){
        $newBalance = ($request['total_balance'] + $request['active'])- $request['pasive'];
//Actualiza el saldo en la tabla clientes---------------------------------------
            client_db::where('client_id', $request['client_id'])
             ->update([ 'total_balance' => $newBalance]);
//Guarda todos losa datos en la tabla balanceCustomer---------------------------
            balanceCustumer_db::create([
            "active" => $request['active'],
            "balance" => $newBalance,
            "pasive" => $request['pasive'],
            "client_id"=> $request['client_id'],
            ]);
      });
      return back()->with('status', 'Se a abonado Q.'.$request['pasive'].' a la deuda.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $listBalanceWorksheet = balanceCustumer_db::
       join('client_dbs', 'balance_custumer_dbs.client_id', '=', 'client_dbs.client_id')
//       ->join('worksheet_dbs', 'balance_custumer_dbs.worksheet_id', '=', 'worksheet_dbs.worksheet_id')
       // ->join('vehicle_dbs', 'worksheet_dbs.vehicle_id', '=', 'vehicle_dbs.vehicle_id')
       // ->join('car_color_dbs', 'vehicle_dbs.color_id', '=', 'car_color_dbs.color_id')
       // ->join('car_line_dbs', 'vehicle_dbs.line_id', '=', 'car_line_dbs.line_id')
       // ->join('brand_car_dbs', 'car_line_dbs.brand_car_id', '=', 'brand_car_dbs.brand_id')
       ->where('balance_custumer_dbs.client_id', '=', $id)
       ->orderBy('balance_custumer_dbs.created_at', 'ASC')->get();

      return view('balanceCustomer/balance_detail', compact('listBalanceWorksheet','abonos'));
  //   return $listBalanceWorksheet;
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
