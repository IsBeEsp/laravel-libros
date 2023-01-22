@extends('plantillas.plantilla')
@section('titulo')
    editar libro
@endsection
@section('cabecera')
    Modificar libro
@endsection
@section('contenido')
    <div class="bg-gray-200 p-4 rounded">
        <x-form :action="route('libro.update', $libro)">
            @method('PUT')
            @bind($libro)
            <x-form-input name="titulo" label="Titulo" placeholder="Titulo"></x-form-input>
            <x-form-select name="user_id" label="Autor" :options="$autores"></x-form-select>
            <x-form-textarea name="resumen" label="Resumen" placeholder="Resumen"></x-form-textarea>
            <x-form-input name="pvp" label="Precio" type="number" step="0.01" min="0" max="100" placeholder="Precio (€)"></x-form-input>
            <x-form-input name="stock" label="Stock" type="number" step="1" min="0" max="999" placeholder="Unidades"></x-form-input>
            @endbind
            <div class="mt-2">
                <a href="{{route('libro.index')}}" class="mr-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-backward"> Volver</i>
                </a>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-redo"> Actualizar</i>
                </button>
            </div>
        </x-form>
    </div>
@endsection