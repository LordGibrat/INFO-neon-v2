<?php
session_start();
if (empty($_SESSION['admin_logged_in'])) {
    header('Location: adminlogin.php');
    exit;
}
$conn = new mysqli('127.0.0.1', 'root', '', 'dbgiba');
$dbError = $conn->connect_error;
$result = $dbError ? false : $conn->query('SELECT Order_ID, Phonenumber, TextOnSign, Event, Color, Details FROM ordering ORDER BY Order_ID DESC');
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Orders — INFO</title><link rel="icon" href="favicon.svg" type="image/svg+xml"><link rel="stylesheet" href="style.css"></head>
<body class="admin-page"><header class="site-header page-shell"><a class="brand" href="MainPage.html" aria-label="INFO home">INFO<span class="brand-dot">.</span></a><nav class="site-nav" aria-label="Main navigation"><a href="MainPage.html">View site</a><a href="adminlogout.php">Log out</a></nav></header><main class="admin-shell"><p class="eyebrow">INFO / STUDIO DESK</p><h1>Incoming orders</h1>
  <?php if ($dbError || !$result): ?><p class="admin-empty" role="alert">Orders are unavailable right now. Check the database connection.</p>
  <?php elseif ($result->num_rows > 0): ?><div class="admin-table-wrap"><table><thead><tr><th>Order ID</th><th>Phone number</th><th>Neon wording</th><th>Use / occasion</th><th>Glow color</th><th>Details</th></tr></thead><tbody>
  <?php while ($row = $result->fetch_assoc()): ?><tr><td><?= htmlspecialchars($row['Order_ID'], ENT_QUOTES, 'UTF-8') ?></td><td><?= htmlspecialchars($row['Phonenumber'], ENT_QUOTES, 'UTF-8') ?></td><td><?= htmlspecialchars($row['TextOnSign'], ENT_QUOTES, 'UTF-8') ?></td><td><?= htmlspecialchars($row['Event'], ENT_QUOTES, 'UTF-8') ?></td><td><?= htmlspecialchars($row['Color'], ENT_QUOTES, 'UTF-8') ?></td><td><?= htmlspecialchars($row['Details'], ENT_QUOTES, 'UTF-8') ?></td></tr><?php endwhile; ?>
  </tbody></table></div><?php else: ?><p class="admin-empty">No orders yet. New requests will appear here.</p><?php endif; ?>
  <?php if (!$dbError) $conn->close(); ?>
  </main><footer class="site-footer page-shell"><a class="brand" href="MainPage.html">INFO<span class="brand-dot">.</span></a><span>Custom neon signs for every space.</span><small>© INFO 2026</small></footer></body></html>
