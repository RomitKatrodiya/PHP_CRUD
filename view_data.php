<?php

    require'common.php';
    $obj = new Common;

    $res = $obj->viewData();
    
    if(isset($_GET["deleteid"])) {

        $res2 = $obj->deleteData($_GET["deleteid"]);

        if($res2)
        {
            header('location:view_data.php');
        }
        else{
          echo "Record not delete";
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
        </style>

    </head>

    <body>
        
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = mysqli_fetch_array($res)){
                ?>
                    <tr>
                        <td><?php echo $row["id"];?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["password"]; ?></td>
                        <td>
                            <a href="update_data.php?updateid=<?php echo $row["id"]; ?>"><button type="submit" name="update" class="btn btn-outline-primary">Update</button></a>
                            <a href="view_data.php?deleteid=<?php echo $row["id"]; ?>"><button type="submit" name="delete" class="btn btn-outline-danger">Delete</button></a>
                        </td>
                    </tr>                   
  
                <?php } ?>

            </tbody>
        </table>
        
        <a href="add_data.php"><button type="submit" name="addData" class="btn btn-outline-success">Add Data</button></a>

    </body>
</html>