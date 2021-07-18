<?php
session_start();
if (!isset($_SESSION['bip'])) {
session_destroy();
header('location:login.php');
}
include_once('header.php');
if (isset($_POST['submit'])) {
    $s_name = $_POST['s_name'];
    $s_age = $_POST['s_age'];
    $s_father = $_POST['s_father'];
    $s_mother = $_POST['s_mother'];
    $s_division = $_POST['s_division'];
    $s_district = $_POST['s_district'];
    $s_city = $_POST['s_city'];
    if (empty($s_name)) {
        $error = 'Student Name is empty';
    }elseif (empty($s_age)) {
        $error = 'Age Name is empty';
    }elseif (empty($s_father)) {
        $error = 'Father Name is empty';
    }elseif (empty($s_mother)) {
        $error = 'Mother Name is empty';
    }elseif (empty($s_division)) {
        $error = 'Division is Not Selected';
    }elseif (empty($s_district)) {
        $error = 'District is empty';
    }elseif (empty($s_city)) {
        $error = 'City is empty';
    }else {
        $catch = "INSERT INTO sms(name,age,father,mother,division,district,city) VALUE('$s_name','$s_age','$s_father','$s_mother','$s_division','$s_district','$s_city')";
        $send = $conn->query($catch);
        if ($send) {
            $success = 'Information saved';
        }
    }
}
?>



<div class="entry-area area">
    <div class="container">
    <h2 class="text-center">Student data</h2>
        <div class="col-md-6 offset-md-3">
            <div class="entry pt-3">
                <form action="" method="post">

                    <input type="text" name="s_name" placeholder="Student Full Name">

                    <input type="text" name="s_age" placeholder="Student Age">

                    <input type="text" name="s_father" placeholder="Student's Father Name">

                    <input type="text" name="s_mother" placeholder="Student's Mother Name">

                    <select name="s_division">

                        <option value="Dhaka">Dhaka</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="Borishal">Borishal</option>
                        <option value="Chittagong">Chittagong</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Sylet">Sylet</option>
                        <option value="Rangpur">Rangpur</option>

                    </select>

                    <input type="text" name="s_district" placeholder="Student Dristict">

                    <input type="text" name="s_city" placeholder="Student City">

                    <button type="submit" name="submit">Submit</button>
                    <?php
                    if (isset($error)) {
                        echo '<div class="error"><p>'.$error.'</p></div>';
                    }else if (isset($success)) {
                        echo '<div class="success"><p>'.$success.'</p></div>';
                    }
                    
                    ?>
                </form>
            </div>
        </div>



    </div>
</div>


<?php include_once('footer.php')?>