<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Удаление аккаунта') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('После удаления вашего аккаунта все его ресурсы и данные будут удалены навсегда. Перед удалением аккаунта загрузите любые данные или информацию, которые вы хотите сохранить.') }}
        </p>
    </header>

    <form method="post" action="{{ route('users.delete') }}" class="space-y-4">
        @csrf
        @method('delete')

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('Пароль для подтверждения') }}</label>
            <input 
                type="password" 
                name="password" 
                class="w-full p-2 border rounded" 
                placeholder="{{ __('Введите ваш пароль') }}" 
                required
            >
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between">
            <button 
                type="button" 
                class="bg-gray-300 text-black px-4 py-2 rounded hover:bg-gray-400"
                x-on:click="$dispatch('close')"
            >
                {{ __('Отмена') }}
            </button>

            <button 
                type="submit" 
                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
            >
                {{ __('Удалить аккаунт') }}
            </button>
        </div>
    </form>
</section>