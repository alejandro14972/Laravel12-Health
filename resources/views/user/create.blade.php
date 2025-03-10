<x-layouts.app title="Pacientes">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">
                <!-- Encabezado -->
                <div class="p-6  border-b border-gray-200">
                    <div class="flex justify-center items-center">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">{{ __('Crear nuevo usuario') }}
                        </h2>
                    </div>
                </div>
                @livewire('user.create-user')
            </div>
        </div>
    </div>
</x-layouts.app>

