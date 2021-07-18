<?php 
require_once('header.php');
    $id = $_REQUEST['id'];
    $select = "SELECT * FROM sms WHERE id = '$id'";
    $bring = $conn->query($select);  
if (isset($_POST['update'])) {
    $u_name = $_POST['u_name'];
    $u_age = $_POST['u_age'];
    $u_father = $_POST['u_father'];
    $u_mother = $_POST['u_mother'];
    $u_division = $_POST['u_division'];
    $u_district = $_POST['u_district'];
    $u_city = $_POST['u_city'];

    $select = "UPDATE sms SET name='$u_name', age='$u_age', father='$u_father', mother='$u_mother', division='$u_division', district='$u_district', city='$u_city' WHERE id='$id' ";

    $bring = $conn->query($select);
    if ($bring) {
        header("location:view.php");
    }
}
?>







<div class="cer area">
    <div class="container">
        <h2 class="text-center">Edit Data</h2>
        <form action="" method="post">
        <div class="all_s">
            <?php while ($data = $bring->fetch_object()):?>
            <div class="single_form">
                <label for="student name">Student Name</label>
                <input type="text" name="u_name" value="<?php echo $data->name;?>">
            </div>
            <div class="single_form">
                <label for="student name">Student Age</label>
                <input type="text" name="u_age" value="<?php echo $data->age;?>">
            </div>
            <div class="single_form">
                <label for="student name">Father Name</label>
                <input type="text" name="u_father" value="<?php echo $data->father;?>">
            </div>
            <div class="single_form">
                <label for="student name">Mother Name</label>
                <input type="text" name="u_mother" value="<?php echo $data->mother;?>">
            </div>
            <div class="single_form">
                <label for="student name">Division</label>
                <input type="text" name="u_division" value="<?php echo $data->division;?>">
            </div>
            <div class="single_form">
                <label for="student name">District</label>
                <input type="text" name="u_district" value="<?php echo $data->district;?>">
            </div>
            <div class="single_form">
                <label for="student name">City</label>
                <input type="text" name="u_city" value="<?php echo $data->city;?>">
            </div>
            <?php endwhile;?>
            <div class="update">
            <input type="submit" name="update" value="Update">
            </div>
           
        </div>
        </form>
    </div>
</div>




<?php require_once('footer.php');?>