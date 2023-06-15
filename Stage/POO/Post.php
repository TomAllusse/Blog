<?php
    require_once 'BDD/connexionBDD.php';

    class Post{
        private int $post_id;
        private string $post_title;
        private string $post_picture;
        private string $post_contained;
        private string $post_created_at;
        private int $post_user_id;
        
        public function __construct(int $post_id,string $post_title,string $post_picture,string $post_contained,string $post_created_at,int $post_user_id){
            $this->post_id = $post_id;
            $this->post_title = $post_title;
            $this->post_picture = $post_picture;
            $this->post_contained = $post_contained;
            $this->post_created_at = $post_created_at;
            $this->post_user_id = $post_user_id;
        }
        
        /*GET*/

        public function getID(){
            return $this->post_id;
        }
        public function getTitle(){
            return $this->post_title;
        }
        public function getPicture(){
            return $this->post_picture;
        }
        public function getContained(){
            return $this->post_contained;
        }
        public function getCreatedAt(){
            return $this->post_created_at;
        }
        public function getUserID(){
            return $this->post_user_id;
        }

        /*SET*/

        public function setID(int $new_post_id){
            $this->post_id = $new_post_id;
        }
        public function setTitle(string $new_post_title){
            $this->post_title = $new_post_title;
        }
        public function setPicture(string $new_post_picture){
            $this->post_picture = $new_post_picture;
        }
        public function setContained(string $new_post_contained){
            $this->post_contained = $new_post_contained;
        }
        public function setCreatedAt(string $new_post_created_at){
            $this->post_created_at = $new_post_created_at;
        }
        public function setUserID(string $new_post_user_id){
            $this->post_user_id = $new_post_user_id;
        }

        public function CreationPost(int $post_user_id, string $post_title, string $post_contained, string $post_picture){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("INSERT INTO post (Title, Picture, Contained, Created_at, Id_User) VALUES (:title, :images, :contained, now(),:id_user)");
            $prep->bindValue(":id_user", $post_user_id);
            $prep->bindValue(":title", $post_title);
            $prep->bindValue(":contained", $post_contained);
            $prep->bindValue(":images", $post_picture);
            $prep->execute();
        }

        public function AffichagePost(int $post_id){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("SELECT * FROM `post` p INNER JOIN `categories` c INNER JOIN `to_have` t ON p.Id_Post=t.Id_Post AND c.Id_Categories=t.Id_Categories WHERE p.Id_Post = :id");
            $prep->bindValue(":id", $post_id);
            $prep->execute();
            return $prep->fetch();
        }

        public function MaxPostID(){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("SELECT MAX(Id_Post) FROM `post`");
            $prep->execute();
            return $prep->fetchColumn();
        }

        public function DisplayPost(int $min, int $max){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("SELECT * FROM `users` u INNER JOIN `post` p WHERE u.Id_User=p.Id_User AND p.Id_Post > $min AND p.Id_Post<= $max");
            $prep->execute();
            return $prep->fetchall();
        }

        public function DisplayPostGlobal(){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("SELECT * FROM `post`");
            $prep->execute();
            return $prep->fetchall();
        }

        public function UpdatePost(int $post_id, string $post_title, string $post_contained, string $post_picture){
            $bdd = connexionBDD();

            if($post_title != $this->post_title){
                $prep = $bdd->prepare("UPDATE `post` SET  `Title` = :title WHERE `Id_Post` = :id_post ");
                $prep->bindValue(":id_post", $post_id);
                $prep->bindValue(":title", $post_title);
                $this->post_title = $post_title;
                $prep->execute();
            }
            if($post_contained != $this->post_contained){
                $prep = $bdd->prepare("UPDATE `post` SET `Contained` = :contained WHERE `Id_Post` = :id_post ");
                $prep->bindValue(":id_post", $post_id);
                $prep->bindValue(":contained", $post_contained);
                $this->post_contained = $post_contained;
                $prep->execute();
            }
            if($post_picture != $this->post_picture){
                $prep = $bdd->prepare("UPDATE `post` SET `Picture` = :images WHERE `Id_Post` = :id_post ");
                $prep->bindValue(":id_post", $post_id);
                $prep->bindValue(":images", $post_picture);
                $this->post_picture = $post_picture;
                $prep->execute();
            }

            $prep = $bdd->prepare("UPDATE `post` SET `Created_at` = now() WHERE `Id_Post` = :id_post ");
            $prep->bindValue(":id_post", $post_id);
            $prep->execute();
        }

        public function VerifTitle(string $post_title){
            $bdd = connexionBDD();

            $prep = $bdd->prepare("SELECT * FROM `post` WHERE `Title`=:title");
            $prep->bindValue(":title", $post_title);
            $prep->execute();
            return $prep->fetch();
        }

        public function DeletePost($post_id){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("DELETE FROM `post` WHERE `Id_Post`=:id");
            $prep->bindValue(":id", $post_id);
            $prep->execute();
        }
    }
?>