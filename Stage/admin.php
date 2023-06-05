<?php
    session_start();

    $role = $_SESSION['user']['role'];
    if ( $role != 'ROLE_ADMIN') {
        header('Location: index.php');
    }
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
        require_once('layouts/nav-bar-admin.php');
    ?>   
    <main>   
    </main>
    <?php
        require_once('layouts/footer.php');
    ?>
</body>
<?php
    require_once('layouts/footer.php');
?>
<script src="js/javascript.js"></script>
</html>