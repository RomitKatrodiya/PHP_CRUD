<?php

    require'common.php';
    $obj = new Common;

    if($_GET["updateid"]) {

        $id =$_GET["updateid"];
        $data = $obj->fetchData($id);

        $row = mysqli_fetch_array($data);
    }

    if (isset($_POST["update"]))
    {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        
        if($name && $email && $password)
        {
            $res = $obj->updateData($id,$name,$email,$password);

            if($res)
            {
                header("location:view_data.php");
            }
        } else {
            $err = "Enter Details First...!";
        }
    }


?>


<html>
    <head>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

        <style >
            *{
                margin:5px;
            
            }
            table{
                padding-left:25px;
                margin-left:100px;
            }
            tr{
                padding-left:15px;
            }
      </style>

    </head>

        <body>
        <form method="POST" action="">

            <?php
                if(isset($err)) {
            ?>

                <div class="alert alert-danger">
                    <?php echo $err; ?>
                </div>

            <?php } ?>

            <div class="form-group">
                <label for="name">Name</label>
                <input value = "<?php echo $row['name']; ?>" type="text" class="form-control"  placeholder="Enter name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input value = "<?php echo $row['email']; ?>" type="text" class="form-control" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password</label>
                <input value = "<?php echo $row['password']; ?>" type="password" class="form-control" placeholder="Enter password" name="password">
            </div>
            
            <button type="submit" name="update" class="btn btn-outline-primary">Update</button>

            </form>
        </body>

</html>