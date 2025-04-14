<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Данные счёта') }}
        </h2>
    </x-slot>

    <form action="{{ route('transactions.store') }}" method="POST" class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        @csrf
        
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Добавить операцию</h2>
        
        <div class="mb-4">
            <label for="type" class="block text-sm font-medium text-gray-700">Тип операции *</label>
            <select name="type" id="type" class="mt-1 w-full p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                <option value="income">Доход</option>
                <option value="expense">Расход</option>
                <option value="transfer">Перевод</option>
            </select>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-700">Сумма *</label>
                <input type="number" step="0.01" name="amount" id="amount" class="w-full p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div class="mb-4">
                <label for="currency" class="block text-sm font-medium text-gray-700">Валюта *</label>
                <select name="currency" id="currency" class="w-full p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="RUB">RUB</option>
                </select>
            </div>
        </div>
        
        <input type="hidden" name="user_id" value="{{ $userId }}">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="mb-4">
                <label for="account_id" class="block text-sm font-medium text-gray-700">ID счета *</label>
                <input type="number" name="account_id" id="account_id" class="w-full p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700">ID категории</label>
                <input type="number" name="category_id" id="category_id" class="w-full p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        </div>
        
        <div class="mb-4">
            <label for="budget_id" class="block text-sm font-medium text-gray-700">Название бюджета</label>
            <select name="budget_id" id="budget_id" class="w-full p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                @foreach ($budgets as $budget)
                    <option value="{{ $budget->id }}">{{ $budget->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-700">Дата операции *</label>
            <input type="date" name="date" id="date" class="w-full p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>
        
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Описание</label>
            <textarea name="description" id="description" rows="2" class="w-full p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500"></textarea>
        </div>
        
        <div class="flex items-center mb-4">
            <input type="checkbox" name="recurring" id="recurring" class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
            <label for="recurring" class="ml-2 text-sm text-gray-700">Повторяющаяся операция</label>
        </div>
        
        <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500">Сохранить</button>
    </form>
    

</x-app-layout>