@extends('layouts.app')

@section('title', 'Cta. Cte.')

@section('content')

@inject('months', 'App\Services\Months')
@inject('years', 'App\Services\Years')
@inject('docTypeInvoices', 'App\Services\DocTypeInvoices')
@inject('docTypes', 'App\Services\DocTypes')
@inject('saleTerms', 'App\Services\SaleTerms')
@inject('clients', 'App\Services\Clients')

<div class="container eagle-container">

  	<div class="jumbotron mac-jumbotron">    
    	<h4 class="col-4 col-sm-4 col-md-8 col-lg-8 col-xl-8 eagle-h4">Cuenta Corriente - <b>{{$client->commercial_name}}</b></h4>
  	</div> <!-- end of jumbotron -->

  	<div class="row eagle-row-clean fixed-row">

	  	<div class="col-2 sidebar-container"> <!-- 1st column -->      

	        <div class="row eagle-row-clean col-12"> 
	    		<div class="col-6 mac-label"><b>Saldo Pendiente:</b></div>
	    		<div class="col-6 mac-form-control price">{{$outstanding->debt}}</div>
	    	</div>
	        <div class="row eagle-row-clean col-12">
	        	<div class="col-6 mac-label"><b>Deuda al día:</b></div>
	        	<div class="col-6 mac-form-control price">{{$current->debt}}</div>
	        </div>
	        <div class="row eagle-row-clean col-12">
	        	<div class="col-6 mac-label"><b>Deuda atrasada:</b></div>
	        	<div class="col-6 mac-form-control price">{{$overdue->debt}}</div>     
	        </div>
	        <div class="row eagle-row-clean col-12">
	        	<div class="col-6 mac-label"><b>Condición de Venta:</b></div>
	        	<div class="col-6 mac-form-control">{{$client->payment_terms}}</div>
	        </div>
	        <div class="row eagle-row-clean col-12">
	        	<div class="col-6 mac-label"><b>Promedio de Pago:</b></div> 
	        	<div class="col-6 mac-form-control"></div>     
	        </div>
	        
	             

	    </div> <!-- end of 1st column -->

	    <div class="col-10 table-container"> <!-- 2nd column -->
	      	<table class="table table-striped mac-table">

		        <thead>
		          	<tr>
			            <th width=5% class="model_table">Tipo</th>
			            <th width=10% class="model_table">N° Doc</th>        
			            <th width=10% class="model_table">Emisión/Fecha de Cobro</th>
			            <th width=10% class="model_table">Vencimiento</th>
						<th width=5% class="model_table">Moneda</th>   
			            <th width=15% class="model_table">Total</th>   
			            <th width=15% class="model_table">Saldo</th> 
			            <th width=5% class="model_table">Días</th>
			            <th width=5% class="model_table">Días Venc</th>
			            <th width=10% class="model_table">Status</th>    
			            <th width=5% class="model_table">Cobrar</th>
		          	</tr>
		        </thead>

		        <tbody>
				@foreach ($docs->filter(function($doc) {
    return $doc->application == 0 || in_array($doc->type_doc, [4, 5, 6,18,19,20,51,53]);
}) as $oneDoc)
			            <tr class="row-factura" id="factura_{{$oneDoc->id}}"  data-target="cobranza_{{$oneDoc->id}}">
							
				            <td width=5% class="model_table">
				            	<?php
				            		$array = (array) $docTypes->get();
                  					$td = $array[$oneDoc->type_doc];
                  					echo $td;
                  				?>
                  			</td>
				            <td width=10% class="model_table">{{$oneDoc->num_doc}}</td>
				            <td width=10% class="model_table">{{$oneDoc->date()}}</td>
				            <td width=10% class="model_table">{{$oneDoc->due_date()}}</td>
							<td width=5% class="model_table">    
	@if ($oneDoc->MonId == '011')
        UYU
    @else
        {{$oneDoc->MonId}}
    @endif</td>
				            <td width=15% class="model_table price">
				            	<?php
				            		 if ($oneDoc->type_doc > 6 && !in_array($oneDoc->type_doc, [15,16,17,18, 19, 20,50, 51])) {
				            			$amount = $oneDoc->total * -1;
				            		} else {
				            			$amount = $oneDoc->total;
				            		}
				            		echo $amount;
				            	?>
				            </td>
				            <td width=15% class="model_table price">
				            	<?php
				            	 if ($oneDoc->type_doc > 6 && !in_array($oneDoc->type_doc, [15,16,17,18, 19, 20,50, 51])) {
				            			echo 0;
				            		} else {
				            			echo $oneDoc->saldo;
				            		}
				            	?>			            				
				            </td>
				            <td width=5% class="model_table">
<?php
    $now = NOW();
    $issued = $oneDoc->date;
    $paid = $oneDoc->updated_at;
    if (($oneDoc->type_doc < 7 || in_array($oneDoc->type_doc, [15,16,17,18, 19, 20, 50, 51])) && $oneDoc->saldo > 1) {
        $days_outstanding = floor((strtotime($now) - strtotime($issued)) / 86400);
        echo $days_outstanding;
    } elseif (($oneDoc->type_doc < 7 || in_array($oneDoc->type_doc, [15,16,17,18, 19, 20, 50, 51])) && $oneDoc->saldo < 1) {
        $days_outstanding = floor((strtotime($paid) - strtotime($issued)) / 86400);
        echo $days_outstanding;
    } else {
        echo "-";
    }            
?>

				            </td>
				            <td width=5% class="model_table">
<?php
$now = NOW();
$paid = $oneDoc->updated_at;
$due = $oneDoc->due_date;
$isTypeDocValid = $oneDoc->type_doc < 7 || in_array($oneDoc->type_doc, [15,16,17, 18, 19, 20, 50, 51]);
$isSaldoGreaterThanOne = $oneDoc->saldo > 1;

if ($isTypeDocValid && $isSaldoGreaterThanOne && $now > $due) {
    $days_overdue = floor((strtotime($now) - strtotime($due)) / 86400);
    echo $days_overdue;
} elseif ($isTypeDocValid && $isSaldoGreaterThanOne && $now <= $due) {
    echo "0";
} elseif ($isTypeDocValid && !$isSaldoGreaterThanOne && $paid > $due) {
    $days_overdue = floor((strtotime($paid) - strtotime($due)) / 86400); 
    echo $days_overdue;
} elseif ($isTypeDocValid && $isSaldoGreaterThanOne && $now <= $due) {
    echo "0";
} else {
    echo "-";
}
?>

   
				            </td>
				            <td width=10% class="model_table">
								
<?php
						$now = NOW();
						$issued = $oneDoc->date;
						$paid = $oneDoc->updated_at;
						$days_overdue = null;
						$days_outstanding = null;
						$isTypeDocValid = $oneDoc->type_doc < 7 || in_array($oneDoc->type_doc, [15,16,17,18, 19, 20, 50, 51]);
						$isSaldoGreaterThanOne = $oneDoc->saldo > 1;

						if ($isTypeDocValid && $isSaldoGreaterThanOne) {
							$days_outstanding = floor((strtotime($now) - strtotime($issued)) / 86400);
						} elseif ($isTypeDocValid && !$isSaldoGreaterThanOne) {
							$days_outstanding = floor((strtotime($paid) - strtotime($issued)) / 86400);
						}

						if ($isTypeDocValid && $isSaldoGreaterThanOne && $now > $due) {
							$days_overdue = floor((strtotime($now) - strtotime($due)) / 86400);
						} elseif ($isTypeDocValid && $isSaldoGreaterThanOne && $now <= $due) {
							$days_overdue = 0;
						} elseif ($isTypeDocValid && !$isSaldoGreaterThanOne && $paid > $due) {
							$days_overdue = floor((strtotime($paid) - strtotime($due)) / 86400);
						}

						$array = (array) $saleTerms->get();
						$payment_days = $array[$oneDoc->client->payment_terms];
						$total = floatval($oneDoc->total);
						$saldo = floatval($oneDoc->saldo);

						if ($isTypeDocValid) {
							if ($saldo < 1) {
								if ($days_outstanding <= $payment_days) {
									$status = "Canc al día";
								} else {
									$status = "Canc atrasado";
								}
							} elseif ($saldo == $total) {
								if ($days_overdue < 1) {
									$status = "Al día";
								} else {
									$status = "Atrasado";
								}
							} else {
								if ($days_overdue >= 1) {
									$status = "PP Atrasado";
								} else {
									$status = "PP al día";
								}
							}
						} else {
							$status = "-";
						}
?>
						<div class="color_change">
							@if ($oneDoc->type_doc < 7 || in_array($oneDoc->type_doc, [15,16,17,18, 19, 20, 50, 51]))
								{{$status}}
							@else
								- 
							@endif
						</div>

				            </td>
				            <td width=5% class="model_table">
				            	<?php 
                  					if ($oneDoc->type_doc < 7 || in_array($oneDoc->type_doc, [15,16,17, 18, 19, 20,50,51])){
                    					if ($oneDoc->saldo < 1) {?>
                      						<a class="btn eagle-button-2" style="padding: 0; font-size: 0.7rem" href="/docs/collect/{{$oneDoc->id}}">Ver Cobro</a>
                    						<?php ;} else {?>
                      						<a class="btn eagle-button-2" style="padding: 0; font-size: 0.7rem" href="/docs/collect/{{$oneDoc->id}}">Cobro</a>
                    						<?php ;}
                  					} else {
                    					echo "-";
                  					}
                				?>
				            </td>
			            </tr>


		<!-- Busqueda de Cobranzas asociadas a la factura del bucle original -->				
		@foreach ($docs->where('application', $oneDoc->id)->reject(function($cobranza) {
    return in_array($cobranza->type_doc, [4, 5, 6,15,16,17, 18, 19, 20,51]);
}) as $cobranza)
           
            <tr class="row-cobranza cobranza_{{$oneDoc->id}} hidden" >
			<td width=5% class="model_table">
				            	<?php
				            		$array = (array) $docTypes->get();
                  					$td = $array[$cobranza->type_doc];
                  					echo $td;
                  				?>
                  			</td>
				            <td width=10% class="model_table">{{$cobranza->num_doc}}</td>
				            <td width=10% class="model_table">{{$cobranza->date()}}</td>
				            <td width=10% class="model_table">{{$cobranza->due_date()}}</td>
							<td width=5% class="model_table">    
@if ($cobranza->MonId == '011')
        UYU
    @else
        {{$cobranza->MonId}}
    @endif</td>
				            <td width=15% class="model_table price">
				            	<?php
				            		if($cobranza->type_doc > 6) {
				            			$amount = $cobranza->total * -1;
				            		} else {
				            			$amount = $cobranza->total;
				            		}
				            		echo $amount;
				            	?>
				            </td>
				         <td width=15% class="model_table price" >
				            	<?php
				            		if($cobranza->type_doc > 6) {
				            			echo '0';
				            		} else {
				            			echo $cobranza->saldo;
				            		}
				            	?>			            				
				            </td>
				            <td width=5% class="model_table">
				            	<?php
                    				
				                    	echo "-";
				                              
                  				?>
				            </td>
				            <td width=5% class="model_table">
				            	<?php
                    			
                      					echo "-";
                      			
                  				?>          
				            </td>
				            <td width=10% class="model_table">
				            	<?php
				                    $now = NOW();
				                    $issued = $cobranza->date;
				                    $paid = $cobranza->updated_at;

				                      if ($cobranza->type_doc > 6 && $cobranza->saldo > 1) {
				                        $days_outstanding = floor((strtotime($now) - strtotime($issued)) / 86400);
				                      } elseif ($cobranza->type_doc > 6 && $cobranza->saldo < 1) {
				                        $days_outstanding = floor((strtotime($paid) - strtotime($issued)) / 86400);
				                      }

				                      if ($cobranza->type_doc > 6 && $cobranza->saldo > 1 && $now > $due) {
				                        $days_overdue = floor((strtotime($now) - strtotime($due)) / 86400);
				                      } elseif ($cobranza->type_doc > 6 && $cobranza->saldo > 1 && $now <= $due) {
				                        $days_overdue = 0;
				                      } elseif ($cobranza->type_doc > 6 && $cobranza->saldo < 1 && $paid > $due) {
				                        $days_overdue = floor((strtotime($paid) - strtotime($due)) / 86400);                  
				                      }

				                    $array = (array) $saleTerms->get();
				                    $payment_days = $array[$cobranza->client->payment_terms];    
				                    $total = floatval($cobranza->total);
				                    $saldo = floatval($cobranza->saldo);

				                    if ($cobranza->type_doc < 7) {                
				                      if ($saldo < 1) {
				                        if ($days_outstanding <= $payment_days) {
				                          $status = "Canc al día";
				                        } else {
				                          $status = "Canc atrasado";
				                        }
				                      } elseif ($saldo == $total) {
				                        if ($days_overdue < 1) {
				                          $status = "Al día";
				                        } else {
				                          $status = "Atrasado";
				                        }
				                      } else {
				                        if ($days_overdue >= 1) {
				                          $status = "PP Atrasado";            
				                        } else {
				                          $status = "PP al día";  
				                        }
				                      }
				                    }
				                  ?>
				                  <div class="color_change">
				                    @if ($cobranza->type_doc < 7)
				                      {{$status}}
				                    @else
				                      - 
				                    @endif
				                  </div>
				            </td>
				            <td width=5% class="model_table">
				            	<?php 
                  					if ($cobranza->type_doc < 7) {
                    					if ($cobranza->saldo < 1) {?>
                      						<a class="btn eagle-button-2" style="padding: 0; font-size: 0.7rem" href="/docs/collect/{{$oneDoc->id}}">Ver Cobro</a>
                    						<?php ;} else {?>
                      						<a class="btn eagle-button-2" style="padding: 0; font-size: 0.7rem" href="/docs/collect/{{$oneDoc->id}}">Cobro</a>
                    						<?php ;}
                  					} else {
                    					echo "-";
                  					}
                				?>
				            </td>
            </tr>
        @endforeach
		@endforeach
		        </tbody>  

	      	</table>    
	    </div> <!-- end of 2nd column -->

  	</div> <!-- end of main row -->

</div>

@endsection
@section('style')
<style>
    /* Estilos para filas de cobranzas */
    .row-cobranza {
		height: 30px;
        background-color: #dff0d8 !important; /* Color de fondo verde claro para cobranzas */
    }

    /* Estilos para filas de facturas */
    .row-factura {
		height: 30px;
        background-color: #f2dede !important; /* Color de fondo rojo claro para facturas */
    }
	.row-factura:hover {
    background-color: #e6b3b3 !important; /* Color de fondo rojo claro para hover */
}
	.hidden {
    display: none !important;
}
</style>
@endsection
@section('script')

  <script>

    var prices = document.querySelectorAll(".price")
    prices.forEach(function(price){
      price.innerText = Number(price.innerText).toFixed(0)
      price.innerText = Number(price.innerText).toLocaleString("es-ES", { maximumFractionDigits: 0, minimumFractionDigits: 0})
    });

    var els = document.getElementsByClassName('color_change');
      for (var i = 0; i < els.length; i++) {
        var cell = els[i];
        var content = cell.textContent;
        var trimmed_content = content.trim();

        if (trimmed_content == 'Atrasado' || trimmed_content == 'PP Atrasado') {          
          cell.classList.remove('green');
          cell.classList.add('red');
        } else if (trimmed_content == 'Al día' || trimmed_content == 'PP al día') {
          cell.classList.remove('red');
          cell.classList.add('green');
        } else {
          cell.classList.remove('red');
          cell.classList.remove('green');
        }
      }
	  var facturas = document.querySelectorAll('[id^="factura_"]');
facturas.forEach(function(factura) {
    factura.addEventListener('click', function() {
        var targetId = this.getAttribute('data-target'); // Obtiene el ID de la fila de cobranza asociada
        var cobranza = document.querySelectorAll('.' + targetId); // Busca todas las filas de cobranza por su clase
        cobranza.forEach(function(c) {
            c.classList.toggle('hidden'); // Muestra u oculta la fila de cobranza
        });
    });
});
  </script>


@endsection
