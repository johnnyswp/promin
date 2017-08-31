<!DOCTYPE html>
<html>
<head>
	<title>prueba</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">
    .page-break { page-break-after: always; }
    .text-right { text-align: right; font-family: 'Roboto',sans-serif;}
    table { font-size: 12px;
    border-spacing: 5px; }
    .img { width: 35px }
    table {
      border-collapse: collapse;
    }
    .data tr { border-bottom: 1px solid black; border-collapse: collapse; }
    th,td { text-align: center; } 

    </style>
</head>
<body>
    <table style="width: 100%;">
    	<tr>
    		<td style="width: 20%"><img src="{{url('/assets/images/proveedora-equipos-mineros-promin-logo.png')}}" ></td>
    		<td class="text-right">
    		    <h2>Reporte de {{$id}}</h2>
    		    <span>Periódo: 1-jul-2017 a 31-jul-2017</span>
    		</td>
    	</tr>
    </table>
    <table style="width: 100%;" class="data">
    	<tr border="1" style="border: 1px solid black;">
    		<th width="50">Fecha</th>
    		<th width="50">Cliente</th>
    		<th>E-mail</th>
    		<th>Linea de Negocios</th>
    		<th>Imagen</th>
    		<th>Tipo de Producto</th>
    		<th>Marca</th>
    		<th>Modelo</th>
    		<th>Precio</th>
        </tr>
    	<tr border="1" style="border: 1px solid black;">
    		<td>01-07-2017</td>
    		<td>nombre Ap. Paterno Ap. Materno</td> 
    		<td>example@example.com</td>
    		<td>$LineaDeNegocio</td>
    		<td><img src="{{url('/asset/uploads/1499780429-BkPYX2A68RKNukcAAVwW0Xe5jGM79QMW0zW3yE1L1NJwI1HRFx.jpg')}}" class="img"></td>
    		<td>$TipoDeProducto</td>
    		<td>$Marca</td>
    		<td>$Modelo</td>
    		<td>$14,000.00</td>
    	</tr>
    </table>
    <div class="page-break"></div>
    <h1>Page 2</h1>
</body>
</html>
