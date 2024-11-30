<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Layout</title>
    @livewireStyles
</head>
<body>
<header style="background: #f8f9fa; padding: 10px; text-align: center;">
    🥖 <strong>Header</strong>: Welcome to My Awesome Site!
</header>

<main style="padding: 20px;">
    {{ $slot }}
</main>

<footer style="background: #f8f9fa; padding: 10px; text-align: center;">
    🥖 <strong>Footer</strong>: Thank you for visiting!
</footer>

@livewireScripts
</body>
</html>
