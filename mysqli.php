<?php
const MYSQL_HOST = 'localhost'; //127.0.0.1
const MYSQL_USER = 'root';
const MYSQL_PASS  = '';
const MYSQL_DB = 'test123';
const MYSQL_ENCD = 'utf-8';
const MYSQL_PORT = 3306;
$conn = mysqli_connect(
    MYSQL_HOST,
    MYSQL_USER,
    MYSQL_PASS,
    MYSQL_DB,
    MYSQL_PORT
);
mysqli_query($conn, "SET NAMES '" . MYSQL_ENCD . "'");
$stmt = mysqli_query($conn, "
    SELECT 
        id, name
    FROM
        users
    ORDER BY id DESC
");
while($data = mysqli_fetch_all($stmt)){
    echo "<p><span>id {$data['id']}</span> <span>{$data['name']}</span></p>";
}
mysqli_query($conn, "
    INSERT INTO
      users
      (name)
      VALUES 
      ('Tolya'), ('Vasya')
");


mysqli_query($conn, "
    DELETE FROM
      users
     WHERE id=1

");

mysqli_query($conn, "
    UPDATE
      users
     SET
     id = id-1

");

mysqli_query($conn, "
    SELECT
        COUNT(*) AS coli4estvo
    FROM
        users
");
$data = mysqli_fetch_all($stmt);
echo "Количество: {$data['coli4estvo']}";

mysqli_close($conn);



?>
