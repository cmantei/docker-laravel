<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Nueva Cita') }}
            </h2>
            <a href="{{ route('citastaller.index') }}" class="btn btn-outline-primary px-2 py-1 rounded-md">
                {{ __('Volver') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('citastaller.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="marca" class="block text-gray-700">{{ __('Marca vehiculo') }}</label>
                            <input type="text" name="marca" id="marca" class="w-full border-gray-300 rounded-md shadow-sm @error('marca') border-red-500 @enderror" value="{{ old('marca') }}" required>
                            @error('marca')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="modelo" class="block text-gray-700">{{ __('Modelo vehiculo') }}</label>
                            <input type="text" name="modelo" id="modelo" class="w-full border-gray-300 rounded-md shadow-sm @error('modelo') border-red-500 @enderror" value="{{ old('modelo') }}" required>
                            @error('modelo')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="matricula" class="block text-gray-700">{{ __('Matricula vehiculo') }}</label>
                            <input type="text" name="matricula" id="matricula" class="w-full border-gray-300 rounded-md shadow-sm @error('matricula') border-red-500 @enderror" value="{{ old('matricula') }}" required>
                            @error('matricula')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label for="fecha" class="block text-gray-700">{{ __('Fecha') }}</label>
                            <input type="date" name="fecha" id="fecha" class="w-full border-gray-300 rounded-md shadow-sm @error('fecha') border-red-500 @enderror" value="{{ old('fecha') }}" required>
                            @error('fecha')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="hora" class="block text-gray-700">{{ __('Hora') }}</label>
                            <input type="time" name="hora" id="hora" class="w-full border-gray-300 rounded-md shadow-sm @error('hora') border-red-500 @enderror" value="{{ old('hora') }}" required>
                            @error('hora')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="duracion" class="block text-gray-700">{{ __('Duracion') }}</label>
                            <input type="text" name="duracion" id="duracion" class="w-full border-gray-300 rounded-md shadow-sm @error('duracion') border-red-500 @enderror" value="{{ old('duracion') }}" required>
                            @error('duracion')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="cliente" class="block text-gray-700">{{ __('Cliente') }}</label>
                            <select name="cliente_id" id="cliente" class="w-full border-gray-300 rounded-md shadow-sm @error('cliente') border-red-500 @enderror" required>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">
                                        {{ $cliente->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('cliente_id')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-outline-primary px-4 py-2 rounded-md">
                            {{ __('Guardar') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>