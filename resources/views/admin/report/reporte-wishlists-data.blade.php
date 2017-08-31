<div class="col-md-12">
  <h2>Reporte de Wishlists</h2>
  <p><strong>Cliente:</strong> {{$cliente}} | 
  <strong>Línea de Negocio:</strong> {{$linea}} | 
  <strong>Tipo de Producto:</strong> {{$tipo}} | 
  <strong>Marca:</strong>{{$marca}} | 
  <strong>Modelo:</strong>{{$modelo}}</p>
  <p>Periodo: {{$desde}} a {{$hasta}}</p>
  <a href="{{url($rout)}}" class="btn btn-info btn-sm" title="Reporte-Wishlists" download><i class="fa fa-cloud-download"></i> Descargar PDF</a>
</div>
<?php use App\Models\Admin\Producto; use Carbon\Carbon; ?>
<div class="col-md-12">
  <div class="table-responsive">
    <table class="table table-bordered table-stripped table-hover">
      <thead>
        <tr>
          <th>Fecha</th>
          <th>Cliente</th>
          <th>Email</th>
          <th>Línea de negocio</th>
          <th>Imagen</th>
          <th>Tipo de Producto</th>
          <th>Marca</th>
          <th>Modelo</th>
          <th class="text-right">Precio</th>  
        </tr>
      </thead>
      <tbody>
      @foreach($wishlists as $wish)
        <tr>
          <td>{{Carbon::parse($wish->fecha)->format('d').'-'.trans('main.'.Carbon::parse($wish->fecha)->format('m')).'-'.Carbon::parse($wish->fecha)->format('Y')}}</td>
          <td>{{$wish->nombre}} {{$wish->apellido}} {{$wish->s_apellido}}</td>
          <td><a href="mailto:{{$wish->email}}">{{$wish->email}}</a></td>
          <td>{{$wish->linea}}</td>
          <td><img src="{{url(Producto::find($wish->producto_id)->image())}}" width="80" alt=""></td>
          <td>{{$wish->tipo}}</td>
          <td>{{$wish->marca}}</td>
          <td>{{$wish->modelo}}</td>
          <td class="text-right">$ {{number_format($wish->precio, 2, '.', ',')}}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
