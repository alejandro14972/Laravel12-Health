<x-layouts.app title="Pacientes">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de especialidades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">
                <!-- Encabezado -->
                <div class="p-6  border-b border-gray-200">
                    <div class="flex justify-center items-center">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">{{ __('Editar especialidad') }}</h2>
                    </div>
                </div>
         
                <livewire:specialities.edit-specialities :speciality="$speciality" />
    
            </div>
        </div>
    </div>
</x-layouts.app>
