<?php
require 'db.php';

// Обработка удаления (если передан id для удаления)
if (isset($_GET['delete_id'])) {
    $del_id = (int) $_GET['delete_id'];
    $del = $pdo->prepare('DELETE FROM students WHERE id = ?');
    $del->execute([$del_id]);
    header('Location: list.php');
    exit;
}

// Поиск по email (если передан)
$search_email = trim($_GET['search_email'] ?? '');

// Сортировка: по ФИО или по id
$sort = $_GET['sort'] ?? 'id';
$allowed_sorts = ['id', 'fullname'];
if (!in_array($sort, $allowed_sorts)) $sort = 'id';

if ($search_email !== '') {
    $stmt = $pdo->prepare("SELECT * FROM students WHERE email LIKE :email ORDER BY $sort ASC");
    $stmt->execute(['email' => "%$search_email%" ]);
} else {
    $stmt = $pdo->query("SELECT * FROM students ORDER BY $sort ASC");
}

$students = $stmt->fetchAll();
?>
<!doctype html>
<html lang="ru">
<head><meta charset="utf-8"><title>Список студентов</title></head>
<body>
  <h2>Список студентов</h2>

  <form method="get">
    <label>Поиск по email:</label>
    <input type="text" name="search_email" value="<?= htmlspecialchars($search_email) ?>">
    <label>Сортировка:</label>
    <select name="sort">
      <option value="id" <?= $sort === 'id' ? 'selected' : '' ?>>По ID</option>
      <option value="fullname" <?= $sort === 'fullname' ? 'selected' : '' ?>>По ФИО (A→Z)</option>
    </select>
    <button type="submit">Применить</button>
  </form>

  <p><a href="form.html">Добавить нового</a></p>

  <table border="1" cellpadding="5">
    <tr><th>ID</th><th>ФИО</th><th>Email</th><th>Группа</th><th>Дата добавления</th><th>Действия</th></tr>
    <?php foreach ($students as $row): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['fullname']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['group_name'] ?? '') ?></td>
        <td><?= $row['created_at'] ?? '' ?></td>
        <td>
          <a href="?delete_id=<?= $row['id'] ?>" onclick="return confirm('Удалить запись?')">Удалить</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
