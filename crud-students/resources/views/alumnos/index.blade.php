@extends('layout/template')

@section('title', 'Alumnos | Escuela')

@section ('content');

<main>
    <div class="container py-4">
        <h2 class="text-center mb-4">Listado de alumnos</h2>

        <a href="{{ route('alumnos.create') }}" class="btn btn-primary mb-4">Nuevo alumno</a>
    </div>
</main>

