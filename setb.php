<html>
    <head>
        <title>sample css</title>
        
    </head>
    <body>
        select file:
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="name">
            <input type="file" name="file" id="file" value="aaa">
            <input type="submit" name="upload" id="submit" value="upload file">
        </form>

        <?php 

        include "conn.php";


        if(isset($_POST['upload'])){
            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_type = $_FILES['file']['type'];
            $folder = "pic/";
            $target_path = $folder.$_FILES['file']['name'];

            
        $name=$_POST['name'];

            if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)){
                echo $file_name ." has been successfully uploaded<br>";
                echo "file name: $file_name<br>";
                echo "size: $file_size<br>";
                echo "type: $file_type";

                $sql = "update login set img='pic/$file_name', name='$name' where id='1'";
                $result = $conn->query($sql);
                if($result===true)
                    echo"success";
                else
                    echo"error: " .$conn->error;
            }
            else{
                echo "upload error";
            }
        }

?>
    </body>
</html>