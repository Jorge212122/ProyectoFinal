@extends('layouts.temp')

@section('media')

<h2 class="my-6 text-2xl font-semibold text-white dark:text-gray-200">Listado de Contenido</h2>

<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4 mt-8">
    <div>
        <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:bg-orange-500"
            href="{{ route('content.create') }}">
            Agregar contenido
        </a>
    </div>

    <!-- Mensaje con informacion del estatus del contenido -->
    <div>
        @include('partials.message-status')
    </div>

</div>

<div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs mt-6">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Nombre</th>                    
                    <th class="px-4 py-3">Tipo</th>                    
                    <th class="px-4 py-3">Editado el</th>
                    <th class="px-4 py-3">Creado el</th>
                    <th class="px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($contents as $content)
                <tr class="text-gray-700 dark:text-gray-400">
                    <!-- ID -->
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <p>{{ $content->id }}</p>
                        </div>
                    </td>

                    <!-- NOMBRE -->
                    <td class="px-4 py-3 text-sm">
                        {{ $content->name }}
                    </td>

                    <!-- SERIE -->
                    <td class="px-4 py-3 text-sm">
                            Película
                    </td>

                    <!-- Editado el -->
                    <td class="px-4 py-3 text-sm">
                        {{ $content->updated_at }}
                    </td>

                    <!-- Creado el -->
                    <td class="px-4 py-3 text-sm">
                        {{ $content->created_at }}
                    </td>

                    <!-- Ver -->
                    <td>                        
                        <a class="flex a-table dark:hover:text-purple-600 dark:text-gray-400" href="{{route('content.show', $content->id)}}">Ver
                            <svg class="w-6 h-6 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </a>                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection