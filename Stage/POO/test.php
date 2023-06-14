<?php
    require('User.php');

    /*USER*/
    
    /*
    $user_test = new User(0,'','','','','','','','');
    
    $user = $user_test->ConnexionUser('tomallusse453@gmail.com','$argon2i$v=19$m=65536,t=4,p=1$MnY2YjRMYW5uZ1JKbzdCVA$1o0BQnp9K5JW9zhUOsd3tNA8kJ4RXZmD5azgAyPqlj0');
    $user_test = new User($user['Id_User'], $user['FirstName'], $user['Name_User'], $user['Date_Of_Birth'], $user['E_mail'], $user['Phone'], $user['Passwords'], $user['Roles'], $user['Picture_User']);
    echo '<br>';
    echo '<br>';
    echo $user_test->getID().'/'.$user_test->getFirstname().'/'.$user_test->getName().'/'.$user_test->getBirth().'/'.$user_test->getPhone().'/'.$user_test->getMail().'/'.$user_test->getPass().'/'.$user_test->getRole().'/'.$user_test->getPicture();
    echo '<br>';
    echo '<br>';
    echo $user_test->NomPrenom();
    echo '<br>';
    echo '<br>';
    $user_test->CreationUser('tomall@gmail.com','$argon2i$v=19$m=65536,t=4,p=1$MnY2YjRMYW5uZ1JKbzdCVA$1o0BQnp9K5JW9zhUOsd3tNA8kJ4RXZmD5azgAyPqlj0');
    $user_test->UpdateUser('Olympique','Lyonnais','2023-05-05','tomallusse@gmail.com', 'tomallusse@gmail.com','+33 6 73 15 55 29','images/account2.png');
    var_dump($user_test->MaxUserID());
    echo '<br>';
    echo '<br>';
    var_dump($user_test->DisplayUser(0,10));
    var_dump($user_test->DeleteUser(4))
    */

    /*POST*/
/*
    require('Post.php');
*/

    /*
    $post_test = new Post(0,'','','','',0);

    $post = $post_test->CreationPost(2,"Titre de l'article2","2Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis finibus sem. Sed auctor ipsum nisi, feugiat elementum magna accumsan id. Proin in sollicitudin nisi. Suspendisse urna sem, blandit ac molestie eu, iaculis ut urna. Aliquam erat volutpat. Etiam cursus nisl arcu. Sed vel tempus elit, nec finibus quam. Praesent non diam mollis, semper nisl non, convallis lorem. Etiam semper auctor mi, sed pharetra ligula tincidunt sit amet. Phasellus nunc odio, mollis non massa at, mattis volutpat quam. Suspendisse vitae sapien efficitur purus commodo luctus varius quis nunc. In ultrices tellus ex, pulvinar euismod eros cursus a. Donec posuere neque eu iaculis mattis. Nam at sapien faucibus, dictum nibh tristique, eleifend eros. Fusce eget malesuada tortor. Nunc est enim, lobortis vitae neque et, luctus mattis eros.

    Suspendisse tellus arcu, eleifend in semper vitae, elementum eget augue. Nulla tempus arcu in quam tincidunt, non interdum tellus feugiat. Donec commodo risus vitae enim vehicula hendrerit. Vestibulum vel enim ut sem scelerisque blandit. Vivamus dignissim maximus lorem nec dapibus. Sed hendrerit libero vitae sagittis dignissim. Sed vitae ultricies nisl.
    
    Cras ut tincidunt lorem. Proin placerat magna ac dolor imperdiet egestas. Fusce ultrices mi non lacus pellentesque feugiat. Nunc at dictum purus. Sed in magna scelerisque, elementum ipsum nec, posuere libero. Sed semper mollis ligula scelerisque commodo. Nullam venenatis ullamcorper ipsum, vel ullamcorper tellus dictum eu. Phasellus massa nunc, euismod eget justo eu, volutpat placerat tellus. Mauris feugiat lectus eu finibus consectetur. Aliquam at ultrices nunc. In eget purus ut dui imperdiet aliquam et et orci. Duis laoreet, metus congue pretium vulputate, lectus neque efficitur velit, nec consequat nisl est non risus. Suspendisse fringilla pulvinar sollicitudin. Nunc nec nisl eros. Nulla scelerisque justo ac tincidunt fermentum.
    
    Proin at iaculis leo. Donec eget diam non arcu porttitor egestas. Suspendisse consequat, velit nec cursus porttitor, dui lectus sagittis ligula, sit amet sodales mi arcu sit amet mi. Proin in nisl felis. Suspendisse mollis nec massa eu auctor. Nulla nulla ligula, pretium a auctor et, lacinia ac dui. Maecenas at egestas neque, et viverra tellus. Etiam et massa maximus, gravida lorem vel, tempus ex.
    
    Vestibulum porta porta dui in vulputate. Integer a rhoncus nulla. In venenatis est at sapien rhoncus, quis suscipit est volutpat. Phasellus sit amet leo accumsan, ullamcorper risus molestie, egestas nulla. Cras egestas, eros in finibus varius, ex nisl tincidunt eros, ut viverra ligula augue ac arcu. Integer vel turpis vel ante accumsan blandit eget eget justo. Nullam vestibulum erat elit, eu volutpat diam iaculis vel. Integer vulputate lorem ornare turpis luctus semper.
    
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis finibus sem. Sed auctor ipsum nisi, feugiat elementum magna accumsan id. Proin in sollicitudin nisi. Suspendisse urna sem, blandit ac molestie eu, iaculis ut urna. Aliquam erat volutpat. Etiam cursus nisl arcu. Sed vel tempus elit, nec finibus quam. Praesent non diam mollis, semper nisl non, convallis lorem. Etiam semper auctor mi, sed pharetra ligula tincidunt sit amet. Phasellus nunc odio, mollis non massa at, mattis volutpat quam. Suspendisse vitae sapien efficitur purus commodo luctus varius quis nunc. In ultrices tellus ex, pulvinar euismod eros cursus a. Donec posuere neque eu iaculis mattis. Nam at sapien faucibus, dictum nibh tristique, eleifend eros. Fusce eget malesuada tortor. Nunc est enim, lobortis vitae neque et, luctus mattis eros.
    
    Suspendisse tellus arcu, eleifend in semper vitae, elementum eget augue. Nulla tempus arcu in quam tincidunt, non interdum tellus feugiat. Donec commodo risus vitae enim vehicula hendrerit. Vestibulum vel enim ut sem scelerisque blandit. Vivamus dignissim maximus lorem nec dapibus. Sed hendrerit libero vitae sagittis dignissim. Sed vitae ultricies nisl.
    
    Cras ut tincidunt lorem. Proin placerat magna ac dolor imperdiet egestas. Fusce ultrices mi non lacus pellentesque feugiat. Nunc at dictum purus. Sed in magna scelerisque, elementum ipsum nec, posuere libero. Sed semper mollis ligula scelerisque commodo. Nullam venenatis ullamcorper ipsum, vel ullamcorper tellus dictum eu. Phasellus massa nunc, euismod eget justo eu, volutpat placerat tellus. Mauris feugiat lectus eu finibus consectetur. Aliquam at ultrices nunc. In eget purus ut dui imperdiet aliquam et et orci. Duis laoreet, metus congue pretium vulputate, lectus neque efficitur velit, nec consequat nisl est non risus. Suspendisse fringilla pulvinar sollicitudin. Nunc nec nisl eros. Nulla scelerisque justo ac tincidunt fermentum.
    
    Proin at iaculis leo. Donec eget diam non arcu porttitor egestas. Suspendisse consequat, velit nec cursus porttitor, dui lectus sagittis ligula, sit amet sodales mi arcu sit amet mi. Proin in nisl felis. Suspendisse mollis nec massa eu auctor. Nulla nulla ligula, pretium a auctor et, lacinia ac dui. Maecenas at egestas neque, et viverra tellus. Etiam et massa maximus, gravida lorem vel, tempus ex.
    
    Vestibulum porta porta dui in vulputate. Integer a rhoncus nulla. In venenatis est at sapien rhoncus, quis suscipit est volutpat. Phasellus sit amet leo accumsan, ullamcorper risus molestie, egestas nulla. Cras egestas, eros in finibus varius, ex nisl tincidunt eros, ut viverra ligula augue ac arcu. Integer vel turpis vel ante accumsan blandit eget eget justo. Nullam vestibulum erat elit, eu volutpat diam iaculis vel. Integer vulputate lorem ornare turpis luctus semper.","images/account2.png");
    $post = $post_test->AffichagePost(1);
    echo '<br>';
    echo '<br>';
    var_dump($post_test->MaxPostID());
    echo '<br>';
    echo '<br>';
    $post_test = new Post($post['Id_Post'], $post['Title'], $post['Picture'], $post['Contained'], $post['Created_at'], $post['Id_User']);
    echo '<br>';
    echo '<br>';
    echo $post_test->getID().'/'.$post_test->getTitle().'/'.$post_test->getPicture().'/'.$post_test->getContained().'/'.$post_test->getCreatedAt().'/'.$post_test->getUserID();
    echo '<br>';
    echo '<br>';
    var_dump($post_test->DisplayPost(0,2));
    echo '<br>';
    echo '<br>';
    var_dump($post_test->VerifTitle('test'));
    echo '<br>';
    echo '<br>';
    var_dump($post_test->VerifTitle("Titre de l'article"));
    echo '<br>';
    echo '<br>';
    $post = $post_test->AffichagePost(1);
    echo '<br>';
    echo '<br>';
    $post_test = new Post($post['Id_Post'],$post['Title'],$post['Picture'],$post['Contained'],$post['Created_at'],$post['Id_User']);
    echo '<br>';
    echo '<br>';
    var_dump($post_test->UpdatePost(2,"Titre de l'article2.0","Titre de l'article2.0","images/2account.png"));
    var_dump($post_test->DeletePost(3));
    */
    /*COMMENT*/

    require('Comment.php');

    $comment_test = new Comment(0,"","",0,0);

    $comment = $comment_test->InsertComment("Titre de l'article2",1,1);

    $comment_test = new Comment($comment['Id_Comment'],$comment['Contained_Comment'], $comment['Created_at'], $comment['Id_User'], $comment['Id_Post']);

    /*
    var_dump($comment_test->DisplayComment());
    */
    echo $comment_test->getId_Comment().'/'.$comment_test->getContained_Comment().'/'.$comment_test->getCreated_at().'/'.$comment_test->getId_User().'/'.$comment_test->getId_Post();

    var_dump($comment_test->UpdateComment("Update Comment"));

    echo $comment_test->getId_Comment().'/'.$comment_test->getContained_Comment().'/'.$comment_test->getCreated_at().'/'.$comment_test->getId_User().'/'.$comment_test->getId_Post();
    /*
    var_dump($comment_test->DeleteComment(1));
    */

    /*CATEGORIES*/

    require('Categories.php');

    $Categories_test = new Categories(0,"");
    /*
    var_dump($Categories_test->InsertCategories("Romans"));
    */
    $categories = $Categories_test->InsertCategories("Article");

    $Categories_test = new Categories($categories['Id_Categories'], $categories['Name_Categories']);
    /*
    var_dump($Categories_test->DisplayCategories());
    */
    echo $Categories_test->getID().'/'.$Categories_test->getName();

    var_dump($Categories_test->UpdateCategories(2,"Bande dessiné"));
    echo $Categories_test->getID().'/'.$Categories_test->getName();
    /*
    var_dump($Categories_test->DeleteCategories(2));
    */
?>