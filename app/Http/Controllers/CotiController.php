<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use App\Coti;
use App\CotiDet;
use App\Client;
use App\Contact;
use App\Address;
use Barryvdh\DomPDF\Facade\Pdf;

class CotiController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function open_index()
    {
        //return "Open";
        $cotis = Coti::where('status', '=', null)
                        ->get();
        //return $cotis;
        
        foreach ($cotis as $coti) {

            $cotiDets = CotiDet::where('coti_id', '=', $coti->id)
                                ->get();
            
            $cot_power_array = []; //para enviar potencia cotizada y monto de coti
            $cot_value = 0;
            foreach ($cotiDets as $cotiDet) {
                if ($cotiDet->power !== null) {
                    array_push($cot_power_array, $cotiDet->power);    
                }
                if ($cotiDet->of_price === null) {
                    $cot_value = $cot_value;    
                } else {
                    $cot_value = $cot_value + $cotiDet->of_price;
                }
            }
            //return $cot_power;

            $orig_date = $coti->date;
            $orig_date_string = strtotime($orig_date);
            $venc_date = $orig_date_string + ($coti->validez * 86400); //número
            $venc_date_format = date('d-m-Y', $venc_date);

            $myTime = Carbon::now();
            $myTime_string = strtotime($myTime);

            if (floor(($myTime_string - $venc_date) / 86400) > 0) {
                $dias_venc = floor(($myTime_string - $venc_date) / 86400);
            } else {
                $dias_venc = 0;
            }

            if ($coti->status == null && $coti->status_change == null) {
                if ($dias_venc === 0) {
                    $show_status = "Vigente";
                } else {
                    $show_status = "Vencida";
                }
            } elseif ($coti->status == 2) {
                $show_status = "Rechazada";
            } elseif ($coti->status == 1) {
                $show_status = "Aceptada";
            }

            $coti->venc_date = $venc_date_format;
            $coti->dias_venc = $dias_venc;
            $coti->show_status = $show_status;
            $coti->cot_value = $cot_value;
            $coti->cot_power_array = $cot_power_array;

        }

        foreach ($cotis as $key => $coti) {
            if($coti->show_status == "Vencida") {
                unset($cotis[$key]);
            }
        }
        
        //return $cotis;

        return view('cotis.index_active')
                    ->with('cotis', $cotis); 
    }   

    public function closed_index()
    {
        //return "Closed";
        $cotis = Coti::get();

        foreach ($cotis as $coti) {

            $cotiDets = CotiDet::where('coti_id', '=', $coti->id)
                                ->get();
            
            $cot_power_array = []; //para enviar potencia cotizada y monto de coti
            $cot_value = 0;
            foreach ($cotiDets as $cotiDet) {
                if ($cotiDet->power !== null) {
                    array_push($cot_power_array, $cotiDet->power);    
                }
                if ($cotiDet->of_price === null) {
                    $cot_value = $cot_value;    
                } else {
                    $cot_value = $cot_value + $cotiDet->of_price;
                }
            }
            //return $cot_power;

            $orig_date = $coti->date;
            $orig_date_string = strtotime($orig_date);
            $venc_date = $orig_date_string + ($coti->validez * 86400); //número
            $venc_date_format = date('d-m-Y', $venc_date);

            $myTime = Carbon::now();
            $myTime_string = strtotime($myTime);

            if (floor(($myTime_string - $venc_date) / 86400) > 0) {
                $dias_venc = floor(($myTime_string - $venc_date) / 86400);
            } else {
                $dias_venc = 0;
            }

            if ($coti->status == null && $coti->status_change == null) {
                if ($dias_venc === 0) {
                    $show_status = "Vigente";
                } else {
                    $show_status = "Vencida";
                }
            } elseif ($coti->status == 2) {
                $show_status = "Rechazada";
            } elseif ($coti->status == 1) {
                $show_status = "Aceptada";
            }

            $coti->venc_date = $venc_date_format;
            $coti->dias_venc = $dias_venc;
            $coti->show_status = $show_status;
            $coti->cot_value = $cot_value;
            $coti->cot_power_array = $cot_power_array;

        }

        foreach ($cotis as $key => $coti) {
            if($coti->show_status == "Vigente") {
                unset($cotis[$key]);
            }
        }

        //return $cotis;

        return view('cotis.index_inactive')
                    ->with('cotis', $cotis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($clie = null)
    {   
        //return $clie;

        $myTime = Carbon::now();
        $ftdMyTime = $myTime->toDateString();
        //return $ftdMyTime;
        if ($clie) {
            //return $clie;
            return view('cotis.create')
                        ->with('ftdMyTime', $ftdMyTime)
                        ->with('clie', $clie);
        } else {    
            return view('cotis.create')
                        ->with('ftdMyTime', $ftdMyTime);
        }
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
        $data = $request->all();
        //return $data;
        $lastid = Coti::create($data)->id;
        //return $lastid;

        if(count($request->item) > 0) {
            foreach($request->item as $item=>$v) {
                $data2 = array(
                    'coti_id' => $lastid,
                    'item' => $request->item[$item],
                    'cant' => $request->cant[$item],
                    'description' => $request->desc[$item],
                    'days' => $request->days[$item],                    
                    'list_price' => $request->list_price[$item],
                    'of_price' => $request->of_price[$item],
                    'vat_rate' => $request->vat_rate[$item],
                    'of_price_plus_IVA' => $request->of_price_plus_IVA[$item]
                    //'power' => $request->power[$item],
                    //'regime' => $request->regime[$item],
                    //'units' => $request->units[$item],                    
                    //'frequency' => $request->frequency[$item],
                );
                CotiDet::insert($data2);
            }
        }

        return redirect()->action('App\Http\Controllers\CotiController@show', ['id' => $lastid]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $myTime = Carbon::now();
        $ftdMyTime = $myTime->toDateString();
        //return $id;
        $coti = Coti::find($id);
        //return $coti;
        $cotiDets = CotiDet::where('coti_id', '=', $id)
                            ->get();
        //return $cotiDets;
        //return strtotime($coti->date);
        //return date($coti->date, strtotime("+".$coti->validez." days"));
        //return date($coti->date, strtotime("+".$coti->validez." days"));
        $vencimiento = strtotime($coti->date) + ($coti->validez * 86400); //unix format
        $vencimiento_form = date('d-m-Y', $vencimiento);
        //return $vencimiento_form;
        $today = strtotime(date("Y-m-d")); //unix format
        //return $today;
        if ($today > $vencimiento) {
            $days_pending = 0;
        } else {
            $days_pending = ($vencimiento - $today) / 86400;
        }
        //return $days_pending;
        //return $coti->status;
        if ($coti->status == null && $days_pending > 0) {
            $status = "Vigente";
        } elseif ($coti->status == null && $days_pending <= 0) {
            $status = "Vencida";
        } elseif ($coti->status == 1) {
            $status = "Aceptada";
        } elseif ($coti->status == 2) {
            $status = "Rechazada";
        }

        return view('cotis.show')
                    ->with('coti', $coti)
                    ->with('cotiDets', $cotiDets)
                    ->with('vencimiento_form', $vencimiento_form)
                    ->with('days_pending', $days_pending)
                    ->with('status', $status)
                    ->with('ftdMyTime', $ftdMyTime);
    }

    public function downloadPDF($id)
    {
        $coti = Coti::where('id', '=', $id)
                        ->first();
        //return $coti;        
        $cotiDets = CotiDet::where('coti_id', '=', $id)
                            ->get();
        //return $cotiDets;
        $columnName = 'vat_rate';

        $hasValue = $cotiDets->contains(function($item) use ($columnName) {
            return !is_null($item->$columnName);
        });
        //return $hasValue;

        $valid_date = strtotime($coti->date()) + ($coti->validez * 86400);
        $valid_date_to_show = date('d-m-Y', $valid_date);
        //return $valid_date_to_show;

        $lineCount = 0;

        

        $pdf = PDF::loadview('cotis.pdf', compact(['coti', 'cotiDets', 'lineCount', 'valid_date_to_show', 'hasValue']));


        return $pdf->download('Cotización Nº '.$coti->id.' '.$coti->client->commercial_name.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $myTime = Carbon::now();
        $ftdMyTime = $myTime->toDateString();
        //return $ftdMyTime;
        
        $coti = Coti::find($id);
        //return $coti;
        $cotiDets = CotiDet::where('coti_id', '=', $id)
                            ->get();

        $contacts = Contact::select('id', 'name')
                            ->where('client_id', '=', $coti->client_id)
                            ->get();
        $lastPositionCont = count($contacts);
        
        $contacts[$lastPositionCont] = (object) ['id' => 0, 'name' => 'N/A'];
       

        $addresses = Address::select('id', 'line1')
                            ->where('client_id', '=', $coti->client_id)
                            ->get();
        $lastPositionAddr = count($addresses);

        $addresses[$lastPositionAddr] = (object) ['id' => 0, 'line1' => 'En Planta'];
        //return $addresses;

        return view('cotis.edit')
                    ->with('coti', $coti)
                    ->with('cotiDets', $cotiDets)
                    ->with('contacts', $contacts)
                    ->with('addresses', $addresses)
                    ->with('ftdMyTime', $ftdMyTime);
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
        //return $request;
        $data = $request->all();
        //return $data;
        $cotiDet_ids = CotiDet::select('id')
                                ->where('coti_id', '=', $request->id)
                                ->get();
        //return $cotiDet_ids;

        foreach ($cotiDet_ids as $cotiDet_id) {
            CotiDet::where('id', $cotiDet_id->id)->delete();
        }        

        $coti = Coti::find($id);
        //return $coti;
        $coti->contact_id = $data['contact_id'];
        $coti->address_id = $data['address_id']; 
        $coti->date = $data['date']; 
        $coti->validez = $data['validez'];
        $coti->delivery_date = $data['delivery_date']; 
        $coti->quote_curr = $data['quote_curr'];
        $coti->payment_terms = $data['payment_terms']; 
        $coti->terms_desc = $data['terms_desc'];
        $coti->obs = $data['obs'];
        if(isset($data['op1'])) {
            $coti->op1 = 1;
        } else {
            $coti->op1 = 0;
        }
        if(isset($data['op2'])) {
            $coti->op2 = 1;
        } else {
            $coti->op2 = 0;
        }
        if(isset($data['op3'])) {
            $coti->op3 = 1;
        } else {
            $coti->op3 = 0;
        }
        if(isset($data['op4'])) {
            $coti->op4 = 1;
        } else {
            $coti->op4 = 0;
        }

        $coti->save();

        $cotiDet_ids = CotiDet::select('id')
                                ->where('coti_id', '=', $request->id)
                                ->get();
        //return $cotiDet_ids;

        foreach ($cotiDet_ids as $cotiDet_id) {
            CotiDet::where('id', $cotiDet_id->id)->delete();
        }

        if(count($request->item) > 0) {
            foreach($request->item as $item=>$v) {
                $data2 = array(
                    'coti_id' => $id,
                    'item' => $request->item[$item],
                    'cant' => $request->cant[$item],
                    'description' => $request->desc[$item],
                    'days' => $request->days[$item],
                    'list_price' => $request->list_price[$item],
                    'of_price' => $request->of_price[$item],
                    'vat_rate' => $request->vat_rate[$item],
                    'of_price_plus_IVA' => $request->of_price_plus_IVA[$item]
                );
                CotiDet::insert($data2);
            }
        }

        return redirect()->action('App\Http\Controllers\CotiController@show', $request->id);
    }

    public function rejection_update(Request $request, $id)
    {
        //return $request;
        $coti = Coti::find($id);
        $coti->status = $request->status;
        $coti->rejection = $request->rejection;
        $coti->status_change = $request->status_change;
        $coti->comments = $request->comments;
        $coti->save();

        return redirect()->action('App\Http\Controllers\CotiController@show', $request->id);
    }

    public function acceptance_update(Request $request, $id)
    {
        //return $request;
        $coti = Coti::find($id);
        $coti->status = $request->status;
        $coti->status_change = $request->status_change;
        $coti->comments = $request->comments;
        $coti->save();

        return redirect()->action('App\Http\Controllers\CotiController@show', $request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
