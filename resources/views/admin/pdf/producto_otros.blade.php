<!DOCTYPE html>
<html>
<head>
    <title>prueba</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style type="text/css">
    body { font-family: 'Roboto',sans-serif; }
    .page-break { page-break-after: always; }
    .text-right { text-align: right;}
    table { font-size: 12px;
    border-spacing: 5px; }
    .img { width: 35px }
    table {
      border-collapse: collapse;
    }
    .data tr { border-bottom: 1px solid black; border-collapse: collapse; }
    th,td { text-align: center; } 
    .text-left { text-align: left; }
    </style>
</head>
<body>
    <table style="width: 100%;">
        <tr border="1" style="border: 1px solid black;">
            <td style="width: 20%"><img src="{{url('/assets/images/proveedora-equipos-mineros-promin-logo.png')}}" ></td>
            <td class="text-right">
                <h2>Reporte de {{$type}} de {{$producto->nombre}}</h2>
                <span>Fecha: {{Carbon\Carbon::now()->format('d').'-'.trans('main.'.Carbon\Carbon::now()->format('m')).'-'.Carbon\Carbon::now()->format('Y')}}</span>
            </td>
        </tr>
    </table>

    <table style="width: 100%;" class="data">
    @if($type == 'gastos')
        <thead>
            <tr border="1" style="border: 1px solid black;">
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Cantidad</th>
                <th >Descripción</th>
                <th class="text-right">Precio Unit.</th>
                <th class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            @foreach($data as $gasto)
            <tr border="1" style="border: 1px solid black;">
                <td>{{Carbon\Carbon::parse($gasto->created_at)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($gasto->created_at)->format('m')).'-'.Carbon\Carbon::parse($gasto->created_at)->format('Y')}}</td>
                <td >{{$gasto->user()}}</td>
                <td >{{$gasto->cantidad}}</td>
                <td >{{$gasto->descripcion}}</td>
                <td class="text-right">$ {{number_format($gasto->precio, 2, '.', ',')}}</td>
                <td class="text-right">$ {{number_format($gasto->cantidad*$gasto->precio, 2, '.', ',')}}</td>
            </tr>
            <?php $total = $total+($gasto->cantidad*$gasto->precio); ?>
            @endforeach
            <tr border="1" style="border: 1px solid black;">
                <td class="text-right" colspan="5"><strong>Total: </strong></td>
                <td class="text-right"><strong>$ {{number_format($total, 2, '.', ',')}}</strong></td>
                <td >&nbsp;</td>
            </tr>
        </tbody>
    @else
        <thead>
            <tr border="1" style="border: 1px solid black;">
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Comentarios</th>
                <th>Responsable</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $bitacora)
            <tr border="1" style="border: 1px solid black;">
                <td>{{Carbon\Carbon::parse($bitacora->created_at)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($bitacora->created_at)->format('m')).'-'.Carbon\Carbon::parse($bitacora->created_at)->format('Y')}}</td>
                <td>{{App\Models\Admin\Bitacora::responsable($bitacora->responsable)}}</td>
                <td>{{$bitacora->comentario}}</td>
                <td>{{App\Models\Admin\Bitacora::responsable($bitacora->responsable)}}</td>
            </tr>
            @endforeach
        </tbody>
    @endif
    </table>
</bo
</html>
