<div style="position: absolute; top: 94px">        
      <div style="font-size: 12px; max-width: 80%; position: absolute; left: 0px; max-height: 30px; margin: 25px 0 0 0">Av. Sarmiento (Ruta 25) 565 - CP: 1627 - Matheu - Escobar - Prov. de Buenos Aires</div>            
    </div>

    <div style="position: absolute; top: 108px;">        
      <div style="font-size: 12px; max-width: 80%; position: absolute; left: 0px; max-height: 30px; margin: 25px 0 0 0">0800 - 444 - 8595 | {{$coti->user->email ? $coti->user->email : ''}} | www.rbenergia.com.ar</div>
    </div>

      <div style="position: absolute; top: 130px">        
        <div style="font-size: 12px; max-width: 50%; position: absolute; left: 0px; max-height: 30px; margin: 25px 0 0 0"><b>SEÑORES:</b></div>                 
      </div>

      <div style="position: absolute; top: 144px">        
        <div style="font-size: 12px; max-width: 50%; position: absolute; left: 0px; max-height: 30px; margin: 25px 0 0 0"><b>Razón Social: </b>{{$coti->client->legal_name}}</div>      
      </div>      

      <div style="position: absolute; top: 158px;">        
        <div style="font-size: 12px; max-width: 70%; position: absolute; left: 0px; max-height: 30px; margin: 25px 0 0 0; "><b>Contacto: </b>
          @if($coti->contact_id)
          {{$coti->contact->name ? $coti->contact->name : ''}}
          {{$coti->contact->cell_phone ? ' | '.$coti->contact->cell_phone : ''}}
          {{$coti->contact->email ? ' | '.$coti->contact->email : ''}}
          @endif
        </div>                   
      </div>

      @if($hasValue)
        <div class="full-width block" style="position: absolute; top: 220px"><div class="inline table-top" style="width: 4%">Nº</div><div class="inline table-top" style="width: 10%">Item</div><div class="inline table-top" style="width: 5%">Cant</div><div class="inline table-top" style="width: 7%">Un.</div><div class="inline table-top" style="width: 46%">Descripción</div><div class="inline table-top" style="width: 9%">Importe</div><div class="inline table-top" style="width: 7%">IVA[%]</div><div class="inline table-top" style="width: 9%; border-right: 1px solid black">Inc. IVA</div></div>
        <div style="position: absolute; top: 255px">
          @foreach($cotiDets as $cotiDet)
            <div style="position: relative; font-size: 12px; max-width: 98%";>
              <?php $lineCount = $lineCount + 1; ?>
              <div class="inline table-plain" style="width: 4%">{{$lineCount}}</div>
              <div class="inline table-plain" style="width: 10%">{{$cotiItems->show($cotiDet->item)}}</div>
              <div class="inline table-plain" style="width: 5%">{{$cotiDet->cant}}</div>
              <div class="inline table-plain" style="width: 7%">{{$units->show($cotiDet->units)}}</div>
              <div class="inline table-plain-left" style="width: 46%">{{$cotiDet->description}} {{$cotiDet->power ? $cotiDet->power.'kVA' :''}} {{$cotiDet->regime ? $regimes->show($cotiDet->regime) : ''}}</div>
              <div class="inline table-plain-right" style="width: 9%">{{ number_format($cotiDet->of_price, 0, ',', '.') }}</div>
              <div class="inline table-plain-right" style="width: 7%">{{ number_format($cotiDet->vat_rate, 1, ',', '.') }}</div>
              <div class="inline table-plain-right" style="width: 9%">{{ number_format($cotiDet->of_price_plus_IVA, 0, ',', '.') }}</div>
              <div style="display: block; margin: 0 0 0.2rem 0; padding: 0"></div>
            </div>
          @endforeach
        </div>
      @else
        <div class="full-width block" style="position: absolute; top: 220px"><div class="inline table-top" style="width: 4%">Nº</div><div class="inline table-top" style="width: 10%">Item</div><div class="inline table-top" style="width: 5%">Cant</div><div class="inline table-top" style="width: 7%">Un.</div><div class="inline table-top" style="width: 63%">Descripción</div><div class="inline table-top" style="width: 10%; border-right: 1px solid black">Importe</div></div>
        <div style="position: absolute; top: 255px">
          @foreach ($cotiDets as $cotiDet)
            <div style="position: relative; font-size: 12px; max-width: 98%";>
              <?php $lineCount = $lineCount + 1; ?>
              <div class="inline table-plain" style="width: 4%">{{$lineCount}}</div>
              <div class="inline table-plain" style="width: 10%">{{$cotiItems->show($cotiDet->item)}}</div>
              <div class="inline table-plain" style="width: 5%">{{$cotiDet->cant}}</div>
              <div class="inline table-plain" style="width: 7%">{{$units->show($cotiDet->units)}}</div>
              <div class="inline table-plain-left" style="width: 63%">{{$cotiDet->description}} {{$cotiDet->power ? $cotiDet->power.'kVA' :''}} {{$cotiDet->regime ? $regimes->show($cotiDet->regime) : ''}}</div>
              <div class="inline table-plain-right" style="width: 10%">{{ number_format($cotiDet->of_price, 0, ',', '.') }}</div>
              <div style="display: block; margin: 0 0 0.2rem 0; padding: 0"></div>
            </div>
          @endforeach
        </div>
      @endif

      <div style="position: absolute; top: 600px">          
        @if($coti->op1 === 1 || $coti->op2 === 1 || $coti->op3 === 1 || $coti->op4 === 1 || $coti->op5 === 1 || $coti->op9 === 1 || $coti->op10 === 1 || $coti->op11 === 1 || $coti->op12 === 1 )
          <p class="thin" style="text-align: left; font-size: 12px"><b>Incluye:</b></p>        
          <p class="thin" style="text-align: left; font-size: 12px">
            @if($coti->op1 === 1){{$cotiOps->show('1')}}@endif
            @if($coti->op2 === 1){{$cotiOps->show('2')}}@endif
            @if($coti->op3 === 1){{$cotiOps->show('3')}}@endif
            @if($coti->op4 === 1){{$cotiOps->show('4')}}@endif
            @if($coti->op5 === 1){{$cotiOps->show('5')}}@endif
            @if($coti->op9 === 1){{$cotiOps->show('9')}}@endif
            @if($coti->op10 === 1){{$cotiOps->show('10')}}@endif
            @if($coti->op11 === 1){{$cotiOps->show('11')}}@endif
            @if($coti->op12 === 1){{$cotiOps->show('12')}}@endif
          </p>
        @endif      
        @if($coti->op13 === 1 || $coti->op6 === 1 || $coti->op7 === 1 || $coti->op8 === 1 || $coti->op14 === 1 )
          <p class="thin" style="text-align: left; font-size: 12px"><b>No incluye:</b></p>
          <p class="thin" style="text-align: left; font-size: 12px">
            @if($coti->op13 === 1){{$cotiOps->show('13')}}@endif
            @if($coti->op6 === 1){{$cotiOps->show('6')}}@endif
            @if($coti->op7 === 1){{$cotiOps->show('7')}}@endif
            @if($coti->op8 === 1){{$cotiOps->show('8')}}@endif
            @if($coti->op14 === 1){{$cotiOps->show('14')}}@endif
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

      <div class="full-width block" style="position: absolute; top: 950px">
        <div class="inline table-row" style="width: 59%; color: white; border: solid 1px white">Filler</div>
        <div class="inline" style="width: 40%; border: solid 1px white; font-size: 0.75rem">
          <p style="text-align: center; margin: 0; padding: 0"><b>{{$coti->user->formal_name ? $coti->user->formal_name : ''}}</b></p>
          <p style="text-align: center; margin: 0; padding: 0">{{$coti->user->rank ? $coti->user->rank : ''}} - {{$coti->user->company}}</p>
          <p style="text-align: center; margin: 0; padding: 0">{{$coti->user->cell ? $coti->user->cell : ''}}</p>
          <p style="text-align: center; margin: 0; padding: 0">{{$coti->user->email ? $coti->user->email : ''}}</p>
        </div>
      </div>      