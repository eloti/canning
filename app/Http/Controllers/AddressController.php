<?php

namespace App\Http\Controllers;

use App\Address;
use App\Client;
use App\Services\Counties;
use App\County;
use App\City;
use App\Services\Cities;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('aandf');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    public function getCountiesAndCities(Request $request) {
        $provinceId = $request->province_id;
    
        $counties = County::where('province_id', $provinceId)->pluck('name', 'id')->toArray();
       //$cities = City::where('province_id', $provinceId)->pluck('name', 'id')->toArray();
    
        return response()->json(['counties' => $counties]);
    }
    public function getCountiesByProvince($provinceId)
    {
        $counties = County::where('province_id', $provinceId)->get(['id', 'value']);
        return response()->json(['counties' => $counties]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $origin = request();
        //return $origin;

        $client = Client::select('id', 'legal_name')
                        ->where('id', '=', $origin->client_id)
                        ->first();
                        //return $client;
        //show form
          return view ('clients.addAddress')
                ->with('client', $client)
                ->with('origin', $origin);
                    
    }

    public function create_client_address($id)
    {   
        $client = Client::select('id', 'legal_name')
                        ->where('id', '=', $id)
                        ->first();
                        //return $client;
        
        $otherAddresses = Address::select('id', 'billing_address')
                                ->where('client_id', '=', $id)
                                ->get();

        if (count($otherAddresses) != 0) {
            foreach ($otherAddresses as $otherAddress) {
                if ($otherAddress->billing_address === 1) {
                    $hasBillingAddress = 'YES';
                    break;
                } else {
                    $hasBillingAddress = 'NO';
                }
            }
        } else {
            $hasBillingAddress = 'NO';
        }

        //return $hasBillingAddress;

        return view ('clients.addAddress')
            ->with('client', $client)
            ->with('hasBillingAddress', $hasBillingAddress);                    
    }

    public function create_client_address_from_rental() {
        $origin = request();
        //return $origin;

        $client = Client::select('id', 'legal_name')
                        ->where('id', '=', $origin->client_id_for_new)
                        ->first();

        $otherAddresses = Address::select('id', 'billing_address')
                                ->where('client_id', '=', $origin->client_id_for_new)
                                ->get();

        if (count($otherAddresses) != 0) {
            foreach ($otherAddresses as $otherAddress) {
                if ($otherAddress->billing_address === 1) {
                    $hasBillingAddress = 'YES';
                    break;
                } else {
                    $hasBillingAddress = 'NO';
                }
            }
        } else {
            $hasBillingAddress = 'NO';
        }
                
        return view ('clients.addAddress')
                ->with('client', $client)
                ->with('origin', $origin)
                ->with('hasBillingAddress', $hasBillingAddress);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //return $request;
      //validate the Data
      $this->validate($request, [
        'line1' => 'required',
        'province_id' => 'required',
        'billing_address' => 'required'
      ]);

      //store in the Database
      $address = new Address;
      $address->client_id = $request->client_id;
      $address->line1 = $request->line1;
      $address->line2 = $request->line2;
      $address->city_id = $request->city_id;
      $address->county_id = $request->county_id;
      $address->province_id = $request->province_id;
      $address->zip_code = $request->zip_code;
      $address->country_id = $request->country_id;
      $address->billing_address = $request->billing_address;
      $address->county_name = $request->county_name;
      $address->city_name = $request->city_name;


      $address->save();
      $clientredirect = $address->client_id;

      $newAddress = Address::select('id')
                                    ->where('client_id', '=', $request->client_id)
                                    ->orderBy('id', 'desc')
                                    ->first();
                                    //return $newContact;

      //redirect
        if ($request->what_blade !== null) {
            // redirigir a RentalsController
            if ($request->what_blade === "create_from_model") {                
                return redirect('/rentals/create_from_model_with_clientData/'.$request->client_id.'/'.$request->contact_id.'/'.$newAddress->id.'/'.$request->unit_id);
            }
            // redirigir a RemitoController
            elseif ($request->what_blade === "create_from_remito") {
                return redirect()->action('RemitoController@create', $request->rental_id);
            }
            // redirigir a UnitController
            elseif ($request->what_blade === "create_from_unit_sell") {
                return redirect()->action('UnitController@sell', $request->unit_id);
            }
            // redirigir a QuoteController
            elseif ($request->what_blade === "create_quote") {
                return redirect('quotes/create_with_clientData/'.$request->client_id.'/'.$request->contact_id.'/'.$newAddress->id);
            }
            // redirigir a QuoteController reQuote
            elseif ($request->what_blade === "create_reQuoteVta") {
                return redirect('quotes/reQuoteVtaNext/'.$request->client_id.'/'.$request->contact_id.'/'.$newAddress->id.'/'.$request->quote_id);
            }
            // redirigir a QuoteController reQuote
            elseif ($request->what_blade === "create_reQuoteAlq") {
                return redirect('quotes/reQuoteAlqNext/'.$request->client_id.'/'.$request->contact_id.'/'.$newAddress->id.'/'.$request->quote_id);
            }
            // redirigir a RentToRentController
            elseif ($request->what_blade === "create_r2r") {
                return redirect('rentToRent/create_with_clientData/'.$request->client_id.'/'.$request->contact_id.'/'.$newAddress->id);
            }
            // redirigir a Similar quote controller
            elseif ($request->what_blade === "create_similarQuoteVta") {
                return redirect('/quotes/similarQuoteVta/'.$request->client_id.'/'.$request->contact_id.'/'.$newAddress->id.'/'.$request->quote_id);
            }
            // redirigir a Similar quote controller
            elseif ($request->what_blade === "create_similarQuoteAlq") {
                return redirect('/quotes/similarQuoteAlq/'.$request->client_id.'/'.$request->contact_id.'/'.$newAddress->id.'/'.$request->quote_id);
            }
        } else {
            return redirect('/clients/'.$clientredirect);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    { 
        $otherAddresses = Address::select('id', 'billing_address')
                                ->where('client_id', '=', $address->client_id)
                                ->get();

        if (isset($otherAddresses)) {
            foreach ($otherAddresses as $otherAddress) {
                if ($otherAddress->billing_address === 1) {
                    $hasBillingAddress = 'YES';
                    break;
                } else {
                    $hasBillingAddress = 'NO';
                }
            }
        }

        //return $address;

        return view ('clients.editAddress')
            ->with('address', $address)
            ->with('otherAddresses', $otherAddresses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
      //validate the Data
      $this->validate($request, array(
        'line1' => 'required',
        'country_id' => 'required'
      ));

      //store in the Database
      $address = Address::find($id);
      $address->client_id = $request->client_id;
      $address->line1 = $request->line1;
      $address->line2 = $request->line2;
      $address->city_id = $request->city_id;
      $address->county_id = $request->county_id;
      $address->province_id = $request->province_id;
      $address->zip_code = $request->zip_code;
      $address->country_id = $request->country_id;
      $address->billing_address = $request->billing_address;
      $address->county_name = $request->county_name;
      $address->city_name = $request->city_name;

      $address->save();
      $clientredirect = $address->client_id;

      //redirect
      return redirect('/clients/'.$clientredirect);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
}
