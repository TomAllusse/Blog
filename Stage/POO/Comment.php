<?php
    class Comment{
        private int $Id_Comment;
        private string $Contained_Comment;
        private string $Created_at;
        private int $Id_User;
        private int $Id_Post;

        public function __construct(int $Id_Comment, string $Contained_Comment, string $Created_at, int $Id_User, int $Id_Post){
            $this->Id_Comment = $Id_Comment;
            $this->Contained_Comment = $Contained_Comment;
            $this->Created_at = $Created_at;
            $this->Id_User = $Id_User;
            $this->Id_Post = $Id_Post;
        }

        /*GET*/

        public function getId_Comment() {
            return $this->Id_Comment;
        }

        public function getContained_Comment() {
            return $this->Contained_Comment;
        }

        public function getCreated_at() {
            return $this->Created_at;
        }
    
        public function getId_User() {
            return $this->Id_User;
        }
    
        public function getId_Post() {
            return $this->Id_Post;
        }

        /*SET*/            
        
        public function setId_Comment(int $Id_Comment) {
            $this->Id_Comment = $Id_Comment;
        }

        public function setContained_Comment(string $Contained_Comment) {
            $this->Contained_Comment = $Contained_Comment;
        }

        public function setCreated_at(string $Created_at) {
            $this->Created_at = $Created_at;
        }

        public function setId_User(int $Id_User) {
            $this->Id_User = $Id_User;
        }

        public function setId_Post(int $Id_Post) {
            $this->Id_Post = $Id_Post;
        }
        
        public function DisplayComment(){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("SELECT * FROM `comment`");
            $prep->execute();
            return $prep->fetchall();
        }

        public function InsertComment(string $Contained_Comment, int $Id_User, int $Id_Post){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("INSERT INTO `comment` (Contained_Comment, Created_at, Id_User, Id_Post) VALUES (:contained_comment, now(), :id_user, :id_post)");
            $prep->bindValue(":contained_comment", $Contained_Comment);
            $prep->bindValue(":id_user", $Id_User);
            $prep->bindValue(":id_post", $Id_Post);
            $prep->execute();

            $prep2 = $bdd->prepare("SELECT * FROM `comment` WHERE Contained_Comment=:contained_comment AND Id_User=:id_user AND Id_Post=:id_post");
            $prep2->bindValue(":contained_comment", $Contained_Comment);
            $prep2->bindValue(":id_user", $Id_User);
            $prep2->bindValue(":id_post", $Id_Post);
            $prep2->execute();
            return $prep2->fetch();
        }

        public function UpdateComment(string $Contained_Comment){
            $bdd = connexionBDD();
            
            if($Contained_Comment != $this->Contained_Comment){
                $prep = $bdd->prepare("UPDATE `comment` SET  `Contained_Comment` = :contained_comment WHERE `Id_Comment` = :id_comment;");
                $prep->bindValue(":id_comment", $this->Id_Comment);
                $prep->bindValue(":contained_comment", $Contained_Comment);
                $this->Contained_Comment = $Contained_Comment;
                $prep->execute();
            }
            $prep = $bdd->prepare("UPDATE `comment` SET  `Created_at` = now() WHERE `Id_Comment` = :id_comment");
            $prep->bindValue(":id_comment", $this->Id_Comment);
            $prep->execute();
        }

        public function DeleteComment($Id_Comment){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("DELETE FROM `comment` WHERE `Id_Comment`=:id");
            $prep->bindValue(":id", $Id_Comment);
            $prep->execute();
        }
    }
?>