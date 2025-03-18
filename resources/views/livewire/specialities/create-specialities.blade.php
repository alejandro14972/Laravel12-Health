<div class="max-w-4xl mx-auto p-6">
    <form wire:submit.prevent="createNewSpecialities">
        <!-- systolic-->
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-white font-medium mb-1">{{ __('Nombre') }}</label>
            <input type="text" wire:model="name"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-950 dark:text-white"
                placeholder="Ejem: Cardiologia">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>


        {{-- Observaciones --}}
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-white font-medium mb-1">{{ __('Descripción') }}</label>
            <textarea wire:model="description"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-950 dark:text-white"
                placeholder="Descripción de la especialidad"></textarea>
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Botón de Enviar -->
        <div class="mt-6 flex justify-end">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition duration-200">
                {{ __('Guardar') }}
            </button>
        </div>
    </form>
</div>
