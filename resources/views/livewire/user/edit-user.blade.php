<div class="max-w-4xl mx-auto p-6">
    <form wire:submit.prevent="updateUser">
        <!-- Nombre -->
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-white font-medium mb-1">{{ __('Nombre') }}</label>
            <input type="text" wire:model="name"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-950 dark:text-white"
                placeholder="Ej: Juan">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- surname --}}
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-white font-medium mb-1">{{ __('Apellidos') }}</label>
            <input type="text" wire:model="surname"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-950 dark:text-white"
                placeholder="Ej: Pérez">
            @error('surname')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>


        {{-- email --}}
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-white font-medium mb-1">{{ __('Email') }}</label>
            <input type="text" wire:model="email"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-950 dark:text-white"
                placeholder="anonimo@correo.com">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- password --}}
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-white font-medium mb-1">{{ __('Contraseña') }}</label>
            <input type="text" wire:model="password"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-950 dark:text-white"
                placeholder="password">
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- dni --}}
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-white font-medium mb-1">{{ __('DNI') }}</label>
            <input type="text" wire:model="dni"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-950 dark:text-white"
                placeholder="11111111A">
            @error('dni')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- direccion --}}
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-white font-medium mb-1">{{ __('direccion') }}</label>
            <input type="text" wire:model="adress"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-950 dark:text-white"
                placeholder="Ej: España, Andalucía, Sevilla">
            @error('adress')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- fecha nacimiento --}}
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-white font-medium mb-1">{{ __('Fecha de nacimiento') }}</label>
            <input type="date" wire:model="birthdate"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 
                focus: outline-none focus:ring-2 focus:ring-blue-500 text-gray-950 dark:text-white"
                placeholder="2020-01-01">
            @error('birthdate')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- telefono --}}
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-white font-medium mb-1">{{ __('Teléfono') }}</label>
            <input type="number" wire:model="phone"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-950 dark:text-white"
                placeholder="666666666">
            @error('phone')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Seleccionar Rol -->
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-white font-medium mb-1">{{ __('Rol') }}</label>
            <select wire:model="role"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-800">
                <option value="" class="dark:text-gray-800">{{ __('Seleccione un rol') }}</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}" class="dark:text-gray-800">{{ ucfirst($role->name) }}</option>
                @endforeach
            </select>
            @error('role')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Seleccionar gender -->
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-white font-medium mb-1">{{ __('Gender') }}</label>
            <select wire:model="gender"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-800">
                <option value="" class="dark:text-gray-800">{{ __('Seleccione un género') }}</option>
                <option value="Hombre" class="dark:text-gray-800">Hombre</option>
                <option value="Mujer" class="dark:text-gray-800">Mujer</option>
            </select>
            @error('gender')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Botón de Enviar -->
        <div class="mt-6 flex justify-end">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition duration-200">
                {{ __('Guardar Usuario') }}
            </button>
        </div>
    </form>
</div>
