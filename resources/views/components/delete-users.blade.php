{{-- resources/views/components/delete-users.blade.php --}}
@props(['user'])

<x-danger-button 
    x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion-{{ $user->id }}')"
>
    {{ __('Удалить аккаунт') }}
</x-danger-button>

<x-modal name="confirm-user-deletion-{{ $user->id }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('users.destroy', $user) }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Вы уверены что хотите удалить аккаунт?') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('После удаления этого аккаунта все его ресурсы и данные будут удалены навсегда.') }}
        </p>

        <div class="mt-6">
            <x-input-label for="password-{{ $user->id }}" value="{{ __('Пароль') }}" class="sr-only" />

            <x-text-input
                id="password-{{ $user->id }}"
                name="password"
                type="password"
                class="mt-1 block w-3/4"
                placeholder="{{ __('Пароль') }}"
            />

            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Отмена') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Удалить аккаунт') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
