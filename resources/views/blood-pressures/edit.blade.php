<x-layouts.app title="Blood pressure">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión tensión') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">
                <!-- Encabezado -->
                <div class="p-6  border-b border-gray-200">
                    <div class="flex justify-center items-center">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">{{ __('Editar tensión') }}
                        </h2>
                    </div>
                </div>
           
                <livewire:blood-pressure.edit-blood-pressure :bloodPressure="$bloodPressure" />
            </div>
        </div>
    </div>
</x-layouts.app>

