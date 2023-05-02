@extends('layout/template')

@section('title', 'Alta Alumnos | Escuela')

@section('content');

    <main>
        <div class="container py-4">
            <h2 class="text-center mb-4">Alta alumno</h2>

            <form action="{{ url('alumnos') }}" method="post">
                @csrf

                <div class="mb-3 row">
                    <label for="matricula" class="col-sm-2 col-form-label">Matrícula</label>
                    <div class="col-sm-5">
                        {{-- old recupera el valor que el usuario ingresó anteriormente en el campo 'matricula' 
                        y lo muestra en el campo para que el usuario no tenga que volver a ingresar la información. 
                        Si el usuario envió el formulario sin ingresar información, 
                        entonces el valor de old('matricula') será nulo y el campo aparecerá vacío --}}
                        <input type="text" name="matricula" id="matricula" class="form-control"
                            value="{{ old('matricula') }}" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre Completo</label>
                    <div class="col-sm-5">
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}"
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="fecha" class="col-sm-2 col-form-label">Fecha de nacimiento</label>
                    <div class="col-sm-5">
                        <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha') }}"
                            required>
                    </div>

                    <div class="mb-3 row">
                        <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
                        <div class="col-sm-5">
                            <input type="text" name="telefono" id="telefono" class="form-control"
                                value="{{ old('telefono') }}" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-5">
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email') }}" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nivel" class="col-sm-2 col-form-label">Nivel:</label>
                        <div class="col-sm-5">
                            <select name="nivel" id="nivel" class="form-select" required>
                                <option value="">Seleccione un nivel</option>
                                @foreach ($niveles as $nivel)
                                    <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </main>
