<?php
if (isset($_COOKIE["language"])) {
    header('Location: welcome.php');
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["language"])) {
        $language = $_POST["language"];
        setcookie("language", $language, time() + (7 * 24 * 60 * 60), "/");
        header('Location: welcome.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <select name="language">
            <option value="en">English</option>
            <option value="es">Espanol</option>
            <option value="fr">Francais</option>
        </select>
        <input type="submit">
    </form>
</body>
</html>
