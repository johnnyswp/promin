<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">td img {display: block;}td { font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;padding:5px} .s1, .s2, .s3{    margin-top: 0; color: #2f3133; font-size: 19px; font-weight: bold; text-align: left;} .s2{ color:#0f345b; }.buttonArias{font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;display:block;display:inline-block;width:200px;min-height:20px;padding:10px;background-color:#3869d4;border-radius:3px;color:#ffffff;font-size:15px;line-height:25px;text-align:center;text-decoration:none;background-color:#3869d4}
.s3{color:#e32525;}</style>
</head>
<body bgcolor="#ffffff">
<div style="width: 700px; display: block; margin: 0 auto;">
<table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="700">
<tr>
   <td><img style="float: right" src="http://promocerealesgf.com.mx/assets_pro/img/logo.png" width="154" height="118" /></td>
  </tr> 
  <tr>
   <td><img src="http://promocerealesgf.com.mx/assets_pro/img/email_r1_c1.png" width="700" height="151" /></td>
  </tr>
  <tr>
   <td style=""><span class="s1">Codigo:</span> <span class="s2"> {{$code}}</span></td>
  </tr>
    <tr>
   <td style=""><span class="s1">Fecha:</span> <span class="s2"> {{$fecha}}</span></td>
  </tr>  
  <tr>
   <td align="center"><table width="30%" cellpadding="0" cellspacing="0">
    <tbody id="table">
    @foreach($datos as $d)
        <tr>
            <td><span class="s2">{{$d['puntos']}}</span></td>
            <td><span class="s2">{{$d['nombre']}} </span></td>
        </tr>
    @endforeach
    <tr id="file-1">
            <td><span class="s3">{{$total }}</span></td>
            <td><span class="s3">Total </span></td>
        </tr>
    </tbody>
</table>
    </td>
  </tr>
</table>
</div>
</body>
</html>
 
    
