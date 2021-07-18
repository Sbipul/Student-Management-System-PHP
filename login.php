<?php 
require_once('header.php');

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
    if (empty($user)) {
        $error = 'User name is empty.';
    }else if (empty($password)) {
        $error = 'User password is empty.';
    }else {
        $select = "SELECT * FROM user WHERE user = '$user'";
        $match = $conn->query($select);
        $data = mysqli_fetch_assoc($match);
        if (mysqli_num_rows($match) == 0) {
            $error = 'Incorrect User name';
        }elseif ($data['password']!=$password) {
            $error = 'Incorrect password';

        }else {
            session_start();
            $_SESSION['bip']='log in';
            header("location:index.php");
        }
    }
}
?>

<div class="login area">
    <div class="container">
        <div class="col-md-4 offset-md-4">
            <div class="login pt-5">
            <div class="in pt-5">
                <form action="" method="post">
                    <input type="text" name="user" placeholder="User Name">
                    <input type="password" name="password" placeholder="User Password">
                    <button type="submit" name="login">Log in</button>
                    <?php
                    if (isset($error)) {
                        echo '<div class="error"><p>'.$error.'</p></div>';
                    }else if (isset($success)) {
                        echo '<div class="success"><p>'.$success.'</p></div>';
                    }
                    
                    ?>
                </form>
                <a href="regi.php">Registration
                </a>
            </div>
            </div>


        </div>
    </div>
</div>

<?php require_once('footer.php');?>