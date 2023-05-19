@extends('layouts.plantilla')

@section('title', 'Gestión de Colaboradores')

@section('content')
    <main id='main-gestion-colaboradores'>

        @php
            $lastUsuarios = App\Models\User::latest()
                ->take(3)
                ->get();
        @endphp

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

