<form action="{{ url('/budgets') }}" method="POST" class="max-w-2xl mx-auto mt-16 bg-white p-6 rounded-lg shadow-md">
    @csrf
    
    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Добавить бюджет</h2>
    
    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">{{ session('success') }}</div>
    @endif
    
    <input type="hidden" name="company_id" value="{{ $company_id }}">
    
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Название</label>
        <input type="text" name="name" required class="w-full p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
    </div>
    
    <div class="mb-4">
        <label for="amount" class="block text-sm font-medium text-gray-700">Сумма</label>
        <input type="number" step="0.01" name="amount" required class="w-full p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
    </div>
    
    <div class="mb-4">
        <label for="start_date" class="block text-sm font-medium text-gray-700">Дата начала</label>
        <input type="date" name="start_date" required class="w-full p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
    </div>
    
    <div class="mb-4">
        <label for="end_date" class="block text-sm font-medium text-gray-700">Дата окончания</label>
        <input type="date" name="end_date" class="w-full p-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
    </div>
    
    <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500">Сохранить</button>
</form>

