<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Price Checker — Магазинный стиль</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans w-full">

  <div class="max-w-5xl mx-auto p-6 w-full">
    <!-- Header -->
    <header class="flex items-center gap-4 mb-6">
      <div class="flex items-center gap-10 bg-white shadow-md rounded-xl px-4 py-4 w-full">
        <img src="/images/logo.png" class="max-h-20 object-contain" alt="">
        <div>
          <div class="font-bold text-lg text-blue-800">Salomat</div>
          <div class="text-xs text-gray-500">Supermarket</div>
        </div>
      
        
        <div>
          <div class="font-bold text-lg text-blue-800">73 479 17 31</div>
          <div class="text-xs text-gray-500">Fargona viloyati Bagdod tumani Mustaqillik k.56</div>
        </div>
      </div>
    </header>

    <!-- Card -->
    <main class=" bg-white rounded-2xl shadow-lg p-6">
      <!-- Product -->
      <div class="grid md:grid-cols-2 gap-2 ">
        <section>
        <div class="bg-gray-50 rounded-xl flex justify-center p-4 mb-4">
          <img src="/images/groccery.jpg" alt="Фото товара" class="max-h-72 object-contain">
        </div>
       
      </section>

      <!-- Price Panel -->
      <aside class="flex flex-col gap-10 pt-10">
        <div class="flex justify-between items-right">
          <div class="bg-yellow-400 px-4 py-2 rounded-lg font-extrabold text-6xl text-gray-900 text-center w-full min-h-24" id="price"></div>
          
        </div>
        

        <!-- Barcode -->
        <div class="text-center">
          <svg viewBox="0 0 160 60" class="mx-auto h-32">
            <rect x="2" y="6" width="4" height="48" fill="#071c3c" />
            <rect x="10" y="6" width="2" height="48" fill="#071c3c" />
            <rect x="15" y="6" width="6" height="48" fill="#071c3c" />
            <rect x="26" y="6" width="3" height="48" fill="#071c3c" />
            <rect x="33" y="6" width="4" height="48" fill="#071c3c" />
            <rect x="42" y="6" width="2" height="48" fill="#071c3c" />
            <rect x="50" y="6" width="7" height="48" fill="#071c3c" />
            <rect x="60" y="6" width="3" height="48" fill="#071c3c" />
            <rect x="68" y="6" width="4" height="48" fill="#071c3c" />
            <rect x="78" y="6" width="2" height="48" fill="#071c3c" />
            <rect x="85" y="6" width="6" height="48" fill="#071c3c" />
            <rect x="98" y="6" width="3" height="48" fill="#071c3c" />
            <rect x="104" y="6" width="4" height="48" fill="#071c3c" />
            <rect x="116" y="6" width="2" height="48" fill="#071c3c" />
            <rect x="122" y="6" width="6" height="48" fill="#071c3c" />
            <rect x="140" y="6" width="4" height="48" fill="#071c3c" />
          </svg>
          <div class="font-mono text-gray-500 mt-1 text-3xl" id="barcode"></div>
        </div>
      </aside>
      </div>
      
      <div class="text-3xl font-bold text-gray-900" id="name"></div>
        <div class="text-sm text-gray-500" id="code"></div>
        <div class="text-sm text-gray-700 mt-2" id="description"></div>
      </div>  
      
    </main>
    
    
  </div>

  <script>
    let barcode = "";
    const tPath = window.location.pathname;
    const parts = tPath.split("/").filter(Boolean);
    const id = parts[1]; // UUID из маршрута

    console.log("ID из URL:", id);

    document.addEventListener("keypress", function (event) {
      if (event.key === "Enter") {
        if (barcode.length > 0) {
          console.log("Отсканированный штрихкод:", barcode);
          //barcode="46219893";
          // Запрос в API
          fetch("/api/price-check", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ id: id, barcode: barcode }),
          })
            .then((res) => res.json())
            .then((data) => {
              console.log(data)
              if(data.status=="ok"){
                document.getElementById('name').innerHTML=data.message.name;
                document.getElementById('price').innerHTML=data.message.price;
                document.getElementById('barcode').innerHTML=barcode;
                document.getElementById('code').innerHTML=data.message.id;
              }
            })
            .catch((err) => console.error("Ошибка запроса:", err));

          barcode = ""; // сбрасываем для следующего скана
        }
      } else {
        barcode += event.key;
      }
    });
  </script>
</body>
</html>
