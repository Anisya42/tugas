<?php 
include_once("./Models/student.php");

$id = $_GET['id'];
$student = Student::show($id);

?>

<?php include('./layouts/top.php'); ?>
<?php include('./layouts/header.php'); ?>
<!-- content -->
<div class="flex bg-gray-300 rounded-xl p-3 m-3">
    <div class="basis-2/5">
        <p class="font-bold">nama</p>
        <p class="font-bold">nis</p>
    </div>
    <div class="basis-4/5">
        <p><?= $student['name'] ?></p>
        <p><?= $student['nis'] ?></p>
    </div>
</div>
    <div class="grid gap-2">
        <a href="index.php" class="bg-blue-800 hover:bg-blue-700 p-3 rounded-xl text-white m-3 text-center">kembali</a>
    </div>
<?php include('./layouts/footer.php'); ?>
<?php include('./layouts/bottom.php'); ?>