<!DOCTYPE html>
<!--
    |****************************************************************************************************************
    |                               ⚡ PowerGrid Demo Table ⚡
    |****************************************************************************************************************
    | Table: App/Http/Livewire/PowerGridDemoTable.php
    | USAGE:
    | ➤ You must include Route::view('/powergrid', 'powergrid-demo'); in routes/web.php file.
    | ➤ Visit http://your-app/powergrid. Enjoy it!
    |****************************************************************************************************************
-->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    />
    <link
        href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
        rel="stylesheet"
    >
    <title>⚡ PowerGrid Demo Table ⚡</title>
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
        rel="stylesheet"
    >
    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"
    >
    <script
        src="https://cdn.jsdelivr.net/npm/flatpickr"
        defer
    ></script>
    @livewireStyles
    @powerGridStyles
</head>

<body class="bg-gray-50 px-10 py-8 antialiased">
    <div class="mb-3 rounded-md border border-gray-400 bg-gray-50 p-6 text-gray-700 shadow-md">
        Welcome to ⚡ PowerGrid ⚡,
        <br>
        <br>
        This is a demo table. You can click around and see how things behave.
        <br>
        Data is generated on the fly and changes will NOT be saved in your database.
        <br>
        Some features may require you to create a full PowerGrid component.
        <br><br>
        <p class="leading-loose">
            📚 Check our <a
                href="https://livewire-powergrid.com/"
                rel="nofollow"
                target="_blank"
                class="bg-growing-underline bg-gradient-to-r from-yellow-200 to-yellow-200"
            >Documentation</a> for more information.
            <br />
            ⭐ Enjoying? Star our <a
                href="https://github.com/Power-Components/livewire-powergrid"
                rel="nofollow"
                target="_blank"
                class="bg-growing-underline bg-gradient-to-r from-yellow-200 to-yellow-200"
            >Repository</a>!
        </p>
        <br />
        Thank you for downloading!
    </div>

    <div class="rounded border border-gray-200 bg-white p-4">
        <livewire:power-grid-demo-table />
    </div>

    <!-- Scripts -->
    @livewireScripts
    @powerGridScripts
    <script
        src="//unpkg.com/alpinejs"
        defer
    ></script>
    <script>
        window.addEventListener('showAlert', event => {
            alert(event.detail.message);
        })
    </script>
</body>

</html>
