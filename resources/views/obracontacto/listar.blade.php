@extends('layouts.app')

@section('body')
    <div class="card">
        <div class="card-header">
            <strong>Contactos Obra</strong>
            <a href="/obracontacto/crear" class="btn btn-link">Crear contactos obra</a>

        </div>
        <div class="card-body">
        @include('flash::message')
            <table id="tbl_obracontacto" class="table table-bordered" style="width: 100%;">
                <thead>
                <tr>
                    <th>Id Obra</th>
                    <th>Id Contacto</th>
                    <th>Nombre Contacto</th>
                    <th>creado </th>
                    <th>actualizado</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

@endsection

@section("scripts")

    <script>
        $('#tbl_obracontacto').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/obracontacto/listar',
                columns: [
                    {
                     data: 'idobra',
                     name: 'idobra',
                    },
                    {
                     data: 'idcontacto',
                     name: 'idcontacto'
                    },
                    {
                        data: 'nombrecontacto',
                        name: 'nombrecontacto'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                ]
            });

    </script>
@endsection

