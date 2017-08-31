@extends('admin.layouts.master')
@section('title', 'Acessos')
@section('content')

<div class="">



  <div class="row">

    <div class="col-md-6">

      <h1><i class="fa fa-key"></i> Accesos</h1>

      <a href="{{url('admin/accesos/create')}}" class="btn btn-round btn-success btn-md"><i class="fa fa-plus"></i> Agregar</a>

      <a class="btn btn-round btn-primary btn-md" role="button" data-toggle="collapse" href="#herramientas" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-filter"></i> <i class="fa fa-search"></i></a>

    </div>

  </div><!-- FIN ROW -->

  <form method="GET">

@if(!isset($_GET['filtro']))
  <div class="collapse" id="herramientas">
@else
  <div class="collapse in" id="herramientas" aria-expanded="true">
@endif

    

    <div class="well" style="overflow: auto">

     

      <div class="row">

        

        <div class="col-md-3">

            <label>Filtrar</label>
            {{Form::select('filtro', ['all'=>'Todos','nombre'=>'Nombre','user'=>'Usuario','tipo'=>'Tipo de Usuario'], $input->filtro, ['class'=>'form-control', 'onchange'=>'this.form.submit()'])}}

        </div>



        <div class="col-md-3">

            <label>Ordenar</label>
            {{Form::select('order', ['asc'=>'A-Z','desc'=>'Z-A','new'=>'Más reciente','old'=>'Más antigua'], $input->order, ['class'=>'form-control', 'onchange'=>'this.form.submit()'])}}

        </div>



        <div class="col-md-3">

          <div class="input-group buscador_margin">

            <input type="text" class="form-control" placeholder="Buscar..." name="buscar" value="{{$input->buscar}}">

            <span class="input-group-btn">

              <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>

            </span>

          </div>

        </div>

      </div> <!-- FIN ROW -->

    </div>

  </div>
  <div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12 bg_blanco">

      

      <div class="row">

        <div class="col-md-5 col-sm-6 col-xs-12">

          <h2>LISTA DE ACCESOS</h2>

        </div>

        <div class="col-md-3 col-sm-4 col-xs-12 pull-right">

          <div class="form-group">

            <label class="control-label col-md-6 text-right">Mostrar </label>

            <div class="col-md-6">

              {{Form::select('numb', ['100'=>'100','50'=>'50','10'=>'10'], $input->numb, ['class'=>'form-control', 'onChange'=>'this.form.submit()'])}}

            </div>

          </div>

        </div>

        <div class="col-md-3 col-sm-4 col-xs-12">

          <a href="" class="btn btn-info btn-sm btn_margin"><i class="fa fa-cloud-download"></i> Descargar PDF</a>

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

            <th>Acciones</th>

          </tr>

        </thead>

        <tbody>

        @foreach($users as $u)



          <tr>

            <td>{{Carbon\Carbon::parse($u->created_at)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($u->created_at)->format('m')).'-'.Carbon\Carbon::parse($u->created_at)->format('Y')}}</td>

            <td><img src="{{asset($u->picture)}}" alt="" class="img-circle img-thumbnail" width="50"></td>

            <td>{{$u->name}} {{$u->last_name}}</td>

            <td>{{$u->email}}</td>                          

            <td> {{trans('main.'.$u->role)}} </td>

            <td>

              <a href="{{url('admin/accesos/'.$u->id.'/edit')}}" class="btn btn-warning btn-xs" alt="Editar"><i class="fa fa-pencil"></i></a>

              <a data-toggle="modal" data-target="#myModal{{$u->id}}" class="btn btn-danger btn-xs" alt="Eliminar"><i class="fa fa-remove"></i></a>
              <div class="modal fade" id="myModal{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">¿Desea eliminar este acceso?</h4>
                    </div>
                   
                    <div class="modal-footer">
                      <form id="del-form{{$u->id}}" action="{{ route('accesos.destroy',$u->id) }}" method="POST" style="display: block;">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Eliminar</button>
                  </form>
                    </div>
                  </div>
                </div>
              </div>

            </td>

          </tr>

          @endforeach

        </tbody>

      </table>



    </div>

  {{ $users->links() }}

</div> 

</div>

@endsection