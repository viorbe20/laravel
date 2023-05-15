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
    <?php foreach ($lastUsuarios as $usuario): ?>
      <tr>
        <td><?= $usuario['nombre'] ?></td>
        <td><?= $usuario['apellidos'] ?></td>
        <td><button type="button" class="btn btn-primary">Agregar</button></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>



        <a href="{{ route('crear-colaborador') }}" class="btn btn-primary me-2">Crear</a>

        
        
    </main>

@endsection
