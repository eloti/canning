<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Client;
use App\Contact;
use App\Address;
use App\Models\UnitModel;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function active_index()
    {
        $rentals = Rental::whereNull('canc_type')
                            ->get();

        return view ('rentals.active_index')->with('rentals', $rentals);
    }

    public function inactive_index()
    {
        $rentals = Rental::whereNotNull('canc_type')
                            ->get();

        return view ('rentals.inactive_index')->with('rentals', $rentals);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view ('rentals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request;

        if ($request->previous_rental_id != 0) {
            $origRental = Rental::find($request->previous_rental_id);
            $canc = $origRental->end_date;
            $canc_string = strtotime($canc);
            $canc_plus_one = $canc_string + 86400;
            $canc_format = date('Y-m-d', $canc_plus_one);
        }

        if ($request->previous_rental_id != 0) {
            $origRental = Rental::find($request->previous_rental_id);
            $origRental->canc_type = $request->canc_type;
            $origRental->message = $request->message;
            $origRental->daysRented = $request->daysRented;
            $origRental->correctedCharge = $request->correctedCharge;
            $origRental->daysPending = $request->daysPending;
            $origRental->canc_at = $canc_format;
            $origRental->save();
        };        

        //store in the Database
        $rental = new Rental;

        $rental->rental_type = $request->rental_type;
        $rental->previous_rental_id = $request->previous_rental_id;
        $rental->user_id = $request->user_id;
        $rental->client_id = $request->client_id;
        $rental->contact_id = $request->contact_id;
        $rental->address_id = $request->address_id;
        $rental->aux = $request->aux;
        
        $rental->unit_model_id = $request->unit_model_id;
        $rental->quantity = $request->quantity;
        $rental->days = $request->days;
        $rental->period = $request->period;
        $rental->start_date = $request->start_date;
        $rental->end_date = $request->end_date;
        
        $rental->price_1 = $request->price_1;
        $rental->price_7 = $request->price_7;
        $rental->price_30 = $request->price_30;        

        $rental->rental_list_price = $request->rental_list_price;

        $rental->rental_offered_price = $request->rental_offered_price;
        $rental->discount_offered_price = $request->discount_offered_price;       
        $rental->net_rental_price = $request->net_rental_price;

        $rental->transport_offered_price = $request->transport_offered_price;
        $rental->discount_transport_price = $request->discount_transport_price;
        $rental->net_transport_price = $request->net_transport_price;

        $rental->other = $request->other;
        $rental->other_price = $request->other_price;

        $rental->gross_offered_price = $request->gross_offered_price;
        $rental->net_discount = $request->net_discount;
        $rental->net_offered_price = $request->net_offered_price;


        $rental->save();

        //redirect
        return redirect()->route('rentals.show', ['rental' => $rental]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rental $rental)
    {
        //return $rental;
        return view ('rentals.show')->with('rental', $rental);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $myTime = Carbon::now();
        $ftdMyTime = $myTime->toDateString();
                
        $rental = Rental::find($id);
        //return $rental;

        $contacts = Contact::select('id', 'name')
                            ->where('client_id', '=', $rental->client_id)
                            ->get();

        $lastPositionCont = count($contacts);        
        $contacts[$lastPositionCont] = (object) ['id' => 0, 'name' => 'N/D'];
        //return $contacts;

        $addresses = Address::select('id', 'line1')
                            ->where('client_id', '=', $rental->client_id)
                            ->get();

        $lastPositionAddr = count($addresses);
        $addresses[$lastPositionAddr] = (object) ['id' => 0, 'line1' => 'En Planta'];
        //return $addresses;

        $totalUnits = UnitModel::where('id', '=', $rental->unit_model_id)
                                ->value('stock');

        $rentedUnits = Rental::where('unit_model_id', '=', $rental->unit_model_id)
                              ->whereNull('canc_type')
                              ->sum('quantity');

        $availableUnits = $totalUnits - $rentedUnits;

        return view('rentals.edit')
                    ->with('rental', $rental)
                    ->with('contacts', $contacts)
                    ->with('addresses', $addresses)
                    ->with('availableUnits', $availableUnits);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //return $request;
        $rental = Rental::find($id);

        $rental->rental_type = $request->rental_type;
        $rental->previous_rental_id = $request->previous_rental_id;
        $rental->user_id = $request->user_id;
        $rental->client_id = $request->client_id;
        $rental->contact_id = $request->contact_id;
        $rental->address_id = $request->address_id;
        $rental->aux = $request->aux;
        
        $rental->unit_model_id = $request->unit_model_id;
        $rental->quantity = $request->quantity;
        $rental->days = $request->days;
        $rental->period = $request->period;
        $rental->start_date = $request->start_date;
        $rental->end_date = $request->end_date;
        
        $rental->price_1 = $request->price_1;
        $rental->price_7 = $request->price_7;
        $rental->price_30 = $request->price_30;        

        $rental->rental_list_price = $request->rental_list_price;

        $rental->rental_offered_price = $request->rental_offered_price;
        $rental->discount_offered_price = $request->discount_offered_price;       
        $rental->net_rental_price = $request->net_rental_price;

        $rental->transport_offered_price = $request->transport_offered_price;
        $rental->discount_transport_price = $request->discount_transport_price;
        $rental->net_transport_price = $request->net_transport_price;

        $rental->other = $request->other;
        $rental->other_price = $request->other_price;

        $rental->gross_offered_price = $request->gross_offered_price;
        $rental->net_discount = $request->net_discount;
        $rental->net_offered_price = $request->net_offered_price;

        $rental->save();

        //redirect
        return redirect()->action('App\Http\Controllers\RentalController@show', $request->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rental $rental)
    {
        //
    }
}
