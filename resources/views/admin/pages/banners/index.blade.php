@extends('admin.layouts.master')



@section('title', 'Banners')





@section('content')

<div class="">

  

  <div class="row">

    <div class="col-md-6">

      <h1><i class="fa fa-tag"></i> Banners</h1>

      <a href="{{url('admin/banners/create')}}" class="btn btn-round btn-success btn-md"><i class="fa fa-plus"></i> Agregar</a>      

    </div>

  </div><!-- FIN ROW -->



  <div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12 bg_blanco">

                    

                    <div class="row">

                      <div class="col-md-6 col-sm-6 col-xs-12">

                        <h2>LISTA DE BANNERS</h2>

                      </div>

                    </div> <!-- FIN ROW-->

                    

                    <table class="table table-striped table-bordered table-hover sorted_table" cellspacing="0" width="100%">

                      <thead>

                        <tr>

                          <th>Fecha</th>

                          <th>Imagen</th>

                          <th>Título</th>

                          <th>Enlace</th>

                          <th>Acciones</th>

                        </tr>

                      </thead>

                      <tbody >

                      @foreach($banners as $ba)

                        <tr rel="{{$ba->id}}">

                          <td>{{Carbon\Carbon::parse($ba->created_at)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($ba->created_at)->format('m')).'-'.Carbon\Carbon::parse($ba->created_at)->format('Y')}}</td>

                          <td>
                          @if($ba->tipo=="picture")
                            <img src="{{url($ba->picture)}}" width="80">
                          @else
                             <a href="{{$ba->picture}}"  target="_blank">
                            <img src="/asset/images/promin_play.jpg" width="80">
                            </a>
                          @endif
                          </td>

                          <td>{{$ba->title}}</td>

                          <td>

                            <a href="{{$ba->link}}" target="_blank"> Ver enlace

                          </td>

                          <td>

                            <a href="{{url('admin/banners/'.$ba->id.'/edit')}}" class="btn btn-warning btn-xs" alt="Editar"><i class="fa fa-pencil"></i></a>

                            <a data-toggle="modal" data-target="#myModal{{$ba->id}}" class="btn btn-danger btn-xs" alt="Eliminar"><i class="fa fa-remove"></i></a>
                            <div class="modal fade" id="myModal{{$ba->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">¿Desea eliminar este banner?</h4>
                                  </div>
                                 
                                  <div class="modal-footer">
                                    <form id="del-form{{$ba->id}}" action="{{ route('banners.destroy',$ba->id) }}" method="POST" style="display: block;">
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

      {{ $banners->links() }} 



</div> 

 

</div>

@endsection