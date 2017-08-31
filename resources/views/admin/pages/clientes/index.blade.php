@extends('admin.layouts.master')



@section('title', 'Clientes')





@section('content')

<div class="">

  

  <div class="row">

    <div class="col-md-6">

      <h1><i class="fa fa-users"></i> Clientes</h1>

      <a href="{{url('admin/clientes/create')}}" class="btn btn-round btn-success btn-md"><i class="fa fa-plus"></i> Agregar</a>

      <a class="btn btn-round btn-primary btn-md" role="button" data-toggle="collapse" href="#herramientas" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-filter"></i> <i class="fa fa-search"></i></a>

    </div>

  </div><!-- FIN ROW -->

<form method="GET">

  <div class="collapse" id="herramientas">

    <div class="well" style="overflow: auto">

 

      <div class="row">

        

        <div class="col-md-3">

            <label>Filtrar</label>
            {{Form::select('filtro', $filtros, $input->filtro, ['class'=>'form-control', 'onChange'=>'this.form.submit()'])}}<!-- sólo ir mostrando las líneas de negocio en las que se vayan dando de alta, no mostrar todas las líneas de negocio, ejemplo: KCP o Cosben-->
        </div>



        <div class="col-md-3">

            <label for="">Línea de negocio</label>

            {{Form::select('linea', $lineas, $input->linea, ['class'=>'form-control', 'onChange'=>'this.form.submit()'])}}

        </div>



        <div class="col-md-3">

           <label>Ordenar</label>

            {{Form::select('order', ['asc'=>'Ascendente','desc'=>'Descendente','new'=>'Más reciente','old'=>'Más antigua'], $input->order, ['class'=>'form-control', 'onChange'=>'this.form.submit()'])}}

        </div>



        <div class="col-md-3">

           <div class="input-group buscador_margin">

            <input type="text" class="form-control" placeholder="Buscar..." name="buscar" value="{{$input->buscar}}">

            <span class="input-group-btn">

              <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>

            </span>

          </div>

        </div>

        

      </div>

    </div>

  

  </div>



  <div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12 bg_blanco">        

        <div class="row">

          <div class="col-md-6 col-sm-6 col-xs-12">

            <h2>LISTA DE CLIENTES</h2>

          </div>

          <div class="col-md-3 col-sm-4 col-xs-12">

            <a href="" class="btn btn-info btn-sm btn_margin"><i class="fa fa-cloud-download"></i> Descargar PDF</a>

          </div>  

          <div class="col-md-3 col-sm-4 col-xs-12 pull-right">

            <div class="form-group">

              <label class="control-label col-md-6 text-right">Mostrar </label>

              <div class="col-md-6">

                {{Form::select('numb', ['100'=>'100','50'=>'50','10'=>'10'], $input->numb, ['class'=>'form-control', 'onChange'=>'this.form.submit()'])}}

              </div>

            </div>

          </div>

        </div> <!-- FIN ROW-->
        </form>
        

        <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">

            <thead>

              <tr>

                <th>Fecha</th>

                <th>Imagen</th>

                <th>Nombre</th>

                <th>Usuario</th>

                <th>Tipo de Usuario</th>
                <th>Suscrito</th>

                <th>Acciones</th>

              </tr>

            </thead>

          <tbody>

            @foreach($clientes as $cliente)

            <tr>

              
              <td>{{Carbon\Carbon::parse($cliente->created_at)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($cliente->created_at)->format('m')).'-'.Carbon\Carbon::parse($cliente->created_at)->format('Y')}}</td>
              
              <td><img @if(isset($cliente->picture)) src="{{url($cliente->picture)}}" @else src="{{url('/asset_admin/images/default.jpg')}}" @endif  class="img-circle img-thumbnail" width="50" alt=""></td>

              <td>{{$cliente->name}}</td>

              <td>{{$cliente->email}}</td>

              <td><i class="fa @if($cliente->tipo_user=='email') fa-envelope  @elseif($cliente->tipo_user=='banco') fa-database @else fa-{{$cliente->tipo_user}}  @endif"> </i>
                @if($cliente->activated==0)
                    <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="{{$cliente->motivo}}"></i>
                @endif 
                @if($cliente->tipo_user=='newsletter')
                    Newsletter
                @endif 
                 
              </td>
              <td>
                @if($cliente->newsletter==1)
                    Si
                @else
                    no
                @endif 
              </td>
              <td>

             
               @if($cliente->activated==0)
               <a class="btn btn-round btn-primary btn-md" role="button" data-toggle="modal" href="#myModal{{$cliente->id}}" aria-expanded="false" aria-controls="collapseExample"></i> <i class="fa fa-search"></i></a>
                <div class="modal fade" id="myModal{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{$cliente->id}}">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel{{$cliente->id}}">Datos del Usuario</h4>
                    </div>
                    <div class="modal-body">
                        <label>Nombre:  <span> <b>{{$cliente->name}}</b> </span></label><br>
                        <label>Apellido Paterno: <span> <b>{{$cliente->name_father}}</b> </span></label><br>
                        <label>Apellido Materno: <span> <b>{{$cliente->name_mother}}</b> </span></label><br>
                        <label>Email:   <span> <b>{{$cliente->email}}</b></label><br>
                        <label>Movito:  </label>
                        <label><span><b>{{$cliente->motivo}}</b></label>
                                               
                    </div>
                    <div class="modal-footer">
                     
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    </div>
                  </div>
                </div>
              </div>

              @else     
               <a href="{{url('admin/clientes/'.$cliente->id.'/edit')}}" class="btn btn-warning btn-xs" alt="Editar"><i class="fa fa-pencil"></i></a>
              <a data-toggle="modal" data-target="#myModal{{$cliente->id}}" class="btn btn-danger btn-xs" alt="Eliminar"><i class="fa fa-remove"></i></a>
              <div class="modal fade" id="myModal{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                   <form id="del-form{{$cliente->id}}" action="{{ route('clientes.destroy',$cliente->id) }}" method="POST" style="display: block;">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">¿Desea eliminar este cliente?</h4>
                    </div>
                    <div class="modal-body">
                        <label>Motivo</label>
                        <textarea name="motivo" class="form-control col-6"></textarea>                        
                    </div>
                    <div class="modal-footer">
                     
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Eliminar</button>
                    </div>
                  </form>

                  </div>
                </div>
              </div>
               @endif
            </td>

            @endforeach

          </tbody>

        </table>

      </div>

      {{ $clientes->links() }} 



</div> 



</div>

@endsection
