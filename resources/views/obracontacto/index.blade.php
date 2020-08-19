@extends('layouts.app')

@section('body')
 <div class="row">
    <div class="col">
        <h3>Crear Contactos De Obra</h1>
        <a href="/obracontacto/listar">Listar</a>
    </div>
</div>
<form action="/obracontacto/guardar" method="POST">
    @csrf
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="car-head">
                <h4 class="text-center">1. Información Obra</h4>
            </div>
            <div class="row card-body">
                <div class="form-group col-6">
                    <label for="">Obra</label>
                    <select name="obra_id" id="obra_id" class="form-control">
                        <option value="">Seleccion</option>
                        @foreach($obra as $value)
                            <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                        @endforeach
                    </select>           
                </div>
            </div>
        </div>
        <div class="col-12" style="margin-top: 5%">
            <button type="submit" class="btn btn-success btn-block">Guardar</button>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-head">
            <h4 class="text-center">2. Información del contacto</h4>
            </div>
            <div class="row card-body">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Seleccione Contacto</label>
                        <select name="contactos" id="contactos" class="form-control">
                            <option value="">Seleccione  Contacto</option>
                            @foreach($cliente as $value)
                            <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
              
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Seleccione Contacto</label>
                        <select name="idtipocontacto" id="idtipocontacto" class="form-control">
                            <option value="">Seleccione  Contacto</option>
                            @foreach($cliente as $value)
                            <option value="{{ $value->id }}">{{ $value->idtipocontacto }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
                <div class="col-12">
                    <button type="button" class="btn btn-success float-right" onclick="agregar_contacto()" >Agregar</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <!-- <tr>
                        <th>Tipo Contacto</th> -->
                        <th>Nombre</th>
                        <th>Id Tipo Contacto</th>
                        <!-- <th>Documento</th>
                        <th>Telefono</th>
                        <th>Correo</th> -->
                    </tr>
                </thead>
                <tbody id="tblContactos">

                </tbody>
            </table>
        </div>
    </div>
</div>
</form>
@endsection

@section("scripts")
    <script>
   

        function agregar_contacto(){

            let contacto_id = $("#contactos option:selected").val();
            let contacto_text = $("#contactos option:selected").text();
            let idtipocontacto = $("#idtipocontacto option:selected").val();
            let tipocontacto_text = $("#idtipocontacto option:selected").text();

            $("#tblContactos").append(`

                <tr id="tr-${contacto_id}">
                    <td>
                        <input type="hidden" name="contacto_id[]" value="${contacto_id}" />
                        ${contacto_text}
                    </td>
                    <td>
                        <input type="hidden" name="idtipocontacto[]" value="${idtipocontacto}" />
                        ${tipocontacto_text}
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" onclick="eliminar_contacto(${contacto_id})">X</button>
                    </td>
                </tr>
            `);
        }

        function eliminar_contacto(id){
            $("#tr-"+id).remove();
        }
    </script>
@endsection

