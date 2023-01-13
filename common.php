<?php

    class Common {

        public $db;

        function __construct()
        {
            $con = mysqli_connect("localhost","root","","PHP CRUD");
            $this->db = $con;
        }

        public function insertData($name,$email,$password)
        {            
            $qu = mysqli_query($this->db,"INSERT INTO `users` (`name`,`email`,`password`) VALUES ('$name','$email','$password')");
            return $qu;
        }

        public function updateData($id,$name,$email,$password)
        {            
            $qu = mysqli_query($this->db,"UPDATE `users` SET `name`='$name',`email`='$email',`password`='$password' WHERE `id` = $id");
            return $qu;
        }

        public function viewData()
        {            
            $qu = mysqli_query($this->db,"SELECT * FROM `users`");
            return $qu;
        }

        public function fetchData($id)
        {            
            $qu = mysqli_query($this->db,"SELECT * FROM `users` WHERE `id` = $id");
            return $qu;
        }

        public function deleteData($id)
        {            
            $qu = mysqli_query($this->db,"DELETE FROM `users` WHERE `id`=$id");
            return $qu;
        }
        

    }

?>