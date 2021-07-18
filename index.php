<?php 
session_start();
if (!isset($_SESSION['bip'])) {
session_destroy();
header('location:login.php');
}
include_once('header.php')?>



<div class="index-area area">
    <div class="container">
        <div class="index">
            <h1>This is a student management app</h1>
            <h2>Regester Every data of every student in your school</h2>
        </div>
    </div>
</div>



<?php include_once('footer.php')?>