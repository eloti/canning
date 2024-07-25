<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class CotiOptionals
{   

  public function get()
  {
    $cotiOpArray[''] = '';
    $cotiOpArray[1] = 'Op 1';
    $cotiOpArray[2] = 'Op 2';
    $cotiOpArray[3] = 'Op 3';
    $cotiOpArray[4] = 'Op 4';   
    
    return $cotiOpArray;
  }

  public function retrieve($x)
  {
    $cotiOpArray[''] = 'N/A';
    $cotiOpArray[1] = 'Op 1';
    $cotiOpArray[2] = 'Op 2';
    $cotiOpArray[3] = 'Op 3';
    $cotiOpArray[4] = 'Op 4';    
    
    return $cotiOpArray[$x];
  }

  public function show($x) //para mostrar en las cotizaciones pdf
  {
    $cotiOpArray[''] = 'N/A';
    $cotiOpArray[1] = 'Op 1';
    $cotiOpArray[2] = 'Op 2';
    $cotiOpArray[3] = 'Op 3';
    $cotiOpArray[4] = 'Op 4';    

    return $cotiOpArray[$x];
  }
}