<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Price Checker</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex flex-col bg-gray-100">

  <!-- Header -->
  <header class="h-[10%] bg-blue-600 flex items-center justify-center text-white text-2xl font-bold shadow-md">
    🛒 Price Checker
  </header>

  <!-- Body -->
  <livewire:price-checker.show :price="$id"/>

  <!-- Footer -->
  <footer class="h-[10%] bg-gray-800 flex items-center justify-center text-gray-200 text-lg shadow-inner">
    © 2025 Dehqon Market
  </footer>

</body>
</html>
