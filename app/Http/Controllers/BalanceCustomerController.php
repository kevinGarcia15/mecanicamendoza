<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\{balanceCustumer_db,
          worksheet_db,
          client_db,payment_db,
          work_to_do_db,
          replacement_db};
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
       orderBy('total_balance', 'DESC')->get();
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
      //valida si existe alguna tarea o no y si existe algun repuesto o no.
      $EmptyWorkToDo = work_to_do_db::where('worksheet_id', $request['worksheet_id'])->get();
      $EmptyReplacement = replacement_db::where('worksheet_id', $request['worksheet_id'])->get();
      if (count($EmptyWorkToDo) <= 0) {
        return back()->with('error', 'Debe ingresar al menos una tarea');
      }
      if (count($EmptyReplacement) <= 0) {
        return back()->with('error', 'Debe ingresar al menos un repuesto o lubricante');
      }

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
            "discont" => $request['discont'],
            "otherExpenses" => $request['otherExpenses'],
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
       ->where('balance_custumer_dbs.client_id', '=', $id)
       ->orderBy('balance_custumer_dbs.balanceCreated_at', 'ASC')->get();
       if (count($listBalanceWorksheet) <= 0) {
         return back()->with('error', 'No hay ninguna cuenta asociada a él');
       }

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
