<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Главная</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <x-nav-menu />

    @auth
        
    <div class="container mx-auto px-4 py-12 text-center">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Финансовое планирование для малого бизнеса</h1>
        <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
            Управляйте финансами вашего бизнеса, отслеживайте доходы и расходы, анализируйте отчёты.
        </p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('register') }}" class="px-6 py-3 bg-black text-white rounded-lg text-lg hover:bg-gray-800">
                ПРОФИЛЬ
            </a>
        </div>
    </div>

    @else

    <div class="container mx-auto px-4 py-12 text-center">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Финансовое планирование для малого бизнеса</h1>
        <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
            Управляйте финансами вашего бизнеса, отслеживайте доходы и расходы, анализируйте отчёты.
        </p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('login') }}" class="px-6 py-3 bg-black text-white rounded-lg text-lg hover:bg-gray-800">
                Войти
            </a>
        </div>
    </div>
  
    @endauth



</body>
</html>