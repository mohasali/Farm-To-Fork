<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Laravel Project</title>
</head>
<body class="bg-gray-100">

    <!-- Background image container -->
    <div class="relative h-[80vh] w-full bg-cover bg-center" style="background-image: url('{{ asset('images/Tractor.jpeg') }}');">
        <!-- Navigation Bar -->
        <nav class="absolute top-0 left-0 w-full flex justify-center items-center py-4">
            <ul class="flex space-x-6">
                <li><a href="/" class="text-white hover:text-gray-300">Home</a></li>
                <li><a href="/about" class="text-white hover:text-gray-300">About</a></li>
                <li><a href="/contact" class="text-white hover:text-gray-300">Contact</a></li>
            </ul>
        </nav>
    </div>
    <div class="p-8">
        <h1 class="text-4xl font-bold">Header</h1>
        <p class="mt-4 text-lg">Paragraph</p>
    </div>
</body>
</html>