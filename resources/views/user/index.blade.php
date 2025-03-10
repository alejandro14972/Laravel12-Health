<x-layouts.app title="Pacientes">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de usuarios') }}
        </h2>
    </x-slot>
    <livewire:user.view-users />
</x-layouts.app>
<script>
    @if (session()->has('alerta'))
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "{{ session('alerta') }}",
            showConfirmButton: true,
        });
    @endif
</script>
