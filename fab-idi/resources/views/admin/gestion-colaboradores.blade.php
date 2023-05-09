@extends('layouts.plantilla')

@section('title', 'Gestión de Colaboradores')

@section('content')
    <main>

        <h2>Gestión de Colaboradores</h2>

        <a href="{{ route('crear-colaborador') }}" class="btn btn-primary me-2">Crear</a>

        
        
    </main>

@endsection
