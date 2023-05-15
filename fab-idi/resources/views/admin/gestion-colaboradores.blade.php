@extends('layouts.plantilla')

@section('title', 'Gestión de Colaboradores')

@section('content')
    <main>
    
    @php
      $usuarios = App\Models\User::all();
    @endphp

<input type="text" name="buscar" id="buscar-usuario">
<div id="resultado-busqueda">r</div>

        <h2>Gestión de Colaboradores</h2>
        {{-- <form id="form-buscar-usuario" method="POST" action="{{ route('buscar-usuario') }}">
            <div class="form-group">
              <input id="input-buscar-usuario" type="text" class="form-control"  placeholder="Buscar usuario">
            </div>
          </form>
          <ul id="muestra-usuarios"></ul> --}}


        <a href="{{ route('crear-colaborador') }}" class="btn btn-primary me-2">Crear</a>

        
        
    </main>

@endsection
