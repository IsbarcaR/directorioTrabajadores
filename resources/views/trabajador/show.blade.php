@extends('layout.app')
@section('content')

<body class="bg-gradient-to-r from-indigo-800 to-blue-900 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl max-w-4xl w-full p-8 transition-all duration-300 animate-fade-in">
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/3 text-center mb-8 md:mb-0">
                <img src="{{ $trabajador->foto }}" alt="Profile Picture" class="rounded-full w-48 h-48 mx-auto mb-4 border-4 border-indigo-800 dark:border-blue-900 transition-transform duration-300 hover:scale-105">
                <h1 class="text-2xl font-bold text-indigo-800 dark:text-white mb-2">{{ $trabajador->nombre }}</h1>
                <p class="text-gray-600 dark:text-gray-300">{{ $trabajador->departamento }}</p>
                
{{--                 <button class="mt-4 bg-indigo-800 text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition-colors duration-300">Edit Profile</button>
 --}}            </div>
            <div class="md:w-2/3 md:pl-8">
                <h2 class="text-xl font-semibold text-indigo-800 dark:text-white mb-4">Sobre mi</h2>
                <p class="text-gray-700 dark:text-gray-300 mb-6">
                    Me gustan los churros pero prefiero las tostadas
                </p>
                
               
                <h2 class="text-xl font-semibold text-indigo-800 dark:text-white mb-4"> Informacion de contacto</h2>
                <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-800 dark:text-blue-900" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                        {{ $trabajador->email }}
                    </li>
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-800 dark:text-blue-900" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                        {{ $trabajador->telefono }}
                    </li>
                    <li class="flex items-center">
                        Cargos:
                        {{ $trabajador->cargos }}
                    </li>
                </ul>
            </div>
        </div>
        <a href="{{ route('trabajador.index') }}" class="mt-4 bg-indigo-800 text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition-colors duration-300">Volver</button>

    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>

    <script>
        // Toggle dark mode based on system preference
        if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.classList.add('dark');
        }

        // Add hover effect to skill tags
        const skillTags = document.querySelectorAll('.bg-indigo-100');
        skillTags.forEach(tag => {
            tag.addEventListener('mouseover', () => {
                tag.classList.remove('bg-indigo-100', 'text-indigo-800');
                tag.classList.add('bg-blue-900', 'text-white');
            });
            tag.addEventListener('mouseout', () => {
                tag.classList.remove('bg-blue-900', 'text-white');
                tag.classList.add('bg-indigo-100', 'text-indigo-800');
            });
        });
    </script>
</body>
</html>
@endsection