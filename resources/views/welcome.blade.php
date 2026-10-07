<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galería Responsiva</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">

    <!-- Barra de Navegación -->
    <nav class="bg-gray-900 text-white p-5">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-xl font-bold">Galería</div>
            <!-- El menú se oculta en celulares y aparece en pantallas medianas (md:flex) -->
            <div class="hidden md:flex space-x-6 text-sm">
                <a href="#" class="hover:text-gray-300">Inicio</a>
                <a href="#" class="hover:text-gray-300">Galería</a>
                <a href="#" class="hover:text-gray-300">Nosotros</a>
                <a href="#" class="hover:text-gray-300">Contacto</a>
            </div>
        </div>
    </nav>

    <!-- Título Principal -->
    <div class="text-center mt-12 mb-10">
        <h1 class="text-3xl font-bold text-gray-800">Nuestra Galería</h1>
    </div>

    <!-- Contenedor del Grid Responsivo -->
    <div class="max-w-7xl mx-auto px-4 mb-12">
        <!-- Aquí está la magia responsiva: 1 columna en móvil, 2 en tablet, 4 en PC -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Tarjeta 1 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBdonmg6rUCAkHry_F2XDU_mAhiC-BWqPmXyN6l6SYbOZPvBHCh8NFhfcU&s=10 alt="Paisaje Natural" class="w-full h-48 object-cover">
                <div class="p-5">
                    <h2 class="text-lg font-bold text-gray-800">Paisaje Natural</h2>
                    <p class="text-gray-500 mt-2 text-sm">Una hermosa vista de la naturaleza.</p>
                </div>
            </div>

            <!-- Tarjeta 2 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=600&q=80" alt="Montañas" class="w-full h-48 object-cover">
                <div class="p-5">
                    <h2 class="text-lg font-bold text-gray-800">Montañas</h2>
                    <p class="text-gray-500 mt-2 text-sm">Paisajes increíbles rodeados de montañas.</p>
                </div>
            </div>

            <!-- Tarjeta 3 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <img src="https://images.unsplash.com/photo-1448375240586-882707db888b?auto=format&fit=crop&w=600&q=80" alt="Bosque" class="w-full h-48 object-cover">
                <div class="p-5">
                    <h2 class="text-lg font-bold text-gray-800">Bosque</h2>
                    <p class="text-gray-500 mt-2 text-sm">Un tranquilo bosque rodeado de naturaleza.</p>
                </div>
            </div>

            <!-- Tarjeta 4 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=600&q=80" alt="Playa" class="w-full h-48 object-cover">
                <div class="p-5">
                    <h2 class="text-lg font-bold text-gray-800">Playa</h2>
                    <p class="text-gray-500 mt-2 text-sm">Un lugar perfecto para descansar.</p>
                </div>
            </div>

            <!-- Tarjeta 5 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=600&q=80" alt="Ciudad" class="w-full h-48 object-cover">
                <div class="p-5">
                    <h2 class="text-lg font-bold text-gray-800">Ciudad</h2>
                    <p class="text-gray-500 mt-2 text-sm">Arquitectura moderna en una gran ciudad.</p>
                </div>
            </div>

            <!-- Tarjeta 6 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?auto=format&fit=crop&w=600&q=80" alt="Aventura" class="w-full h-48 object-cover">
                <div class="p-5">
                    <h2 class="text-lg font-bold text-gray-800">Aventura</h2>
                    <p class="text-gray-500 mt-2 text-sm">Explora nuevos lugares y vive nuevas experiencias.</p>
                </div>
            </div>

        </div>
    </div>

</body>
</html>