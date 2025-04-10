<x-layouts.app title="Pacientes">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de alergias') }}
        </h2>
    </x-slot>
    <livewire:allergies.view-allergies/>
</x-layouts.app>