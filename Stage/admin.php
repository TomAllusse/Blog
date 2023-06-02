<?php
    require_once('session/session.php');
    if ($_SESSION['Role'] == 'ROLE_ADMIN') {
        header('Location: admin.php');
    }
    else
    {
        header('Location: index.php');
    }
    exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/admin.css">
    <title>Accueil</title>
</head>
<body>
    <?php
        require_once('layouts/nav-bar.php');
    ?>   
    <main>   
    </main>
    <?php
        require_once('layouts/footer.php');
    ?>
</body>
<script src="js/javascript.js"></script>
</html>