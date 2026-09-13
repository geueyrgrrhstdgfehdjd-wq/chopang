<?php
session_start();
require_once __DIR__ . "/../config.php";

if (empty($_SESSION["admin"])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_GET["logout"])) {
    $_SESSION = [];
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), "", time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    header("Location: ../login.php");
    exit;
}
?>
<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>หลังบ้าน - <?=htmlspecialchars(SITE_NAME)?></title>
<link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<main>
<section class="panel">
<h1>หลังบ้าน</h1>
<p>เข้าสู่ระบบในชื่อ: <?=htmlspecialchars($_SESSION["admin_username"] ?? ADMIN_USERNAME)?></p>
<div class="admin-grid">
<?php foreach (["ปรับแต่งเว็บไซต์","ตั้งค่าระบบ","ระบบเติมเงิน","จัดการสินค้า","จัดการหมวดหมู่","จัดการผู้ใช้","จัดการโค้ดคูปอง","API / Webhook"] as $x): ?>
<button type="button"><?=htmlspecialchars($x)?></button>
<?php endforeach; ?>
</div>
<p><a class="buy" href="?logout=1">ออกจากระบบ</a></p>
</section>
</main>
</body>
</html>
