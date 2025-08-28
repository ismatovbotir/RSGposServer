<!doctype html>
<html lang="ru">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Price Checker — Магазинный стиль</title>
<style>
  :root{
    --brand-1: #0b61a4;
    --accent: #ffcc00;
    --muted: #6b7280;
    --bg: #f6f7fb;
    --card-bg: #ffffff;
    --danger: #e03b3b;
    --radius: 12px;
    --shadow: 0 6px 20px rgba(15,23,42,0.08);
    font-family: Inter, "Segoe UI", Roboto, Arial, sans-serif;
  }
  html,body{height:100%;background:var(--bg);margin:0}
  .wrap{max-width:880px;margin:28px auto;padding:20px}
  header.store-header{display:flex;align-items:center;gap:16px;margin-bottom:18px}
  .logo{display:flex;align-items:center;gap:10px;background:#fff;border-radius:10px;padding:8px 12px;box-shadow:var(--shadow)}
  .logo svg{width:44px;height:44px}
  .store-name{font-weight:700;color:var(--brand-1);font-size:18px}
  .store-sub{font-size:12px;color:var(--muted)}
  .card{background:var(--card-bg);border-radius:var(--radius);box-shadow:var(--shadow);
    display:grid;grid-template-columns:1fr 320px;gap:18px;padding:18px;align-items:start}
  .photo{background:#fafbfd;border-radius:10px;padding:14px;display:flex;justify-content:center}
  .photo img{max-width:100%;max-height:280px;object-fit:contain}
  .title{font-size:20px;font-weight:700;color:#0f172a}
  .sku{font-size:13px;color:var(--muted)}
  .desc{font-size:14px;color:#334155;line-height:1.3;margin-top:4px}
  .price-panel{background:#fff;border-radius:10px;padding:16px;display:flex;flex-direction:column;gap:12px}
  .tag{display:inline-block;padding:10px 14px;border-radius:10px;background:var(--accent);
    font-weight:800;color:#08243a;font-size:18px}
  .price-old{font-size:14px;color:var(--muted);text-decoration:line-through}
  .badge-sale{background:linear-gradient(90deg,#ff7a59,#ff3b30);color:white;
    padding:4px 10px;border-radius:999px;font-weight:700;font-size:12px}
  .barcode{text-align:center;margin-top:10px}
  .barcode svg{max-width:100%;height:60px}
  .barcode .code{font-family:monospace;margin-top:6px;color:var(--muted)}
  @media (max-width:780px){.card{grid-template-columns:1fr}}
</style>
</head>
<body>
<div class="wrap">
  <header class="store-header">
    <div class="logo">
      <svg viewBox="0 0 24 24" fill="none"><rect x="1" y="3" width="18" height="13" rx="2" stroke="#0b61a4" stroke-width="1.6" fill="#fff"/><circle cx="8.5" cy="19" r="1.5" fill="#0b61a4"/><circle cx="16.5" cy="19" r="1.5" fill="#0b61a4"/></svg>
      <div>
        <div class="store-name">SuperMarket</div>
        <div class="store-sub">Сканер цен</div>
      </div>
    </div>
  </header>

  <main class="card">
    <section>
      <div class="photo">
        <img src="https://via.placeholder.com/400x280?text=Фото+товара" alt="Фото товара">
      </div>
      <div class="title">Кофе Arabica, молотый, 250 г</div>
      <div class="sku">Артикул: KA-250-AR-001</div>
      <div class="desc">Мягкий аромат, шоколадно-ореховые ноты. Отличное соотношение цена/качество.</div>
    </section>
    <aside class="price-panel">
      <div style="display:flex;justify-content:space-between;align-items:center">
        <div class="tag">₸ 1,990</div>
        <div class="badge-sale">-20%</div>
      </div>
      <div class="price-old">₸ 2,490</div>
      <div class="barcode">
<svg viewBox="0 0 160 60">
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
<div class="code">1234567890123</div>
</div>
</aside>
</main>
</div>

<script>
  var barcode=""
tPath=(window.location.pathname)
const parts = tPath.split("/").filter(Boolean);
id=parts[1];
console.log(id);
  //console.log(document.windowState )
document.addEventListener('keypress',function(event){
    if (event.keyCode==13){
        if (barcode.length>0){

            console.log(barcode)
            //this.location.assign('/'+barcode);
            //this.location.assign
        }
    }else{
        barcode+=event.key
        //console.log('DDDD')

    }
    

})

</script>

</body>
</html>
