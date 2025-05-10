<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Citas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($citas->isEmpty())
                        <p>No tienes citas registradas.</p>
                    @else
                        <table class="table-auto w-full border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2 w-1/3">Marca</th>
                                    <th class="border border-gray-300 px-4 py-2 w-1/3">Modelo</th>
                                    <th class="border border-gray-300 px-4 py-2 w-1/3">Matrícula</th>
                                    <th class="border border-gray-300 px-4 py-2 w-1/3">Duración Estimada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($citas as $cita)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->marca }}</td>
                                        <td class="border border-gray-300 px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->modelo }}</td>
                                        <td class="border border-gray-300 px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->matricula }}</td>
                                        <td class="border border-gray-300 px-4 py-2 w-1/3 truncate whitespace-nowrap">{{ $cita->duracion_estimada }} min</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

