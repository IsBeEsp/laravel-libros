@extends('plantillas.plantilla')
@section('titulo')
    detalle libro
@endsection
@section('cabecera')
    Información sobre el libro
@endsection
@section('contenido')
<div class="mx-auto max-w-sm rounded overflow-hidden shadow-lg bg-teal-200">
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">{{$libro->titulo}}</div>
      <u>Autor/a:</u><p class="text-gray-700 text-base">{{$libro->user->name}}</p>
      <u>Resumen:</u>
      <p class="text-gray-700 text-base">
        {{$libro->resumen}}
      </p>
      <u>Precio</u><p class="text-gray-700 text-base">{{$libro->pvp}}</p>
      <u>Stock</u><p class="text-gray-700 text-base">{{$libro->stock}}</p>
      <br><hr>
      <div class="flex">
            <a href="{{route('libro.index')}}" class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-backward"> Volver</i>
            </a>
      </div>
    </div>
  </div>
@endsection