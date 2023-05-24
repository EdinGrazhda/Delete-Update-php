<!DOCTYPE html>
<html>
    <head>
        <title> View Insert </title>
        <style>
            table,td,th{
                border:2px solid black;
                border-collapse: collapse;
            }    
        </style>
    </head>
    
    <body>
        <table>
            <tr>
                <td>Id File</td>
                <td>File Name</td>
                <td>File Upload</td>
                <td>Description</td>
            </tr>

<?php
    $con= mysqli_connect('localhost','root','','login');
    mysqli_select_db($con,'login');

    $select = "SELECT * FROM upload;";

    $query = mysqli_query($con , $select);

    while($row = mysqli_fetch_array($query)){
        $fileId = $row ['id'];
        $fileName = $row['fileName'];
        $fileUpload = $row ['fileUpload'];
        $description = $row['fileDescription'];

        ?>
        <tr>
            <td><?php echo $fileId;?></td>
            <td><?php echo $fileName;?></td>
            <td><img src="../file/<?php echo $fileUpload;?>"width="80" height="60"></td>
            <td><?php echo $description;?></td>
            <td><a href="delete.php?delete=<?php echo $fileId;?>" onclick="return confirm('A jeni i sugurt !')">Delete</a></td>
            <td><a href="Update.php?update=<?php echo $fileId;?>">Update</a></td>
        </tr>
    <?php } ?>

    </table>
        









        </body>
    </html>