<?php
session_start();
if (!isset($_SESSION['bip'])) {
session_destroy();
header('location:login.php');
}
require_once('header.php');
$select = "SELECT * FROM sms";
$catch = $conn->query($select);
?>

<div class="table area">
    <div class="container">
        <h2 class="text-center mb-0">Data Information</h2>
        <div class="col-md-12">
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Serial NO</th>
                            <th>Student Name</th>
                            <th>Age</th>
                            <th>Father Name</th>
                            <th>Mother Name</th>
                            <th>Divition</th>
                            <th>District</th>
                            <th>City</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0;
                        while ($data = $catch->fetch_object()):
                        ?>
                        <?php $i++;?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $data->name?></td>
                            <td><?php echo $data->age?></td>
                            <td><?php echo $data->father?></td>
                            <td><?php echo $data->mother?></td>
                            <td><?php echo $data->division?></td>
                            <td><?php echo $data->district?></td>
                            <td><?php echo $data->city?></td>
                            <td><a onclick="return del();" href="delete.php?id=<?php echo $data->id?>"><i class="fas fa-trash"></i></a><a href="edit.php?id=<?php echo $data->id?>"><i class="fas fa-edit"></i></a></td>
                        </tr>
                        <?php endwhile;?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?php require_once('footer.php');?>