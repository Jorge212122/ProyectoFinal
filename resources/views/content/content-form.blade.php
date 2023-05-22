@extends('layouts.temp')

@section('media')
@if(isset($content))
    <h2 class="my-6 text-2xl font-semibold text-white dark:text-gray-200">Editar Contenido</h2>
@else 
    <h2 class="my-6 text-2xl font-semibold text-white dark:text-gray-200">Agregar Contenido</h2>
@endif

@if(isset($content))
    <div>
        <a class="button-nav" href="{{ route('content.show', $content->id) }}">
            Regresar
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M8.445 14.832A1 1 0 0010 14v-2.798l5.445 3.63A1 1 0 0017 14V6a1 1 0 00-1.555-.832L10 8.798V6a1 1 0 00-1.555-.832l-6 4a1 1 0 000 1.664l6 4z" />
            </svg>
        </a>
    </div>
@else
    <div>
        <a class="button-nav" href="{{ route('content.index') }}">
            Regresar al listado de contenido
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M8.445 14.832A1 1 0 0010 14v-2.798l5.445 3.63A1 1 0 0017 14V6a1 1 0 00-1.555-.832L10 8.798V6a1 1 0 00-1.555-.832l-6 4a1 1 0 000 1.664l6 4z" />
            </svg>
        </a>
    </div>
@endif

<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 mt-6">
    @include('partials.form-errors') 
    @if(isset($content))
    {{-- Edición de contenido --}}
    <form action="{{route('content.update', $content)}}" method="POST">
        @method('PATCH')
    @else
    {{-- Creación de contenido --}}
    <form action="{{route('content.store')}}" method="POST" enctype="multipart/form-data">
    @endif
        @csrf

        <label for="name" class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nombre</span>
            <input type="text"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-500 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Escribe el nombre del contenido..." name="name" id="name"
                value="{{ old('name') ?? $content->name ?? ''}}" />
        </label>

        <label for="description" class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Descripción</span>
            <textarea
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-blue-500 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                rows="3" placeholder="Escribe la descripción del contenido..." name="description"
                id="description">{{ old('description') ?? $content->description ?? ''}}</textarea>
        </label>

        <label for="duration" class="block text-sm" id="duration_label">
            <span class="text-gray-700 dark:text-gray-400">Duration</span>
            <input type="number"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-500 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                name="duration" id="duration" value="{{ old('duration') ?? $content->duration ?? ''}}" />
        </label>

        <label for="year" class="block text-sm" id="year_label">
            <span class="text-gray-700 dark:text-gray-400">Año</span>
            <input type="number"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-500 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                name="year" id="year" value="{{ old('year') ?? $content->year ?? ''}}" />
        </label>

        @if(!isset($content))
        <label for="image_temp" class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Seleccionar imagen</span>
            <input type="file"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-500 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                name="image_temp" id="image_temp"/>
        </label>
        @endif

        <div class="py-4">
            <button type="submit" class="button-nav">
                @if(isset($content))
                    <span>Guardar cambios</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z" />
                    </svg>
                @else
                    <span>Agregar contenido</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                @endif
            </button>
        </div>
    </form>
</div>
@endsection
