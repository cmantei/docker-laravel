<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
        <a href="{{ route('citascliente.index') }}" class="btn btn-outline-primary px-2 py-1 rounded-md">
                {{ __('Citas') }}
            </a>
            <a href="{{ route('citascliente.create') }}" class="btn btn-outline-primary px-2 py-1 rounded-md">
                {{ __('Nueva cita') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="table-fixed w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2 w-1/3">{{ __('Coche') }}</th>
                                    <th class="border border-gray-300 px-4 py-2 w-1/3">{{ __('Matricula') }}</th>
                                    <th class="border border-gray-300 px-4 py-2 w-1/3">{{ __('Fecha') }}</th>
                                    <th class="border border-gray-300 px-4 py-2 w-1/3">{{ __('Hora') }}</th>
                                    <th class="border border-gray-300 px-4 py-2 w-1/3">{{ __('Duracion') }}</th>
                                    <th class="border border-gray-300 px-4 py-2 w-1/6 text-center">{{ __('') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($citas as $cita)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->marca }} - {{ $cita->modelo }}</td>
                                        <td class="border border-gray-300 px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->matricula }}</td>
                                        <td class="border border-gray-300 px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->fecha }}</td>
                                        <td class="border border-gray-300 px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->hora }}</td>
                                        <td class="border border-gray-300 px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->duracion_estimada }}</td>

                                        <td class="border border-gray-300 px-4 py-2 w-1/6 text-center">
                                            <div class="flex justify-center items-center gap-1">
                                                <a href="{{ route('citascliente.show', $cita->id) }}" class="btn btn-sm btn-outline-primary" title="{{ __('Ver') }}">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>