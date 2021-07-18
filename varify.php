<?php require_once('header.php');

if (isset($_POST['verify'])) {
    $vf = $_POST['code'];

    $sql = "SELECT * FROM user WHERE code = '$vf' ";
    $query = $conn->query($sql);

    if (mysqli_num_rows($query) !=0) {
        $data = mysqli_fetch_assoc($query);
        $id = $data['id'];
        $new_sql = "UPDATE user SET status = '1' WHERE id = '$id'";
        $new_query = $conn->query($new_sql);
        $success = 'Varification complete';
    }else {
        $error = 'Use a valid code';
    }
}




?>

<div class="varify area">
    <div class="container">
        <div class="col-md-4 offset-md-4">
            <div class="login pt-5">
            <div class="in pt-5">
                <form action="" method="post">
                    <input type="text" name="code" placeholder="Varification code">
                    <button type="submit" name="verify">Verify</button>
                    <?php
                    if (isset($error)) {
                        echo '<div class="error"><p>'.$error.'</p></div>';
                    }else if (isset($success)) {
                        echo '<div class="success"><p>'.$success.'</p></div>';
                    }
                    
                    ?>
                </form>
                </a>
            </div>
            </div>


        </div>
    </div>
</div>

<?php require_once('footer.php');?>