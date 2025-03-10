<div class="max-w-4xl mx-auto p-6">
    <form wire:submit.prevent="createNewBloodPressure">
        <!-- systolic-->
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-white font-medium mb-1">{{ __('Máxima') }}</label>
            <input type="number" wire:model="systolic"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-950 dark:text-white"
                placeholder="132">
            @error('systolic')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- diastolic-->
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-white font-medium mb-1">{{ __('Mínima') }}</label>
            <input type="number" wire:model="diastolic"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-950 dark:text-white"
                placeholder="67">
            @error('diastolic')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- pulse-->
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-white font-medium mb-1">{{ __('Pulso') }}</label>
            <input type="number" wire:model="pulse"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-950 dark:text-white"
                placeholder="89">
            @error('pulse')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- toma-->
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-white font-medium mb-1">{{ __('Periodo de la toma') }}</label>
            <select wire:model="toma"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-800">
                <option value="" class="dark:text-gray-800">{{ __('Seleccione') }}</option>
                <option value="1" class="dark:text-gray-800">1</option>
                <option value="2" class="dark:text-gray-800">2</option>
                <option value="3" class="dark:text-gray-800">3</option>
            </select>
            @error('toma')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- fecha  --}}
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-white font-medium mb-1">{{ __('Fecha') }}</label>
            <input type="date" wire:model="date"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 
                focus: outline-none focus:ring-2 focus:ring-blue-500 text-gray-950 dark:text-white"
                placeholder="2020-01-01">
            @error('date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Seleccionar time -->
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-white font-medium mb-1">{{ __('Periodo de la toma') }}</label>
            <select wire:model="time"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-800">
                <option value="" class="dark:text-gray-800">{{ __('Seleccione mañana o tarde') }}</option>
                <option value="morning" class="dark:text-gray-800">Mañana</option>
                <option value="evening" class="dark:text-gray-800">Tarde</option>
            </select>
            @error('time')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- Observaciones --}}
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-white font-medium mb-1">{{ __('Observaciones') }}</label>
            <textarea wire:model="notes"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-950 dark:text-white"
                placeholder="Observaciones"></textarea>
            @error('notes')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Botón de Enviar -->
        <div class="mt-6 flex justify-end">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition duration-200">
                {{ __('Guardar evento') }}
            </button>
        </div>
    </form>
</div>
