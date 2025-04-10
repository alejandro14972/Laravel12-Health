<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" overflow-hidden">
            <!-- Encabezado -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">{{ __('Lista de usuarios') }}</h2>
                    <a href="{{ route('users.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Crear nuevo') }}
                    </a>
                </div>
            </div>

            <!-- Tabla de Pacientes -->
            <div class="p-6 border-gray-200 overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-800">
                            <th class="border px-4 py-2 text-left text-gray-800 dark:text-white">{{ __('Nombre') }}
                            </th>
                            <th class="border px-4 py-2 text-left text-gray-800 dark:text-white">{{ __('Apellidos') }}
                            </th>
                            <th class="border px-4 py-2 text-left text-gray-800 dark:text-white">{{ __('Email') }}
                            </th>
                            <th class="border px-4 py-2 text-left text-gray-800 dark:text-white">{{ __('Dni') }}
                            </th>
                            <th class="border px-4 py-2 text-left text-gray-800 dark:text-white">{{ __('rol') }}
                            </th>
                            <th class="border px-4 py-2 text-left text-gray-800 dark:text-white">{{ __('alergias') }}
                            </th>
                            <th class="border px-4 py-2 text-center text-gray-800 dark:text-white">{{ __('Acciones') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-900">
                                <td class="border px-4 py-2 text-gray-800 dark:text-white">{{ $user->name }}</td>
                                <td class="border px-4 py-2 text-gray-800 dark:text-white">{{ $user->surname }}</td>
                                <td class="border px-4 py-2 text-gray-800 dark:text-white">{{ $user->email }}</td>
                                <td class="border px-4 py-2 text-gray-800 dark:text-white">{{ $user->dni }}</td>
                                <td class="border px-4 py-2 text-gray-800 dark:text-white">{{ $user->getRoleName() }}
                                </td>
                                <td class="border px-4 py-2 text-gray-800 dark:text-white">

                                    @if ($user->allergies->isNotEmpty())
                                        <ul>
                                            @foreach ($user->allergies as $allergy)
                                                <li>{{ $allergy->name }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        {{ __('No tiene alergias registradas') }}
                                    @endif

                                </td>
                                <td class="border px-4 py-2 text-center space-x-2">

                                    <a href="{{-- {{ route('users.show', $user->id) }} --}}"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">
                                        {{ __('Ver') }}
                                    </a>

                                    <a href="{{ route('users.edit', $user->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">
                                        {{ __('Editar') }}
                                    </a>

                                    <button wire:click="$dispatch('mostrarAlerta', { id: {{ $user->id }} })"
                                        class="bg-red-500 hover:bg-red-900 text-white font-bold py-1 px-3 rounded">
                                        {{ __('Eliminar') }}
                                    </button>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="border px-4 py-4 text-center text-gray-500">
                                    {{ __('No hay pacientes registrados.') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $users->links() }}
        </div>
    </div>
</div>


<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('mostrarAlerta', (userId) => {
            Swal.fire({
                title: '¿Eliminar usuario?',
                text: "Un usuario eliminado no podrá ser recuperado.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('deleteUser', userId);
                    Swal.fire(
                        'Eliminado!',
                        'El usuario fue eliminado correctamente.',
                        'success'
                    );
                }
            });
        });
    });
</script>
