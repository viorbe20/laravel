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
        {{-- <div id="resultado-busqueda"></div> --}}

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tbody-tabla-usuarios">
                @foreach ($lastUsuarios as $usuario)
                    <tr>
                        <td>{{ $usuario['nombre'] }}</td>
                        <td>{{ $usuario['apellidos'] }}</td>
                        @if ($usuario['id_colaborador'] == null)
                            <td>
                              <form method="POST" action="{{ route('crear-colaborador-post', ['id' => $usuario['id']]) }}">
                                    @csrf
                                    <div style="display:flex">
                                      
                                      <div class="form-check" style="margin: 0% 2%">
                                        <input class="form-check-input" type="radio" name="tipo_colaborador" id="tipo_colaborador_embajador" value="2" required>
                                        <label class="form-check-label" for="tipo_colaborador_embajador">
                                            Colaborador/Embajador
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin: 0% 2%">
                                        <input class="form-check-input" type="radio" name="tipo_colaborador" id="tipo_colaborador_mentor" value="3" required>
                                        <label class="form-check-label" for="tipo_colaborador_mentor">
                                            Colaborador/Mentor
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin: 0% 2%">
                                        <input class="form-check-input" type="radio" name="tipo_colaborador" id="tipo_colaborador_instituto" value="4" required>
                                        <label class="form-check-label" for="tipo_colaborador_instituto">
                                            Colaborador/Instituto
                                        </label>
                                    </div>

                                      <button type="submit" class="btn btn-success">Crear Colaborador</button>
                                    </div>
                                </form>
                            </td>
                        @else
                            <td>
                              <form method="POST" action="{{ route('eliminar-colaborador-post', ['id' => $usuario['id']]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">Eliminar Colaborador</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>


    </main>

@endsection
