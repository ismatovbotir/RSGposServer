<main class="h-[80%] flex flex-col items-center justify-center p-6">
    <!-- Product Image -->
    <div class="mb-6">
      <img src="https://via.placeholder.com/200" 
           alt="Product Image" 
           class="w-48 h-48 object-contain mx-auto">
    </div>
    <div> 
        <input type="text" wire:model.live="barcode" wire:keydown.enter="searchBarcode" autofocus>
    </div>
    <!-- Barcode -->
    
    <div class="mb-4">
      <p class="text-lg font-bold tracking-widest text-gray-800">
        1234567890123
      </p>
    </div>

    <!-- Scan Text -->
    <div>
      <p class="text-2xl font-semibold text-blue-600 animate-pulse">
        📷 Scan to see price
      </p>
    </div>
</main>
