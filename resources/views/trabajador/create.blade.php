@extends('layout.app')
@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <form action="{{ route('trabajadores.store') }}" method="POST" class="space-y-4">
            @csrf
            <fieldset class="space-y-4">
                <div>
                    <label for="nombre" class="block font-medium">Nombre:</label>
                    <input type="text" name='nombre' class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="apellidos" class="block font-medium">Apellidos:</label>
                    <input type="text" name='apellidos' class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="telefono" class="block font-medium">Teléfono:</label>
                    <input type="text" name='telefono' class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="email" class="block font-medium">Email:</label>
                    <input type="text" name='email' class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="foto" class="block font-medium">Foto:</label>
                    <input type="text" name='foto' class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="departamento" class="block font-medium">Departamento:</label>
                   <select name='departamento' class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="electronica">Electronica</option>
                    <option value="cristales">Cristales</option>
                    <option value="oficina">Oficina</option>
                   </select>
                </div>
                <div>
                    <label for="fecha_nacimiento" class="block font-medium">Fecha de Nacimiento:</label>
                    <input type="date" name='fecha_nacimiento' class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex items-center gap-2">
                    <input type="checkbox" name='sustituto' class="h-5 w-5 text-blue-500 focus:ring-blue-500">
                    <label for="sustituto" class="font-medium">Sustituto</label>
                </div>
                <div class="flex items-center gap-2">
                    <input type="checkbox" name='mayor55' class="h-5 w-5 text-blue-500 focus:ring-blue-500">
                    <label for="mayor55" class="font-medium">Mayor de 55</label>
                </div>
                <div>
                    <label class="block font-medium">Cargos:</label>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="cargos[]" value="director" class="h-5 w-5 text-blue-500 focus:ring-blue-500">
                            Director
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="cargos[]" value="operario" class="h-5 w-5 text-blue-500 focus:ring-blue-500">
                            Operario
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="cargos[]" value="lead" class="h-5 w-5 text-blue-500 focus:ring-blue-500">
                            Lead
                        </label>
                    </div>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition">Enviar</button>
            </fieldset>
        </form>
    </div>
@endsection