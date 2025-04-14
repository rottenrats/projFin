<nav class="flex items-center justify-between p-4 bg-white dark:bg-gray-800 shadow-md">
    <div class="text-lg font-semibold">
        <a href="{{ route('home') }}" class="text-gray-900 dark:text-white">
            <img src="{{ asset('images/logo.png') }}" alt="Dashboard" class="w-6 h-6 inline">
        </a>
    </div>
    <div class="flex items-center gap-4">
        @auth
            <a
                href="{{ route('about') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
            >
                О нас
            </a>

            <a
                href="{{ route('contact') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
            >
                Контакты
            </a>


            <a
                href="{{ url('/dashboard') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
            >
                Профиль
            </a>
        @else
            <a
                href="{{ route('about') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
            >
                О нас
            </a>

            <a
                href="{{ route('contact') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
            >
                Контакты
            </a>
           
            <a
                href="{{ route('login') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
            >
                Авторизация
            </a>
        @endauth
    </div>
</nav>
