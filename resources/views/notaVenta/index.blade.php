@extends('adminlte::page')

@section('title', 'notaVentas')

@section('content_header')
    <h1>NOTA DE VENTASs</h1>
@stop

@section('content')


<div class="card">
        <div class="card-header">
            <a href="{{url('notaVentas.create')}}"class="btn btn-primary btb-sm">Registrar Nota de Venta</a>
        </div>
  </div>
<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="notaVentas" >

        <thead>

          <tr>
            <th scope="col">Id</th>
            <th scope="col">Cliente</th>
            <th scope="col">Monto</th>
            <th scope="col">Fecha</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($notaVentas as $notaVenta)

            <tr>
              <td>{{$notaVenta->id}}</td>
               <td>{{DB::table('clientes')->where('id',$notaVenta->nroCliente)->value('nombre')}}</td>
               <td>{{$notaVenta->monto}}</td>
               <td>{{$notaCompra->updated_at}}</td>
               <td>
                 <form action="{{route('notaVentas.destroy',$notaVenta)}}" method="post">
                   @csrf
                   @method('delete')
                   <a class="btn btn-primary btn-sm" href="{{route('notaVentas.show', $compra)}}">Ver</a>
                     
                   <a href="{{route('notaVentas.edit', $notaCompra)}}"class="btn btn-info btn-sm">Editar</a>
                   <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                   value="Borrar">Eliminar</button> 
                 </form>
               </td>
            </tr>
  
             @endforeach
  
          </tbody>
  
        </table>
    </div>
  </div>
  
  @stop
  
  @section('css')
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
  @stop
  
  @section('js')
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
      <script>
          $(document).ready(function() {
           $('#notaVentas').DataTable();
          } );
      </script>
  @stop