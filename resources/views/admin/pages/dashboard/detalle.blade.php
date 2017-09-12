@extends('admin.layouts.master')



@section('title', 'Dashboard')





@section('content')

 <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <h1>Detalle del pedido {{ $pedido->get('id') }}</h1>
    @if($pedido->get('estado')=="cancelado")
        <h2 class="h2_cancelado"><i class="fa fa-remove"></i> Cancelado</h2>
    @endif
  </div>
</div>

<form action="dashboard.php">
  <div class="row bg_blanco">
        
        <div class="col-md-4">
          <h2>Datos del Cliente</h2>
          <p>
            <strong>Cliente:</strong> {{ $pedido->get('nombre') }}<br>
            <strong>Usuario:</strong> <a href="mailto:{{ $pedido->get('email') }}"> {{ $pedido->get('email') }}</a><br>
            <strong>Teléfono:</strong> {{ $pedido->get('telefono') }}<br>
            @if($pedido->get('vendedor')!="")
            <strong>Asesor:</strong> {{ $pedido->get('vendedor') }}<br>
            @endif
          </p>
        </div>

        <div class="col-md-4">
          <h2>Datos de Facturación</h2>
          <p>
            <strong>Nombre / Razón Social:</strong> {{$pedido->get('facturacion')[0]['razon_social']}}<br>
            <strong>R.F.C.</strong> {{$pedido->get('facturacion')[0]['rfc']}}<br>
            <strong>Dirección:</strong>{{$pedido->get('facturacion')[0]['direccion']}}<br>
            @if($pedido->get('factura')!="")
                <span class="tipo_factura"><strong>No. de factura:</strong> {{ $pedido->get('factura') }}</span><br>             
            @endif
          </p>
        </div>

        <div class="col-md-4">
          <h2>Datos de Envío</h2>
          <p>
            <strong>Dirección:</strong> {{$pedido->get('envio')[0]['direccion']}}<br>
          </p>
        </div>
      
        <div class="col-xs-12 col-sm-12 col-md-12">
          <hr>
          <h2>Detalle del pedido</h2>
          <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">Cantidad</th>
                        <th>Producto</th>
                        <th class="text-right">Precio</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($pedido->get('detalles') as $pe)
                        <?php $pe = (object) $pe;?>
                        <tr>
                          <td class="text-center">{{ $pe->cantidad }}</td>
                          <td>
                            <img src="{{url($pe->imagen) }}" alt="$NombreProducto $Marca $Modelo" class="img-thumbnail" width="80">
                            {{ $pe->nombre }}
                          </td>
                          <td class="text-right">$ {{ $pe->subtotal }}</td>
                        </tr>
                        @endforeach
                        <tr>
                          <td colspan="2" class="text-right"><strong>Total: </strong></td>
                          <td class="text-right"><strong>$ {{ $pedido->get('total') }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



  </div> <!-- FIN ROW -->
</form>

@endsection

