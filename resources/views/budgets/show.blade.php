<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Просмотр бюджета') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <!-- Обертка для всего контента с белым фоном -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Бюджет: {{ $budget->name }}</h2>
            <p class="text-gray-600 mb-6">Сумма: <strong class="text-xl text-gray-800">{{ number_format($budget->amount, 2) }} руб.</strong></p>
            <p class="text-gray-600 mb-6">Период: с <strong>{{ \Carbon\Carbon::parse($budget->start_date)->format('d.m.Y') }}</strong> по <strong>{{ \Carbon\Carbon::parse($budget->end_date)->format('d.m.Y') }}</strong></p>
    
            <!-- Контейнер для графика -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <canvas id="budgetChart" height="400" class="w-full"></canvas>
            </div>
        </div>
    </div>

    <script>
        window.chartData = @json($chartData);
    </script>

</x-app-layout>
