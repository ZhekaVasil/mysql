<?php
//include "config.php"
const MYSQL_HOST = 'localhost'; //127.0.0.1
const MYSQL_USER = 'root';
const MYSQL_PASS = 'jshdfkjs';
const MYSQL_DB = 'test123';
const MYSQL_ENCD = 'utf8'; //encoding
const MYSQL_PORT = 3306;
const DB_DRIVER = 'mysql';
$conn = new PDO(
    DB_DRIVER . ":dbname=" . MYSQL_DB . ";host=" . MYSQL_HOST,
    MYSQL_USER,
    MYSQL_PASS
);
$stmt = $conn->query("SELECT id, name FROM users");
echo "<p>Количество записей: {$stmt->rowCount()}</p>";
while ($data = $stmt->fetch()) {
    echo "<p><span>ID {$data['id']}</span> <span>{$data['name']}</span></p>";
}
$array = ['Вася', 'Катя'];
$sql_text = '';
$i = 0;
foreach ($array as $name) {
    if ($i > 0) {
        $sql_text .= ", ";
    }
    $sql_text .= "('{$name}')";
    $i++;
}
$conn->query("INSERT INTO users (name) VALUES {$sql_text}");
echo "Номер последней записи {$conn->lastInsertId()}";
//1;DELETE FROM users;
$id = $_POST['id'];
$stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':name', $name);
 $stmt->execute();
 
 
//$stmt->execute([':id' => $id, ':name' => $name]);
unset($conn);
