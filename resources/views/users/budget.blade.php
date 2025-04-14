<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Бюджет') }}
        </h2>
    </x-slot>   

    <div x-data="{ activeTab: 'form' }" class="p-6">
        <!-- Переключатели -->
        <div class="flex gap-4 mb-4 justify-center">
            <button 
                @click="activeTab = 'form'"
                :class="activeTab === 'form' 
                    ? 'bg-indigo-600 text-white ring-2 ring-indigo-200' 
                    : 'bg-white text-gray-700 border border-gray-300 shadow-sm hover:brightness-95'"
                class="px-6 py-3 rounded-lg font-medium transition-colors duration-200"
            >
                Добавить бюджет
            </button>
            <button 
                @click="activeTab = 'table'"
                :class="activeTab === 'table' 
                    ? 'bg-indigo-600 text-white ring-2 ring-indigo-200' 
                    : 'bg-white text-gray-700 border border-gray-300 shadow-sm hover:brightness-95'"
                class="px-6 py-3 rounded-lg font-medium transition-colors duration-200"
            >
                Таблица бюджетов
            </button>
        </div>
    
        <!-- Форма -->
        <div x-show="activeTab === 'form'" x-transition>
            @include('budgets._form',  ['company_id' => $company_id])
        </div>
    
        <!-- Таблица -->
        <div x-show="activeTab === 'table'" x-transition>
            @include('budgets._table')
        </div>
    </div>
    
</x-app-layout>