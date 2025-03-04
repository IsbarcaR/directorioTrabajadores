@extends('layout.app')

@section('content')
    <div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Lista de Trabajadores</h2>
        <form action="{{ route('trabajador.filtro') }}" class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center gap-4">
                <label for="filtro" class="text-lg font-medium text-gray-700">Filtros:</label>
        
                <select name="filtro" id="filtro" class="w-full md:w-64 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    <option value="">Seleccione opción</option>
                    <option value="Nombre">Nombre</option>
                    <option value="Apellidos">Apellidos</option>
                    <option value="Fecha">Fecha nacimiento</option>
                    <option value="Mayor">Mayor 55</option>
                    <option value="Sustituto">Sustituto</option>
                    <option value="Electronica">Electronica</option>
                    <option value="Cristales">Cristales</option>
                    <option value="Oficina">Oficina</option>
                    <option value="Director">Director</option>
                    <option value="Operario">Operario</option>
                    <option value="Lead">Lead</option>
                </select>
        
                <!-- Botón -->
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                    Buscar
                </button>
            </div>
        </form>
        
        <table class="w-full border-collapse border border-gray-300 rounded-lg shadow-sm">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="border border-gray-300 px-4 py-2">Nombre</th>
                    <th class="border border-gray-300 px-4 py-2">Apellidos</th>
                    <th class="border border-gray-300 px-4 py-2">Teléfono</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Foto</th>
                    <th class="border border-gray-300 px-4 py-2">Departamento</th>
                    <th class="border border-gray-300 px-4 py-2">Nacimiento</th>
                    <th class="border border-gray-300 px-4 py-2">Sustituto</th>
                    <th class="border border-gray-300 px-4 py-2">Mayor 55</th>
                    <th class="border border-gray-300 px-4 py-2">Cargos</th>
                    <th class="border border-gray-300 px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trabajadores as $trabajador)
                    <tr class="border border-gray-300 hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2"><a href="{{ route('trabajador.show',$trabajador->id) }}">{{ $trabajador->nombre }}
                            @if($trabajador->cumpleAniosHoy)
                            <span class="text-yellow-500" title="¡Feliz cumpleaños!">
                                🎂 
                            </span>
                        @endif
                    </a></td>
                        <td class="border border-gray-300 px-4 py-2">{{ $trabajador->apellidos }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $trabajador->telefono }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $trabajador->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <img src="{{ $trabajador->foto }}" alt="Foto" class="w-10 h-10 rounded-full">
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ $trabajador->departamento }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $trabajador->fecha_nacimiento }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            @if($trabajador->sustituto)
                                ✅
                            @else
                                ❌
                            @endif
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            @if($trabajador->mayor55)
                                ✅
                            @else
                                ❌
                            @endif
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            @php
                                $cargos = json_decode($trabajador->cargos, true);
                            @endphp
                            <ul class="list-disc pl-4">
                                @foreach ($cargos as $cargo)
                                    <li>{{ ucfirst($cargo) }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="{{ route('trabajador.edit', $trabajador->id) }}" class="text-blue-500 hover:underline">Editar</a> |
                            <form action="{{ route('trabajador.destroy',$trabajador->id) }} " method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('trabajador.create') }}">Crear Trabajador</a>
@endsection
