<x-layouts.app title="tension arterial">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel tensión arterial') }}
        </h2>
    </x-slot>

    <livewire:BloodPressure.viewBloodPressure />
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
