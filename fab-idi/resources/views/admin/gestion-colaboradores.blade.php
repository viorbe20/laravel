@extends('layouts.plantilla')

@section('title', 'Gestión de Colaboradores')

@section('content')
    <main id='main-gestion-colaboradores'>

        <input type="text" name="buscar" id="buscar-usuario">

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tbody-tabla-usuarios">
            </tbody>
        </table>


    </main>

@endsection

