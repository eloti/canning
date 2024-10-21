<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Address;
use App\Models\UnitModel;
use App\Models\Rental;

class DropdownController extends Controller
{
    
    public function getContacts (Request $request)
    {
      if ($request->ajax()) {
        $contacts = Contact::where('client_id', $request->client_id)->get();
        $contactsArray['0'] = "N/A";
        foreach ($contacts as $contact) {
          $contactsArray[$contact->id] = $contact->name;
        }
        return response()->json($contactsArray);
      }
    }

    public function getAddresses (Request $request)
    {
      if ($request->ajax()) {
        $addresses = Address::where('client_id', $request->client_id)->get();
        $addressesArray['0'] = "En Planta";
        foreach ($addresses as $address) {
          $addressesArray[$address->id] = $address->line1.' '.$address->county->value.' '.$address->province->value;
        }
        return response()->json($addressesArray);
      }
    }

    public function getUnit_Models (Request $request)
    {
      if ($request->ajax()) {
        $unit_models = UnitModel::where('family_id', $request->family_id)->get();
        foreach ($unit_models as $unit_model) {
          $unit_modelsArray[$unit_model->id] = $unit_model->model;
        }
        return response()->json($unit_modelsArray);
      }
    }

    public function getPrices (Request $request)
    {
      if ($request->ajax()) {
        $prices = UnitModel::where('id', '=', $request->unit_model_id)
                        ->select('price_1', 'price_7', 'price_30')
                        ->get();

        return response()->json($prices);
      }
    }

    public function availableUnits (Request $request)
    {
      if ($request->ajax()) {

        $totalUnits = UnitModel::where('id', '=', $request->unit_model_id)
                                ->value('stock');

        $rentedUnits = Rental::where('unit_model_id', '=', $request->unit_model_id)
                              ->whereNull('canc_type')
                              ->sum('quantity');

        $availableUnits = $totalUnits - $rentedUnits;
        
        return response()->json($availableUnits);
      }  
    }


}
