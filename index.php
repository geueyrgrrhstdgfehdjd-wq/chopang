<?php
session_start(); require_once "config.php";
$products=$pdo?$pdo->query("SELECT * FROM products ORDER BY id DESC")->fetchAll():[];
?>
<!doctype html><html lang="th"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title><?=htmlspecialchars(SITE_NAME)?></title><link rel="stylesheet" href="assets/style.css"><script src="https://unpkg.com/lucide@latest"></script></head><body>
<div id="loader"><div class="loader-logo"><div class="ring"></div><img src="assets/logo.svg"></div><span>กำลังโหลดข้อมูล</span></div>
<header class="top"><a class="brand" href="index.php"><img src="assets/logo.svg"></a><div class="actions"><button aria-label="Discord"><i data-lucide="message-circle"></i></button><button aria-label="บัญชี"><i data-lucide="user-round"></i></button><button aria-label="เมนู" onclick="toggleMenu()"><i data-lucide="menu"></i></button></div></header>
<nav id="menu"><a href="#home">หน้าแรก</a><a href="#products">สินค้า</a><a href="#topup">เติมเงิน</a><a href="#history">ประวัติ</a></nav>
<main><section id="home" class="hero"><div><p>WELCOME TO <?=htmlspecialchars(SITE_NAME)?></p><h1>ระบบร้านค้า<br><span>3D • NEON • MODERN</span></h1><p>เร็ว ปลอดภัย และใช้งานง่ายบนทุกอุปกรณ์</p></div></section>
<section id="products" style="margin-top:30px"><h2>สินค้า</h2><div class="grid">
<?php foreach($products as $p): ?><article class="card"><div class="pic"><img src="<?=htmlspecialchars($p["image"] ?: "assets/product.svg")?>" alt=""></div><div class="info"><h3><?=htmlspecialchars($p["name"])?></h3><strong><?=number_format($p["price"],2)?> บาท</strong><small><?=htmlspecialchars($p["status"] ?: "พร้อมขาย")?></small><a class="buy" href="confirm.php?id=<?=$p["id"]?>">สั่งซื้อ</a></div></article><?php endforeach; ?>
<?php if(!$products): ?><article class="card"><div class="pic"><img src="assets/product.svg" alt=""></div><div class="info"><h3>สินค้าเริ่มต้น</h3><strong>0.00 บาท</strong><small>ติดต่อแอดมิน</small><a class="buy" href="login.php">เข้าสู่ระบบเพื่อสั่งซื้อ</a></div></article><?php endif; ?>
</div></section>
<section id="topup" class="panel" style="margin-top:30px"><h2>เติมเงิน</h2><button onclick="alert('กรุณาเข้าสู่ระบบก่อนเติมเงิน')"><i data-lucide="gift"></i> ซองอั่งเปาวอเล็ท</button><button onclick="alert('กรุณาเข้าสู่ระบบก่อนใช้คูปอง')"><i data-lucide="ticket"></i> โค้ดคูปอง</button></section>
<section id="history" class="panel"><h2>ประวัติ</h2><p>กรุณาเข้าสู่ระบบเพื่อดูประวัติการสั่งซื้อ</p></section></main>
<script>lucide.createIcons();window.addEventListener("load",()=>setTimeout(()=>document.getElementById("loader").classList.add("hide"),700));function toggleMenu(){document.getElementById("menu").classList.toggle("show")}</script></body></html>