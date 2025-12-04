<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Товары с пагинацией</title>
</head>
<body>

<h2>Каталог товаров</h2>

<form method="GET">
    <input type="text" name="search" placeholder="Поиск" value="<?= htmlspecialchars($search) ?>">
    <input type="number" name="minPrice" placeholder="Цена от" value="<?= htmlspecialchars($minPrice) ?>">
    <input type="number" name="maxPrice" placeholder="Цена до" value="<?= htmlspecialchars($maxPrice) ?>">

    <select name="sort">
        <option value="">Без сортировки</option>
        <option value="name_asc">Имя ↑</option>
        <option value="name_desc">Имя ↓</option>
        <option value="price_asc">Цена ↑</option>
        <option value="price_desc">Цена ↓</option>
    </select>

    <button type="submit">Фильтр</button>
</form>

<hr>

<?php foreach ($products as $p): ?>
    <div>
        <b><?= htmlspecialchars($p['name']) ?></b> — <?= $p['price'] ?> ₸
    </div>
<?php endforeach; ?>

<hr>

<div>
    <?php if ($page > 1): ?>
        <a href="?page=<?= $page-1 ?>&limit=<?= $limit ?>">« Предыдущая</a>
    <?php endif; ?>

    <span>Стр. <?= $page ?> / <?= $totalPages ?></span>

    <?php if ($page < $totalPages): ?>
        <a href="?page=<?= $page+1 ?>&limit=<?= $limit ?>">Следующая »</a>
    <?php endif; ?>
</div>

</body>
</html>
