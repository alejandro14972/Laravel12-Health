<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden">
            <!-- Encabezado -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">
                        {{ __('Lista de medidas tensión') }}
                    </h2>
                    <a href="{{ route('blood-presures.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Crear nueva medida') }}
                    </a>
                </div>
            </div>

            <div class="flex justify-end mt-3">
                <button type="button" id="cargarDatos"
                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 
                    focus:ring-yellow-300 font-medium rounded-lg 
                    text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Cargar
                    datos
                </button>
            </div>

            <div class="flex justify-end mt-3">
                <button type="button" id="OcultarDatos"
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 
                    focus:ring-red-300 font-medium rounded-lg 
                    text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Ocultar
                    datos
                </button>
            </div>

            <!-- Gráfico all-->

            <div class="max-w-4xl mx-auto p-6" id="grafico1">
                <h2 class="text-xl font-bold text-gray-700 dark:text-white">Historial de Presión Arterial</h2>
                <canvas id="bloodPressureChartCompleted"></canvas>
            </div>

            {{-- grafico media avg --}}
            <div class="max-w-4xl mx-auto p-6" id="grafico2">
                <h2 class="text-xl font-bold text-gray-700 dark:text-white">Media diaria de presión arterial</h2>
                <canvas id="bloodPressureChartAvg"></canvas>
            </div>


            <!-- Tabla de registros -->
            <div class="p-6 border-gray-200 overflow-x-auto">
                <h3 class="font-bold text-lg text-gray-800 dark:text-white mb-4">Tabla de registros</h3>
                <table class="w-full border border-gray-300 bg-white dark:bg-gray-900 text-sm">
                    <thead class="bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white uppercase">
                        <tr>
                            <th class="border px-4 py-2 text-center">Max</th>
                            <th class="border px-4 py-2 text-center">Min</th>
                            <th class="border px-4 py-2 text-center">Pulso</th>
                            <th class="border px-4 py-2 text-center">Fecha</th>
                            <th class="border px-4 py-2 text-center">Toma</th>
                            <th class="border px-4 py-2 text-center">Tiempo</th>
                            <th class="border px-4 py-2 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bloodPressureData as $blood)
                            <tr class="border hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="border px-4 py-2 text-center text-gray-800 dark:text-white">
                                    {{ $blood->systolic }}</td>
                                <td class="border px-4 py-2 text-center text-gray-800 dark:text-white">
                                    {{ $blood->diastolic }}</td>
                                <td class="border px-4 py-2 text-center text-gray-800 dark:text-white">
                                    {{ $blood->pulse }}</td>
                                <td class="border px-4 py-2 text-center text-gray-800 dark:text-white">
                                    {{ $blood->date }}</td>
                                <td class="border px-4 py-2 text-center text-gray-800 dark:text-white">
                                    {{ $blood->toma }}</td>
                                <td class="border px-4 py-2 text-center text-gray-800 dark:text-white">
                                    {{ $blood->time }}</td>
                                <td class="border px-4 py-2 text-center flex justify-evenly">
                                    <a href="{{ route('blood-presures.edit', $blood->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">
                                        {{ __('Editar') }}
                                    </a>
                                    <button wire:click="$dispatch('mostrarAlerta', { id: {{ $blood->id }} })"
                                        class="bg-red-500 hover:bg-red-900 text-white font-bold py-1 px-3 rounded">
                                        {{ __('Eliminar') }}
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="border px-4 py-4 text-center text-gray-500">
                                    {{ __('No hay registros disponibles.') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
            {{ $bloodPressureData->links() }}
        </div>
    </div>
</div>


<script>
    var botonCargar = document.getElementById('cargarDatos');
    botonCargar.addEventListener('click', cargarDatos);

    var botonOcultar = document.querySelector('#OcultarDatos');
    botonOcultar.addEventListener('click', ocultarDatos);

    botonOcultar.style.display = 'none';

    var grafico1 = document.getElementById('grafico1');
    grafico1.style.display = 'none';
    var grafico2 = document.getElementById('grafico2');
    grafico2.style.display = 'none';

    function cargarDatos() {
        botonCargar.style.display = 'none';
        botonOcultar.style.display = 'block';
        grafico1.style.display = 'block';
        grafico2.style.display = 'block';
    }

    function ocultarDatos() {
        botonCargar.style.display = 'block';
        botonOcultar.style.display = 'none';
        grafico1.style.display = 'none';
        grafico2.style.display = 'none';
    }
</script>


<script>
    var url = window.location.pathname;
    var miUrl = "/blood-presures";

    if (url == miUrl) {

        const ctx = document.getElementById('bloodPressureChartAvg').getContext('2d');

        const labels = @json($bloodTime->pluck('date'));

        const avg_systolicMorning = @json($bloodPressureDataAvgMorning->pluck('avg_systolic'));
        const avg_diastolicMorning = @json($bloodPressureDataAvgMorning->pluck('avg_diastolic'));

        const avg_systolicEvening = @json($bloodPressureDataAvgEvening->pluck('avg_systolic'));
        const avg_diastolicEvening = @json($bloodPressureDataAvgEvening->pluck('avg_diastolic'));

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                        label: 'Max Mañanas',
                        data: avg_systolicMorning,
                        borderColor: 'rgb(54, 162, 235)',
                        tension: 0.5,
                        pointBorderWidth: 4
                    },
                    {
                        label: 'Min Mañanas',
                        data: avg_diastolicMorning,
                        borderColor: 'rgb(191, 19, 209)',
                        tension: 0.5,
                        pointBorderWidth: 4
                    },
                    {
                        label: 'Max Tarde',
                        data: avg_systolicEvening,
                        borderColor: 'rgb(209, 206, 19 )',
                        tension: 0.5,
                        pointBorderWidth: 4
                    },
                    {
                        label: 'Min Tarde',
                        data: avg_diastolicEvening,
                        borderColor: 'rgb(229, 15, 51)',
                        tension: 0.5,
                        pointBorderWidth: 4
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });

    }
</script>

<script>
    var url = window.location.pathname;
    var miUrl = "/blood-presures";

    if (url == miUrl) {
        const ctx = document.getElementById('bloodPressureChartCompleted').getContext('2d');

        const labels = @json($bloodPressureDataAllMorning->pluck('date'));

        const systolicMorning = @json($bloodPressureDataAllMorning->pluck('systolic'));
        const diastolicMorning = @json($bloodPressureDataAllMorning->pluck('diastolic'));

        const systolicEvening = @json($bloodPressureDataAllEvening->pluck('systolic'));
        const diastolicEvening = @json($bloodPressureDataAllEvening->pluck('diastolic'));

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                        label: 'Max Mañanas',
                        data: systolicMorning,
                        borderColor: 'rgb(54, 162, 235)',
                        tension: 0.1
                    },
                    {
                        label: 'Min Mañanas',
                        data: diastolicMorning,
                        borderColor: 'rgb(38, 229, 15)',
                        tension: 0.1
                    },
                    {
                        label: 'Max tardes',
                        data: systolicEvening,
                        borderColor: 'rgb(220, 229, 15)',
                        tension: 0.1
                    },
                    {
                        label: 'Min tardes',
                        data: diastolicEvening,
                        borderColor: 'rgb(148, 15, 229)',
                        tension: 0.1
                    }

                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }

            }
        });
    }
</script>

<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('mostrarAlerta', (bloodPressureId) => {
            Swal.fire({
                title: '¿Eliminar?',
                text: "Un medida eliminada no podrá ser recuperada.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('deletebloodPressure', bloodPressureId);
                    Swal.fire(
                        'Eliminado!',
                        ' Eliminada correctamente.',
                        'success'
                    );
                }
            });
        });
    });
</script>
