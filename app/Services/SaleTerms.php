<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class SaleTerms
{   

  public function get()
  {
    $saleTermsArray['Contado'] = 0;
    $saleTermsArray['15 días FF'] = 15;
    $saleTermsArray['30 días FF'] = 30;
    $saleTermsArray['45 días FF'] = 45;
    $saleTermsArray['60 días FF'] = 60;
    $saleTermsArray['75 días FF'] = 75;
    $saleTermsArray['90 días FF'] = 90;
    $saleTermsArray['105 días FF'] = 105;
    $saleTermsArray['120 días FF'] = 120;

    
    return $saleTermsArray;
  }
}