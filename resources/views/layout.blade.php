<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Navigator')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

</head>
<body>

    <header>
        <h1>Navigator</h1>
    </header>

    <nav>
        <ul>
            <li><a href="/catalogo">Inicio</a></li>
            <li><a href="http://127.0.0.1:8000/catalogo">Catálogo</a></li>
            <li><a href="http://127.0.0.1:8000/estimaciones">Generar estimación</a></li>
            <li><a href="http://127.0.0.1:8000/estimaciones/reportes">Estimaciones</a></li>
            <li><a href="/contact">Generar reporte diario</a></li>
            <li><a href="http://127.0.0.1:8000/estimaciones">Reportes diarios</a></li>
            <li><a href="/contact">Reporte global</a></li>
                <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </li>
        </ul>
    </nav>

    <main>
        @yield('content')
    </main>
    
    <footer>
        <p>&copy; {{ date('Y') }} Navigator. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
