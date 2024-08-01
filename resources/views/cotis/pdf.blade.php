<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    @inject('cotiItems', 'App\Services\CotiItems')
    @inject('units', 'App\Services\Units')
    @inject('regimes', 'App\Services\Regime')
    @inject('cotiOps', 'App\Services\CotiOptionals')
    @inject('salesTermsCoti', 'App\Services\SalesTermsCoti')
    
    <style>

      * {
        box-sizing: border-box;
        font-family: 'Cairo', sans-serif;
      }
      @page {
        margin-top: 0.75cm;
        margin-right: 0.75cm;
        margin-left: 0.75cm;
        margin-bottom: 0.75cm;
      }
      .bold {
        font-weight: bold;
      }
      .border {
        border: 1px solid black;
      }
      .full-width {
        width: 100%;
      }
      .half-width {
        width: 50%;
      }
      .mid-width {
        width: 70%;
      }
      .compact-width {
        width: 10%;
      }
      .semi-compact-width {
        width: 30%;
      }
      .block {
        display: block;
      }
      .inline {
        display: inline-block;
        margin: 0;
        padding: 0;
      }      
      .table-row-narrow {
        font-size: 10px;
        vertical-align: top;
        border-top: 1px solid white;
        border-bottom: 1px solid white;
        border-left: 1px solid white;
      }
      .centered-div {
        text-align: center;
      }
      .padded-div {
        padding: 20px;
        font-size: 12px;
      }      
      .padded-div-small {
        padding-left: 30px;
        font-size: 15px;
      }
      .box-container {     
        padding-top: 16px;
      }
      .box-container-border {
        border: 1px solid black;
        padding-top: 15px;
      }
      .table-header {
        text-align: center;
        border: 1px solid black;
        height: 60px;
        line-height: 60px;
        background-color: LightGrey;
        white-space: pre-wrap;
        font-size: 12px;
        font-weight: bold;
      }
      .page-break {
        page-break-after: always;
      }
      .summary {
        position: absolute;
        left: 10px;
        top: 700px;
      }
      .footer {
        position: absolute;
        left: 10px;
        top: 900px;
      }
      .page {
        margin: 0;
        padding: 0;
      }
      .non-padded-div {
        padding: 0;
        margin: 0;
      }
      .block {
        display: block;
      }
      .inline {
        display: inline-block;
      }
      .table-top {
        font-size: 12px;
        font-weight: bold;
        text-align: center;
        background-color: LightGrey;
        border-top: 1px solid black;
        border-bottom: 1px solid black;
        border-left: 1px solid black;
        padding: 10px 0 10px 0;
      }
      .table-row {
        font-size: 12px;
        text-align: center;
        border-top: 1px solid black;
        border-bottom: 1px solid black;
        border-left: 1px solid black;
        padding: 5px 0 5px 0;
      }
      .table-plain {
        font-size: 12px;
        text-align: center;
        padding: 2px 0 2px 0;
        vertical-align: top;
      }
      .table-plain-left {
        font-size: 12px;
        text-align: left;
        padding: 2px 0 2px 0;
        vertical-align: top;
      }
      .table-plain-right {
        font-size: 12px;
        text-align: right;
        padding: 2px 0 2px 0;
        vertical-align: top;
      }
      .thin {
        padding: 0;
        margin: 0.2rem;
      }

    </style>
</head>

<body>

    <div class="page">

    <div style="padding: 0; position: absolute; top: 0px; width: 100%; box-sizing: border-box;">     
      <img style="max-width: 20%; float: left" src="images/logo_bqs_rectangular.jpg">      
      <p style="margin: 0; padding: 0; font-size: 24px; font-weight: bold; text-align: right">COTIZACIÓN</p>
      <p style="margin: 19px 0 0 0; padding: 0; font-size: 12px; text-align: right"><b>Fecha: </b>{{$coti->date()}}</p>
      <p style="margin: 2px 0 0 0; padding: 0; font-size: 12px; text-align: right"><b>Nº de Cotización: </b>{{$coti->id}}</p>      
    </div>

    <div style="position: absolute; top: 100px; width: 100%; box-sizing: border-box;">        
      <div style="font-size: 12px; width: 100%; left: 0px; max-height: 30px;"><b>Baños Químicos del Sur | Auxilios y Servicios Canning S.R.L. | CUIT: 30-71814739-1 | Alquiler de Baños Químicos</b></div>
    </div>

    <div style="position: absolute; top: 114px; width: 100%; box-sizing: border-box;">        
      <div style="font-size: 12px; width: 100%; left: 0px; max-height: 30px">Ruta 58, Kilómetro 14 - Canning - Prov. de Buenos Aires</div> 
    </div>

    <div style="position: absolute; top: 128px; width: 100%; box-sizing: border-box;">        
      <div style="font-size: 12px; width: 100%; left: 0px; max-height: 30px">+11 3903-2787 | bañosquimicosdelsur.com.ar</div>
    </div>

    <div style="position: absolute; top: 150px; width: 100%; box-sizing: border-box;">        
      <div style="font-size: 12px; width: 100%; left: 0px; max-height: 30px"><b>SEÑORES:</b></div>                 
    </div>

    <div style="position: absolute; top: 164px; width: 100%; box-sizing: border-box;">        
      <div style="font-size: 12px; width: 100%; left: 0px; max-height: 30px"><b>Razón Social: </b>{{$coti->client->legal_name ? $coti->client->legal_name : $coti->client->commercial_name}}</div>      
    </div>      

    <div style="position: absolute; top: 178px; width: 100%; box-sizing: border-box;">        
      <div style="font-size: 12px; width: 100%; left: 0px; max-height: 30px"><b>Contacto: </b>
        @if($coti->contact_id)
          {{$coti->contact->name ? $coti->contact->name : ''}}
          {{$coti->contact->cell_phone ? ' | '.$coti->contact->cell_phone : ''}}
          {{$coti->contact->email ? ' | '.$coti->contact->email : ''}}
        @endif
      </div>                   
    </div>

    @if($hasValue)
      <div class="full-width block" style="position: absolute; top: 220px; box-sizing: border-box;">
        <div class="inline table-top" style="width: 4%">Nº</div><div class="inline table-top" style="width: 12%">Item</div><div class="inline table-top" style="width: 5%">Cant</div><div class="inline table-top" style="width: 5%">Días</div><div class="inline table-top" style="width: 47%">Descripción</div><div class="inline table-top" style="width: 9%">Importe</div><div class="inline table-top" style="width: 7%">IVA[%]</div><div class="inline table-top" style="width: 9%; border-right: 1px solid black">Inc. IVA</div>
      </div>
      <div class="full-width block" style="position: absolute; top: 255px; box-sizing: border-box;">
        @foreach($cotiDets as $cotiDet)
          <div style="position: relative; font-size: 12px";><?php $lineCount = $lineCount + 1; ?><div class="inline table-plain" style="width: 4%">{{$lineCount}}</div><div class="inline table-plain" style="width: 12%">{{$cotiItems->show($cotiDet->item)}}</div><div class="inline table-plain" style="width: 5%">{{$cotiDet->cant}}</div><div class="inline table-plain" style="width: 5%">{{$cotiDet->days}}</div><div class="inline table-plain-left" style="margin-left: 10px; width: 46%">{{$cotiDet->description}}</div><div class="inline table-plain-right" style="width: 9%">{{ number_format($cotiDet->of_price, 0, ',', '.') }}</div><div class="inline table-plain-right" style="width: 7%">{{ number_format($cotiDet->vat_rate, 1, ',', '.') }}</div><div class="inline table-plain-right" style="width: 9%">{{ number_format($cotiDet->of_price_plus_IVA, 0, ',', '.') }}</div></div>
        @endforeach
      </div>
    @else
      <div class="full-width block" style="position: absolute; top: 220px">
        <div class="inline table-top" style="width: 4%">Nº</div><div class="inline table-top" style="width: 12%">Item</div><div class="inline table-top" style="width: 5%">Cant</div><div class="inline table-top" style="width: 5%">Días</div><div class="inline table-top" style="width: 63%">Descripción</div><div class="inline table-top" style="width: 10%; border-right: 1px solid black">Importe</div></div>
      <div class="full-width block" style="position: absolute; top: 255px; box-sizing: border-box;">
        @foreach ($cotiDets as $cotiDet)
          <div style="position: relative; font-size: 12px;"><?php $lineCount = $lineCount + 1; ?><div class="inline table-plain" style="width: 4%">{{$lineCount}}</div><div class="inline table-plain" style="width: 12%">{{$cotiItems->show($cotiDet->item)}}</div><div class="inline table-plain" style="width: 5%">{{$cotiDet->cant}}</div><div class="inline table-plain" style="width: 5%">{{$cotiDet->days}}</div><div class="inline table-plain-left" style="width: 63%">{{$cotiDet->description}}</div><div class="inline table-plain-right" style="width: 10%">{{ number_format($cotiDet->of_price, 0, ',', '.') }}</div></div>
        @endforeach
      </div>
    @endif

    <div style="position: absolute; top: 600px">          
        @if($coti->op1 === 1 || $coti->op2 === 1 || $coti->op3 === 1 || $coti->op4 === 1)
          <p class="thin" style="text-align: left; font-size: 12px"><b>Incluye:</b></p>        
          <p class="thin" style="text-align: left; font-size: 12px">
            @if($coti->op1 === 1){{$cotiOps->show('1')}}@endif
            @if($coti->op2 === 1){{$cotiOps->show('2')}}@endif
            @if($coti->op3 === 1){{$cotiOps->show('3')}}@endif
            @if($coti->op4 === 1){{$cotiOps->show('4')}}@endif
          </p>
        @endif 
    </div>

    <div style="position: absolute; top: 770px">        
      <p class="thin" style="text-align: left; font-size: 12px; text-decoration: underline;"><b>CONDICIONES COMERCIALES:</b></p>
      <p class="thin" style="text-align: left; font-size: 12px"><b>Observaciones: </b>{{$coti->obs}}</p>
      <p class="thin" style="text-align: left; font-size: 12px"><b>Forma de Pago: </b>{{$salesTermsCoti->retrieve($coti->payment_terms)}} {{$coti->terms_desc ? $coti->terms_desc : ''}}</p>
        @if($coti->plazo === '0')
          <p class="thin" style="text-align: left; font-size: 12px"><b>Disponibilidad: </b>Inmediata</p>
        @else
          <p class="thin" style="text-align: left; font-size: 12px"><b>Disponibilidad (días): </b>{{$coti->plazo}}</p>
        @endif
        <p class="thin" style="text-align: left; font-size: 12px"><b>{{ $coti->quote_curr === 1 ? "Presupuesto expresado en Dólares Estadounidenses" : ( $coti->quote_curr === 2 ? "Presupuesto expresado en Pesos Argentinos" : "Prespuestos expresado en Pesos Uruguayos" ) }}</b></p>
        @if(!$hasValue)
          <p class="thin" style="text-align: left; font-size: 12px"><b>Los valores indicados NO incluyen IVA</b></p>
        @endif
        <p class="thin" style="text-align: left; font-size: 12px"><b>Presupuesto válido hasta: </b>{{$valid_date_to_show}}</p>
        <p class="thin" style="text-align: left; font-size: 12px">En caso de estar expresado en moneda extranjera, para la cancelación de las facturas emitidas en pesos se utilizará la conversión al tipo de cambio vendedor, tabla "cotización billetes" que fija el Banco de la Nación Argentina al día del efectivo pago de la factura. En caso de existir diferencia, se emitirá la Nota de Débito o Crédito correspondiente.</p>
      </div>

    

  </div><!--end of page-->

</body>

</html>