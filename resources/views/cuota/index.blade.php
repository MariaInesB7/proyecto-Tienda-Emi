@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1>titulo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('cuotas.create') }}" class="btn btn-primary btb-sm">Registrar</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="cuotas" >
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Plan de Pago</th>
                        <th scope="col">Monto Total</th>
                        <th scope="col">Nro de Cuota</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($cuotas as $cuota)
                        <tr>
                            <td width="19%">{{$cuota->id}}</td>
                            <td width="19%">{{$cuota->plan_id }}</td>
                            <td width="19%">{{$cuota->monto }}</td>
                            <td width="19%">{{$cuota->nroCuota }}</td>
                            <td width="19%">{{$cuota->hora}}</td>
                            <td width="19%">{{$cuota->fecha }}</td>
                            <td width="19%">
                                <form action="{{ route('cuotas.destroy', $cuota)}}" method="POST" >
                                    @csrf
                                    @method('delete')
                                   
                                    {{-- <a href="{{route('salidas.show', $salida)}}" class="btn btn-primary btn-sm" >Ver</a> --}}
                                   
                                    {{-- <a href="{{route('cuotas.edit', $salida)}}" class="btn btn-info btn-sm" >Editar</a> --}}
                                   
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
     $('#cuotas').DataTable();
    } );
</script>
@stop