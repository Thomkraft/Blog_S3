<?php
session_start();
require_once('pdo.php');

if (!(basename($_SERVER['PHP_SELF']) == "index.php")) {
    require ('redirection.php');
}


if (isset($_POST['log-out'])) {
    if (!$_SESSION["isAdmin"]) {
        $_SESSION["isConnected"] = false;
        header("Location: index.php");
        exit;
    } else {
        $_SESSION["isConnected"] = false;
        header("Location: ../src/index.php");
        exit;
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap"
          rel="stylesheet">

    <?php if (!(basename($_SERVER['PHP_SELF']) == "categorie.php")): ?>
    <link href="output.css" rel="stylesheet">
    <?php endif; ?>
    <link href="../src/output.css" rel="stylesheet">

</head>
<body class="font-ubuntu">

<header class="px-5 py-7 shadow-md bg-gray-400">

    <?php if (!(basename($_SERVER['PHP_SELF']) == "categorie.php")): ?>
    <h1 class="text-2xl font-bold"><a href="home.php">Blog.kpf</a></h1>
    <?php endif; ?>

    <?php if ((basename($_SERVER['PHP_SELF']) == "categorie.php")): ?>
    <h1 class="text-2xl font-bold"><a href="../src/home.php">Blog.kpf</a></h1>
    <?php endif; ?>

    <form method="post">

        <input type="hidden" name="log-out"/>
        <input type="submit" value="Deconnexion">

    </form>
</header>

</body>
</html>
