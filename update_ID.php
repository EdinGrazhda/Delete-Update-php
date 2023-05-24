<?php

    $connect = mysqli_connect('localhost','root','','login');
    mysqli_select_db($connect,'login');
    if(isset($_POST['update'])){
        $fileId=$_POST['id'];
        $fileName1=$_POST['fileName'];
        $fileDescription1=$_POST['description'];
        $fileUpload1 = $_FILES['fileUpload'] ['name'];
        $fileUpload1_tmp=$_FILES['fileUpload']['tmp_name'];

        if(!move_uploaded_file($fileUpload1_tmp, "../PHP3/file/$fileUpload1")){
            echo"<script>alert('You can't upload this image!')</script>";
        }
        if($fileName1==''||$fileDescription1=''||$fileUpload1=''){
            echo"<script>alert('Ndonjera prej fushave eshte e zbrazt')</script>";
            echo"<script>window.open('viewFile.php','_self');</script>";
            exit();
        }
        else{
            $update_query="UPDATE upload SET
             fileName='$fileName1',
             fileUpload='$fileUpload1',
             fileDescription='$fileDescription1'
             WHERE
              id = '$fileId'";

              if(mysqli_query($connect, $update_query)){
                echo"<script>alert('File is updated!')</script>";
                echo"<script>window.open('viewFile.php','_self');</script>";
              }
        }
    }


?>