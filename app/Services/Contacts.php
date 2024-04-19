<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;
use App\Contact;

//class Clients extends Model
class Contacts
{
  public function get()
  {
    $contacts = Contact::orderBy('name', 'asc')
                        ->get();

                        
    $contactsArray[''] = 'Seleccione Contacto';
    foreach ($contacts as $contact) {
      $contactsArray[$contact->id] = $contact->name;
    }
    return $contactsArray;
  }
}