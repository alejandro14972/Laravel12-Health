<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" overflow-hidden">
            <!-- Encabezado -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">{{ __('Lista de especialidades') }}</h2>
                    <a href="{{ route('specialities.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Crear nueva especialidad') }}
                    </a>
                </div>
            </div>

            <div class="p-6 border-gray-200 overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-800">
                            <th class="border px-4 py-2 text-left text-gray-800 dark:text-white">{{ __('Nombre') }}</th>
                            <th class="border px-4 py-2 text-left text-gray-800 dark:text-white">{{ __('Descripción') }}</th>
                            <th class="border px-4 py-2 text-center text-gray-800 dark:text-white">{{ __('Acciones') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($specialities as $speciality)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-900">
                                <td class="border px-4 py-2 text-gray-800 dark:text-white">{{ $speciality->name }}</td>
                                <td class="border px-4 py-2 text-gray-800 dark:text-white">{{ $speciality->description }}</td>
                                <td class="border px-4 py-2 text-center space-x-2">
                                    
                                    <a href="{{-- {{ route('specialitys.edit', $speciality->id) }} --}}"
                                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">
                                        {{ __('Editar') }}
                                    </a>

                                    <button wire:click="$dispatch('mostrarAlerta', { id: {{ $speciality->id }} })"
                                        class="bg-red-500 hover:bg-red-900 text-white font-bold py-1 px-3 rounded">
                                        {{ __('Eliminar') }}
                                    </button>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="border px-4 py-4 text-center text-gray-500">
                                    {{ __('No hay especialidades registradas.') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


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

<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('mostrarAlerta', (specialityId) => {
            Swal.fire({
                title: '¿Eliminar especialidad?',
                text: "Una especialidad eliminada no podrá ser recuperada.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('deletespeciality', specialityId);
                    Swal.fire(
                        'Eliminada!',
                        'La especialidad fue eliminada correctamente.',
                        'success'
                    );
                }
            });
        });
    });
</script>


