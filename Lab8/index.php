<?php
$dir = "files/";
if (!is_dir($dir)) {
    mkdir($dir, 0755, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['filename']) && !empty($_POST['content'])) {
        $filename = $dir . basename($_POST['filename']) . ".txt";
        if (file_exists($filename)) {
            echo "<p>Ошибка: файл с таким именем уже существует.</p>";
        } else {
            file_put_contents($filename, $_POST['content']);
            echo "<p>Файл успешно создан!</p>";
        }
    }
}

$files = scandir($dir);
foreach ($files as $file) {
    if ($file !== "." && $file !== "..") {
        $size = filesize($dir . $file);
        $mtime = date('Y-m-d H:i:s', filemtime($dir . $file));
        echo "<p>$file ($size байт, $mtime)
        <a href='view.php?name=$file'>Просмотр</a>
        <a href='delete.php?name=$file' onclick="return confirm('Удалить $file?')">Удалить</a></p>";
    }
}
?>
<form action='' method='post'>
  <input type='text' name='filename' placeholder='Имя файла' required><br><br>
  <textarea name='content' placeholder='Содержимое файла' required rows='6' cols='60'></textarea><br><br>
  <button type='submit'>Создать файл</button>
</form>
