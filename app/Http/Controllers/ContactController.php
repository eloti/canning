<?php

namespace App\Http\Controllers;

use App\Contact;

use App\Client;
use Illuminate\Http\Request;

class ContactController extends Controller
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
        $origin = request();
        //return $origin;

        $client = Client::select('id', 'legal_name')
                        ->where('id', '=', $origin->client_id)
                        ->first();
                        //return $client;
        //show form
          return view ('clients.addContact')
                ->with('client', $client)
                ->with('origin', $origin);
                    
    }

    public function create_client_contact($id)
    {   
        //return $request;
        $client = Client::select('id', 'legal_name')
                        ->where('id', '=', $id)
                        ->first();
                        //return $client;
        //show form
          return view ('clients.addContact')
                ->with('client', $client);
                    
    }

    public function create_client_contact_from_rental() {
        $origin = request();

        $client = Client::select('id', 'legal_name')
                        ->where('id', '=', $origin->client_id_for_new)
                        ->first();

        //return $origin;
        
        return view ('clients.addContact')
                ->with('client', $client)
                ->with('origin', $origin);
    }

    public function create_client_contact_from_quote() {
        $origin = request();
        return $origin;

        $client = Client::select('id', 'legal_name')
                        ->where('id', '=', $origin->client_id_for_new)
                        ->first();

        //return $origin;
        
        return view ('clients.addContact')
                ->with('client', $client)
                ->with('origin', $origin);
    }

    public function create_client_contact_from_r2r() {
        $origin = request();
        return $origin;

        $client = Client::select('id', 'legal_name')
                        ->where('id', '=', $origin->client_id_for_new)
                        ->first();

        //return $origin;
        
        return view ('clients.addContact')
                ->with('client', $client)
                ->with('origin', $origin);
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
        $this->validate($request, array(
          'name' => 'required'
        ));

        //store in the Database
        $contact = new Contact;
        $contact->client_id = $request->client_id;
        $contact->name = $request->name;
        $contact->position = $request->position;
        $contact->email = $request->email;
        $contact->cell_phone = $request->cell_phone;
        $contact->phone = $request->phone;
        $contact->extension = $request->extension;
        $contact->comment = $request->comment;
        $contact->save();
        $clientredirect = $contact->client_id;

        $newContact = Contact::select('id')
                                    ->where('client_id', '=', $request->client_id)
                                    ->orderBy('id', 'desc')
                                    ->first();
                                    //return $newContact;

        //redirect
        if ($request->what_blade !== null) {
            // redirigir a RentalsController
            if ($request->what_blade === "create_from_model") {                
                return redirect('/rentals/create_from_model_with_clientData/'.$request->client_id.'/'.$newContact->id.'/'.$request->address_id.'/'.$request->unit_id);
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
                return redirect('quotes/create_with_clientData/'.$request->client_id.'/'.$newContact->id.'/'.$request->address_id);
            }
            // redirigir a QuoteController reQuote
            elseif ($request->what_blade === "create_reQuoteVta") {
                return redirect('quotes/reQuoteVtaNext/'.$request->client_id.'/'.$newContact->id.'/'.$request->address_id.'/'.$request->quote_id);
            }
            // redirigir a QuoteController reQuote
            elseif ($request->what_blade === "create_reQuoteAlq") {
                return redirect('quotes/reQuoteAlqNext/'.$request->client_id.'/'.$newContact->id.'/'.$request->address_id.'/'.$request->quote_id);
            }
            // redirigir a RentToRentController
            elseif ($request->what_blade === "create_r2r") {
                return redirect('rentToRent/create_with_clientData/'.$request->client_id.'/'.$newContact->id.'/'.$request->address_id);
            }
            // redirigir a Similar quote controller
            elseif ($request->what_blade === "create_similarQuoteVta") {
                return redirect('/quotes/similarQuoteVta/'.$request->client_id.'/'.$newContact->id.'/'.$request->address_id.'/'.$request->quote_id);
            }
            // redirigir a Similar quote controller
            elseif ($request->what_blade === "create_similarQuoteAlq") {
                return redirect('/quotes/similarQuoteAlq/'.$request->client_id.'/'.$newContact->id.'/'.$request->address_id.'/'.$request->quote_id);
            }
        } else {
            return redirect('/clients/'.$clientredirect)->with([
                'contactAdded' => true,
                'success' => 'Contacto Creado Exitosamente'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('clients.editContact', compact('contact'));
    }
    
 
public function update(Request $request, $id)
{
    $contact = Contact::findOrFail($id);
    $contact->name = $request->input('name');
    $contact->position = $request->input('position');
    $contact->email = $request->input('email');
    $contact->cell_phone = $request->input('cell_phone');
    $contact->phone = $request->input('phone');
    $contact->extension = $request->input('extension');
    $contact->deactivate = $request->has('deactivate') ? 1 : 0; // Update deactivate field
    $contact->save();

    return redirect()->route('clients.show', $contact->client_id)->with('success', 'Contacto actualizado exitosamente');
}
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
