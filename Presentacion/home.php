<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title><?= $titulo ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- style -->
</head>

<body>
    <header>
        <?php
        /**
         * Autor: Julico Suarez
         */
        ?>
    </header>
    <nav class="p-4">
        <!-- Menú de navegación simple -->
        <ul class="flex">
            <li class="px-4"><a href="/">Inicio</a></li>
            <li class="px-4"><a href="/feligres/index">Gestionar Feligreses</a></li>
            <li class="px-4"><a href="/ministerio/index">Gestionar Ministerios</a></li>
            <li class="px-4"><a href="/aporte/index">Gestionar Aportes</a></li>
        </ul>
    </nav>
    <main>
        <div class="m-4 p-4 bottom-0 shadow-sm">
            <!-- Aquí se mostrará el contenido de cada vista específica -->
            <?= $content ?>
        </div>
    </main>
    <footer class="m-4 p-4 bottom-0 shadow-sm">
        <!-- Pie de página simple -->
        &copy; <?= date('Y') ?> Arquitectura de Software - Julio Cesar Suarez Torrelio
    </footer>
</body>

</html>