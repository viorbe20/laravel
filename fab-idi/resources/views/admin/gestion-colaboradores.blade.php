@extends('layouts.plantilla')

@section('title', 'Gestión de Colaboradores')

@section('content')
    <main id='main-gestion-colaboradores'>
    
    @php
    $lastUsuarios = App\Models\User::latest()->take(3)->get();
    @endphp

<input type="text" name="buscar" id="buscar-usuario">
<div id="resultado-busqueda">r</div>

<table class="table">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($lastUsuarios as $usuario)
      <tr>
        <td>{{ $usuario['nombre'] }}</td>
        <td>{{ $usuario['apellidos'] }}</td>
        <td>{{ $usuario['id_colaborador'] }}</td>
        @if ($usuario['id_colaborador'] == null)
          <td><button type="button" class="btn btn-success">Agregar</button></td>
        @else
          <td><button type="button" class="btn btn-warning">Eliminar</button></td>
        @endif
      </tr>
    @endforeach
  </tbody>
</table>



        <a href="{{ route('crear-colaborador') }}" class="btn btn-primary me-2">Crear</a>

        
        
    </main>

@endsection
