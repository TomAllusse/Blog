<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/styles.css">
    <!--Boostrap CSS
    <link href="bootstrap-5.2.2-dist/css/bootstrap.css" rel="stylesheet"> -->
    <title>Accueil</title>
</head>
<body>
    <?php
        $role = "ROLE_USER";
        if(!empty($_SESSION['user']['role'])){
            $role = $_SESSION['user']['role'];
        }
        if($role == "ROLE_ADMIN"){
            require_once('layouts/nav-bar.php');
        }else{
            require_once('layouts/nav-bar-admin.php');
        }
    ?>
    <main>
        <article class="texte_article">
            <h1>Titre de l'article</h1>
            <h3>Catégorie</h3>
            <img src="images/test.jpg" alt="image de l'article">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis finibus sem. Sed auctor ipsum nisi, feugiat elementum magna accumsan id. Proin in sollicitudin nisi. Suspendisse urna sem, blandit ac molestie eu, iaculis ut urna. Aliquam erat volutpat. Etiam cursus nisl arcu. Sed vel tempus elit, nec finibus quam. Praesent non diam mollis, semper nisl non, convallis lorem. Etiam semper auctor mi, sed pharetra ligula tincidunt sit amet. Phasellus nunc odio, mollis non massa at, mattis volutpat quam. Suspendisse vitae sapien efficitur purus commodo luctus varius quis nunc. In ultrices tellus ex, pulvinar euismod eros cursus a. Donec posuere neque eu iaculis mattis. Nam at sapien faucibus, dictum nibh tristique, eleifend eros. Fusce eget malesuada tortor. Nunc est enim, lobortis vitae neque et, luctus mattis eros.</p>
            <br>
            <p>Suspendisse tellus arcu, eleifend in semper vitae, elementum eget augue. Nulla tempus arcu in quam tincidunt, non interdum tellus feugiat. Donec commodo risus vitae enim vehicula hendrerit. Vestibulum vel enim ut sem scelerisque blandit. Vivamus dignissim maximus lorem nec dapibus. Sed hendrerit libero vitae sagittis dignissim. Sed vitae ultricies nisl.</p>
            <br>
            <p>Cras ut tincidunt lorem. Proin placerat magna ac dolor imperdiet egestas. Fusce ultrices mi non lacus pellentesque feugiat. Nunc at dictum purus. Sed in magna scelerisque, elementum ipsum nec, posuere libero. Sed semper mollis ligula scelerisque commodo. Nullam venenatis ullamcorper ipsum, vel ullamcorper tellus dictum eu. Phasellus massa nunc, euismod eget justo eu, volutpat placerat tellus. Mauris feugiat lectus eu finibus consectetur. Aliquam at ultrices nunc. In eget purus ut dui imperdiet aliquam et et orci. Duis laoreet, metus congue pretium vulputate, lectus neque efficitur velit, nec consequat nisl est non risus. Suspendisse fringilla pulvinar sollicitudin. Nunc nec nisl eros. Nulla scelerisque justo ac tincidunt fermentum.</p>
            <br>
            <p>Proin at iaculis leo. Donec eget diam non arcu porttitor egestas. Suspendisse consequat, velit nec cursus porttitor, dui lectus sagittis ligula, sit amet sodales mi arcu sit amet mi. Proin in nisl felis. Suspendisse mollis nec massa eu auctor. Nulla nulla ligula, pretium a auctor et, lacinia ac dui. Maecenas at egestas neque, et viverra tellus. Etiam et massa maximus, gravida lorem vel, tempus ex.</p>
            <br>
            <p>Vestibulum porta porta dui in vulputate. Integer a rhoncus nulla. In venenatis est at sapien rhoncus, quis suscipit est volutpat. Phasellus sit amet leo accumsan, ullamcorper risus molestie, egestas nulla. Cras egestas, eros in finibus varius, ex nisl tincidunt eros, ut viverra ligula augue ac arcu. Integer vel turpis vel ante accumsan blandit eget eget justo. Nullam vestibulum erat elit, eu volutpat diam iaculis vel. Integer vulputate lorem ornare turpis luctus semper.</p> 
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis finibus sem. Sed auctor ipsum nisi, feugiat elementum magna accumsan id. Proin in sollicitudin nisi. Suspendisse urna sem, blandit ac molestie eu, iaculis ut urna. Aliquam erat volutpat. Etiam cursus nisl arcu. Sed vel tempus elit, nec finibus quam. Praesent non diam mollis, semper nisl non, convallis lorem. Etiam semper auctor mi, sed pharetra ligula tincidunt sit amet. Phasellus nunc odio, mollis non massa at, mattis volutpat quam. Suspendisse vitae sapien efficitur purus commodo luctus varius quis nunc. In ultrices tellus ex, pulvinar euismod eros cursus a. Donec posuere neque eu iaculis mattis. Nam at sapien faucibus, dictum nibh tristique, eleifend eros. Fusce eget malesuada tortor. Nunc est enim, lobortis vitae neque et, luctus mattis eros.</p>
            <br>
            <p>Suspendisse tellus arcu, eleifend in semper vitae, elementum eget augue. Nulla tempus arcu in quam tincidunt, non interdum tellus feugiat. Donec commodo risus vitae enim vehicula hendrerit. Vestibulum vel enim ut sem scelerisque blandit. Vivamus dignissim maximus lorem nec dapibus. Sed hendrerit libero vitae sagittis dignissim. Sed vitae ultricies nisl.</p>
            <br>
            <p>Cras ut tincidunt lorem. Proin placerat magna ac dolor imperdiet egestas. Fusce ultrices mi non lacus pellentesque feugiat. Nunc at dictum purus. Sed in magna scelerisque, elementum ipsum nec, posuere libero. Sed semper mollis ligula scelerisque commodo. Nullam venenatis ullamcorper ipsum, vel ullamcorper tellus dictum eu. Phasellus massa nunc, euismod eget justo eu, volutpat placerat tellus. Mauris feugiat lectus eu finibus consectetur. Aliquam at ultrices nunc. In eget purus ut dui imperdiet aliquam et et orci. Duis laoreet, metus congue pretium vulputate, lectus neque efficitur velit, nec consequat nisl est non risus. Suspendisse fringilla pulvinar sollicitudin. Nunc nec nisl eros. Nulla scelerisque justo ac tincidunt fermentum.</p>
            <br>
            <p>Proin at iaculis leo. Donec eget diam non arcu porttitor egestas. Suspendisse consequat, velit nec cursus porttitor, dui lectus sagittis ligula, sit amet sodales mi arcu sit amet mi. Proin in nisl felis. Suspendisse mollis nec massa eu auctor. Nulla nulla ligula, pretium a auctor et, lacinia ac dui. Maecenas at egestas neque, et viverra tellus. Etiam et massa maximus, gravida lorem vel, tempus ex.</p>
            <br>
            <p>Vestibulum porta porta dui in vulputate. Integer a rhoncus nulla. In venenatis est at sapien rhoncus, quis suscipit est volutpat. Phasellus sit amet leo accumsan, ullamcorper risus molestie, egestas nulla. Cras egestas, eros in finibus varius, ex nisl tincidunt eros, ut viverra ligula augue ac arcu. Integer vel turpis vel ante accumsan blandit eget eget justo. Nullam vestibulum erat elit, eu volutpat diam iaculis vel. Integer vulputate lorem ornare turpis luctus semper.</p> 
        </article>
    </main>
    <?php
        require_once('layouts/footer.php');
    ?>
</body>
<script src="js/javascript.js"></script>
</html>