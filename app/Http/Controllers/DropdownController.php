<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Address;

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


}
