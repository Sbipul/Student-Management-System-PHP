<?php
require_once('header.php');
if (isset($_POST['regi'])) {
   $f_name = $_POST['f_name'];
   $u_name = $_POST['u_name'];
   $u_pass = $_POST['u_pass'];

   $img_name = $_FILES['img']['name'];
   $img_size = $_FILES['img']['size'];
   $img_tmp = $_FILES['img']['tmp_name'];

   $ex = explode('.',$img_name);
   $final_ex = end($ex);

   $old_sql = "SELECT * FROM user WHERE user = '$u_name' ";
   $old_query = $conn->query($old_sql);

   if (mysqli_num_rows($old_query) != 0) {
       $error = 'This name is already exists';
   } else {
       $id = uniqid();
       $final_name = 'img'.$id.'.'.$final_ex;

       move_uploaded_file($img_tmp,'img/'.$final_name);
        $vf = rand(1,4);
        $vf .= rand(1,4);
        $vf .= rand(1,4);
        $vf .= rand(1,4);

        if (empty($f_name)) {
            $error = 'Full name is empty';
        }elseif (empty($u_name)) {
            $error = 'User name is empty';
        }elseif (empty($u_pass)) {
            $error = 'Password is empty';
        } else {
            $new_sql = "INSERT INTO user(full_name,user,password,img,code,status) VALUES('$f_name','$u_name','$u_pass','$final_name','$vf','0')";
            $new_query = $conn->query($new_sql);
            header("location:varify.php");
            session_start();
            $_SESSION['bip'] = "Login";
        }
        
   }
   
}
?>


<div class="regi-area area">
    <div class="container">
    <h2 class="text-center">Create New User Account</h2>
        <div class="col-md-6 offset-md-3">
            <div class="entry pt-3">
                <form action="" method="post" enctype = "multipart/form-data">

                    <input type="text" name="f_name" placeholder="Full Name">

                    <input type="text" name="u_name" placeholder="User name">

                    <input type="password" name="u_pass" placeholder="User Password">

                    <input type="file" name="img">

                    <button type="submit" name="regi">Registration</button>
                    <?php
                    if (isset($error)) {
                        echo '<div class="error"><p>'.$error.'</p></div>';
                    }else if (isset($success)) {
                        echo '<div class="success"><p>'.$success.'</p></div>';
                    }
                    
                    ?>
                </form>
                <a href="login.php">Log in</a>
            </div>
        </div>



    </div>
</div>



<?php
require_once('footer.php');
?>