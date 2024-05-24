<?php

namespace App\Http\Controllers;

use App\Client;
use App\Contact;
use App\Address;
use App\Comment;
use Session;
use Illuminate\Http\Request;
use App\Rental;
use App\Unit;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->middleware('auth');

    }

    public function index(Request $request)
    { 
        $sortBy = 'legal_name';
        $orderBy = 'asc';
        $industryFilter = null;
        $countryFilter = null;
        $q = null;

        if ($request->has('sortBy')) $sortBy = $request->query('sortBy');
        if ($request->has('orderBy')) $orderBy = $request->query('orderBy');  
        if ($request->has('industryFilter')) $industryFilter = $request->query('industryFilter');
        if ($request->has('countryFilter')) $countryFilter = $request->query('countryFilter');
        if ($request->has('q')) $q = $request->query('q');

        if ($request->industryFilter == null && $request->countryFilter == null)
        {
            $clients = Client::select('id', 'legal_name', 'commercial_name' ,'cuit_type', 'cuit_num', 'country_id')
                                ->search($q)
                                ->orderBy($sortBy, $orderBy)
                                ->get();        
        }
        elseif ($request->industryFilter !== null && $request->countryFilter == null)
        {
            $clients = Client::select('id', 'legal_name', 'commercial_name',  'cuit_type', 'cuit_num', 'country_id')
                                ->where([
                                          
                                            ['commercial_name', 'LIKE', $q]
                                        ])
                                ->orderBy($sortBy, $orderBy)
                                ->get();
        }
        elseif ($request->industryFilter == null && $request->countryFilter !== null)
        {
            $clients = Client::select('id', 'legal_name', 'commercial_name', 'cuit_type', 'cuit_num', 'country_id')
                                ->where([
                                            ['country_id', '=', $countryFilter],
                                            ['commercial_name', 'LIKE', $q]
                                        ])
                                ->orderBy($sortBy, $orderBy)
                                ->get();
        }
        else
        {
            $clients = Client::select('id', 'legal_name', 'commercial_name',  'cuit_type', 'cuit_num', 'country_id')
                                ->where([
                                           
                                            ['country_id', '=', $countryFilter],
                                            ['commercial_name', 'LIKE', $q]
                                        ])
                                ->orderBy($sortBy, $orderBy)
                                ->get();
        }

        $sortFieldsArray['id'] = 'ID';
        $sortFieldsArray['legal_name'] = 'Razón Social';
        $sortFieldsArray['commercial_name'] = 'Nombre Comercial';
     

        $vatArray[''] = 'Seleccione Condición';
        $vatArray['Responsable Inscripto'] = 'Responsable Inscripto';
        $vatArray['Exento'] = 'Exento';
        $vatArray['Monotributista'] = 'Monotributista';
        $vatArray['Consumidor Final'] = 'Consumidor Final';

        $payment_termsArray[''] = 'Seleccione Condición';
        $payment_termsArray['Contado'] = 'Contado';
        $payment_termsArray['15 días FF'] = '15 días FF';
        $payment_termsArray['30 días FF'] = '30 días FF';
        $payment_termsArray['45 días FF'] = '45 días FF';
        $payment_termsArray['60 días FF'] = '60 días FF';
        $payment_termsArray['75 días FF'] = '75 días FF';
        $payment_termsArray['90 días FF'] = '90 días FF';
        $payment_termsArray['105 días FF'] = '105 días FF';
        $payment_termsArray['120 días FF'] = '120 días FF';

        //return $clients;

        return view ('clients.index', compact('clients', 'orderBy', 'sortBy', 'countryFilter', 'q', 'sortFieldsArray', 'vatArray', 'payment_termsArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return $request;
        $origin = request();
        //return $origin;
        
        $vatArray[''] = 'Seleccione Condición';
        $vatArray['Responsable Inscripto'] = 'Responsable Inscripto';
        $vatArray['Exento'] = 'Exento';
        $vatArray['Monotributista'] = 'Monotributista';
        $vatArray['Consumidor Final'] = 'Consumidor Final';

        $payment_termsArray[''] = 'Seleccione Condición';
        $payment_termsArray['Contado'] = 'Contado';
        $payment_termsArray['15 días FF'] = '15 días FF';
        $payment_termsArray['30 días FF'] = '30 días FF';
        $payment_termsArray['45 días FF'] = '45 días FF';
        $payment_termsArray['60 días FF'] = '60 días FF';
        $payment_termsArray['75 días FF'] = '75 días FF';
        $payment_termsArray['90 días FF'] = '90 días FF';
        $payment_termsArray['105 días FF'] = '105 días FF';
        $payment_termsArray['120 días FF'] = '120 días FF';

        $cuit_typeArray[''] = 'Seleccione Tipo';
        $cuit_typeArray['1'] = 'CUIT';
        $cuit_typeArray['2'] = 'CUIL';
        $cuit_typeArray['3'] = 'RUT';


        return view ('clients.addClient', compact('vatArray', 'payment_termsArray', 'cuit_typeArray', 'origin'));
    }

    public function createFromRental($what_blade, $what_unit)
    {
        //return $what_blade;
        $origin = array("what_blade" => $what_blade, "what_unit" => $what_unit);
        //return $origin;
        
        $vatArray[''] = 'Seleccione Condición';
        $vatArray['Responsable Inscripto'] = 'Responsable Inscripto';
        $vatArray['Exento'] = 'Exento';
        $vatArray['Monotributista'] = 'Monotributista';
        $vatArray['Consumidor Final'] = 'Consumidor Final';

        $payment_termsArray[''] = 'Seleccione Condición';
        $payment_termsArray['Contado'] = 'Contado';
        $payment_termsArray['15 días FF'] = '15 días FF';
        $payment_termsArray['30 días FF'] = '30 días FF';
        $payment_termsArray['45 días FF'] = '45 días FF';
        $payment_termsArray['60 días FF'] = '60 días FF';
        $payment_termsArray['75 días FF'] = '75 días FF';
        $payment_termsArray['90 días FF'] = '90 días FF';
        $payment_termsArray['105 días FF'] = '105 días FF';
        $payment_termsArray['120 días FF'] = '120 días FF';

        $cuit_typeArray[''] = 'Seleccione Tipo';
        $cuit_typeArray['1'] = 'CUIT';
        $cuit_typeArray['2'] = 'CUIL';
        $cuit_typeArray['3'] = 'RUT';


        return view ('clients.addClient', compact('vatArray', 'payment_termsArray', 'cuit_typeArray', 'origin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //validate the Data
    $this->validate($request, array(
      'legal_name' => 'required',
      'commercial_name' => 'required',
      'cuit_num' => 'required|unique:App\Client,cuit_num',

      'vat_status' => 'required',
      'sales_tax_rate' => 'required',
      'payment_terms' => 'required',
      //'country_id' => 'required',
      'cuit_type' => 'required',
    ));
   
    $clean_cuit = str_replace('-', '', $request->cuit_num);
        //return $clean_cuit;

        //store in the Database
        $client = new Client;
        $client->legal_name = $request->legal_name;
        $client->commercial_name = $request->commercial_name;
     
        $client->cuit_type = $request->cuit_type;
        $client->cuit_num = $clean_cuit;
        $client->vat_status = $request->vat_status;
        $client->payment_terms = $request->payment_terms;
        $client->sales_tax_rate = $request->sales_tax_rate;
        $client->country_id = 1;

    $client->save();

    //redirect
        //return $request;
        if ($request->what_blade !== null) {
        // redirigir a RentalsController o UnitController

            $newClient = Client::select('id')
                                    ->where('cuit_num', '=', $clean_cuit)
                                    ->first();
         
            if ($request->what_blade === "create_from_model") {                
                return redirect('/rentals/create_from_model_with_clientData/'.$newClient->id.'/null/null/'.$request->what_unit);

            } elseif ($request->what_blade === "create_r2r") {                
                return redirect('/rentToRent/create_with_clientData/'.$newClient->id.'/null/null');

            } elseif ($request->what_blade === "edit_from_model") {                
                return redirect('/rentals/edit_from_model_with_clientData/'.$newClient->id.'/null/null/'.$request->what_unit);

            } elseif ($request->what_blade === "create_from_unit_sell") {
                return redirect()->action('UnitController@sell', $clean_cuit);

            } elseif ($request->what_blade === "create_from_r2r") {                
                return redirect()->action('RentToRentController@create_r2r', $newClient);

            } elseif ($request->what_blade === "create_quote") {                
                return redirect('quotes/create_with_clientData/'.$newClient->id.'/null/null');            

            } elseif ($request->what_blade === "similar_quote_vta") {                
                return redirect('/quotes/similarQuoteVta/'.$newClient->id.'/null/null/'.$request->what_quote);

            } elseif ($request->what_blade === "similar_quote_alq") {                
                return redirect('/quotes/similarQuoteAlq/'.$newClient->id.'/null/null/'.$request->what_quote);
            }

        } else {
            return redirect()
                ->action('ClientController@show', [$client->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        $contacts = Contact::where('client_id', $id)->orderBy('deactivate', 'asc')->orderBy('name', 'asc')->get();
        $addresses = Address::where('client_id', $id)->get();
        $comments = Comment::where('client_id', $id)->orderBy('created_at', 'desc')->get();
        $rentals = Rental::where('client_id', $id)->orderBy('id', 'asc')->get();

        return view('clients.show')->with('client', $client)->with('contacts', $contacts)->with('addresses', $addresses)->with('comments', $comments)->with('rentals', $rentals);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $vatArray[''] = 'Seleccione Condición';
        $vatArray['Responsable Inscripto'] = 'Responsable Inscripto';
        $vatArray['Exento'] = 'Exento';
        $vatArray['Monotributista'] = 'Monotributista';
        $vatArray['Consumidor Final'] = 'Consumidor Final';

        $payment_termsArray[''] = 'Seleccione Condición';
        $payment_termsArray['Contado'] = 'Contado';
        $payment_termsArray['15 días FF'] = '15 días FF';
        $payment_termsArray['30 días FF'] = '30 días FF';
        $payment_termsArray['45 días FF'] = '45 días FF';
        $payment_termsArray['60 días FF'] = '60 días FF';
        $payment_termsArray['75 días FF'] = '75 días FF';
        $payment_termsArray['90 días FF'] = '90 días FF';
        $payment_termsArray['105 días FF'] = '105 días FF';
        $payment_termsArray['120 días FF'] = '120 días FF';

        return view('clients.editClient')
                    ->with('client', $client)
                    ->with('vatArray', $vatArray)
                    ->with('payment_termsArray', $payment_termsArray);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      //validate the Data
      $this->validate($request, array(
        'legal_name' => 'required',
        'commercial_name' => 'required',
        'cuit_num' => 'required',
      
        'vat_status' => 'required',
        'sales_tax_rate' => 'required',
        'payment_terms' => 'required'
      ));

      //store in the Database
      $client = Client::find($request->id);
      $client->legal_name = $request->legal_name;
      $client->commercial_name = $request->commercial_name;

      $client->vat_status = $request->vat_status;
      $client->payment_terms = $request->payment_terms;
      $client->sales_tax_rate = $request->sales_tax_rate;
      $client->save();

      //redirect
      return redirect()->route('clients.show',$request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
