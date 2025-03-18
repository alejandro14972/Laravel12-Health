<x-layouts.app title="Pacientes">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de usuarios') }}
        </h2>
    </x-slot>
    <livewire:specialities.view-specialities />

   {{--  <livewire:user.edit-user :user="$user" /> --}}
</x-layouts.app>