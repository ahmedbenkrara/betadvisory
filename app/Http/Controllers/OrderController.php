<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Etude;
use App\Models\OrderDetails;

use CMI\CmiClient;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        DB::transaction(function() use ($request){
            $base_url = 'http://127.0.0.1:8000';
            $order = Order::create([
                'user_id' => $request->user_id
            ]);

            $price = 0;

            foreach($request->etude as $item){
                OrderDetails::create([
                    'order_id' =>  $order->id, 
                    'etude_id' =>  $item
                ]);

                $etude = Etude::find($item);
                $price += $etude->prix;
            }
            
            $client = new CmiClient([
                'storekey' => 'Betadvisory123', // STOREKEY
                'clientid' => '600004166', // CLIENTID
                'oid' => 'order'.$order->id, // COMMAND ID IT MUST BE UNIQUE
                'shopurl' => $base_url.'/cancel/'.$order->id, // SHOP URL FOR REDIRECTION
                'okUrl' => $base_url.'/ok', // REDIRECTION AFTER SUCCEFFUL PAYMENT
                'failUrl' => $base_url.'/fail/'.$order->id, // REDIRECTION AFTER FAILED PAYMENT
                'email' => 'contact@mediaverse.ma', // YOUR EMAIL APPEAR IN CMI PLATEFORM
                'BillToName' => 'BET ADVISORY', // YOUR NAME APPEAR IN CMI PLATEFORM
                'BillToCompany' => 'BET ADVISORY', // YOUR COMPANY NAME APPEAR IN CMI PLATEFORM
                'BillToStreet12' => '', // YOUR ADDRESS APPEAR IN CMI PLATEFORM NOT REQUIRED
                'BillToCity' => '', // YOUR CITY APPEAR IN CMI PLATEFORM NOT REQUIRED
                'BillToStateProv' => '', // YOUR STATE APPEAR IN CMI PLATEFORM NOT REQUIRED
                'BillToPostalCode' => '', // YOUR POSTAL CODE APPEAR IN CMI PLATEFORM NOT REQUIRED
                'BillToCountry' => '504', // YOUR COUNTRY APPEAR IN CMI PLATEFORM NOT REQUIRED (504=MA)
                'tel' => '', // YOUR PHONE APPEAR IN CMI PLATEFORM NOT REQUIRED
                'amount' => "$price", // RETRIEVE AMOUNT WITH METHOD POST
                'CallbackURL' => $base_url.'/callback', // CALLBACK
            ]);
            $client->redirect_post(); 
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        // $order = Order::find($id);
        // $order->delete();
    }
}
