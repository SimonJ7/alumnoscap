@extends('layouts.main')

@section('title', 'Administrar usuarios') 

@section('styles')
   <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection


@section('content')

    <a href="usuarios/nuevo" class="btn btn-primary" role="button"><i class="far fa-user"></i> Crear usuario</a>

    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>CI</th>
                <th>Name</th>
                <th>Celular</th>
                <th>Cursos asignados</th>
                <th>Opciones</th>
            </tr>
        </thead>
    </table>
@stop


@section('scripts')
   <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

   <script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('loadData') !!}',
            columns: [
                { data: 'ci', name: 'ci' },
                { data: 'name', name: 'name' },
                { data: 'cellphone', name: 'cellphone' },
                { data: 'total', name: 'total' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
            }
        });
    });
    </script>


@endsection



