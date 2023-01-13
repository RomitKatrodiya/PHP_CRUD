<?php

    require'common.php';
    $obj = new Common;

    if (isset($_POST["submit"]))
    {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        
        if($name && $email && $password)
        {
            $res = $obj->insertData($name,$email,$password);

            if($res)
            {
            $msg = "Record successfully insert...";
            $err = null;
            }
        } else {
            $msg = null;
            $err = "Enter Details First...!";
        }
    }

    if(isset($_POST["view_data"]))
    {
        header("location:view_data.php");
    }
?>


<html>
    <head>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

        <style >
            *{
                margin:5px;
            }
      </style>

    </head>

        <body>
        <form method="POST" action="">

            <?php
                if(isset($msg)) {
            ?>

                <div class="alert alert-success">
                    <?php echo $msg; ?>
                </div>

            <?php } ?>

            <?php
                if(isset($err)) {
            ?>

                <div class="alert alert-danger">
                    <?php echo $err; ?>
                </div>

            <?php } ?>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control"  placeholder="Enter name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" class="form-control" placeholder="Enter password" name="password">
            </div>
            
            <button type="submit" name="submit" class="btn btn-outline-primary">Submit</button>

            <button type="view" name="view_data" class="btn btn-outline-info ">View Records</button>

            </form>
        </body>

</html>