<?php
session_start();
require_once __DIR__ . "/config.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    if (hash_equals(ADMIN_USERNAME, $username) && password_verify($password, ADMIN_PASSWORD_HASH)) {
        session_regenerate_id(true);
        $_SESSION["admin"] = true;
        $_SESSION["admin_username"] = ADMIN_USERNAME;
        header("Location: admin/index.php");
        exit;
    }

    $error = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
}
?>
<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>เข้าสู่ระบบแอดมิน</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<main>
<section class="panel auth">
<img src="assets/logo.svg" class="auth-logo">
<h2>เข้าสู่ระบบแอดมิน</h2>
<?php if ($error): ?><p><?=htmlspecialchars($error)?></p><?php endif; ?>
<form method="post" autocomplete="off">
<input name="username" placeholder="ชื่อผู้ใช้" required>
<input name="password" type="password" placeholder="รหัสผ่าน" required>
<button class="buy" type="submit">เข้าสู่ระบบ</button>
</form>
<p><a href="index.php">กลับหน้าร้าน</a></p>
</section>
</main>
</body>
</html>
