<?php 
include_once("./models/student.php");

$student = student::show($_GET['id']);

if(isset($_POST['submit'])){
    $response = student::update([
        'id'=> $_POST['id'],
        'name' => $_POST['name'],
        'nis'=>$_POST['nis']
    ]);
    

   setcookie('message', $response, time() + 10 );
   header("Location: index.php");
}

?>

<?php include('./layouts/top.php');?>
<?php include('./layouts/header.php');?>

<!-- content -->
           <div class="bg-grey-200 rounded-xl p-4">
                <h1 class="text-3xl mb-2">Form Input Data</h1>
                <form action="" method="post">
                    <div class="mb-3 bg-gray-500 rounded-lg p-4 m-3">
                        <label for="nama" class="text-white">Nama</label>
                        <input value="<?= $student['name']?>" type="text" class="rounded-lg p-3 block w-full" name="name" id="nama" placeholder="Masukan Nama Anda">
                        <label for="nis" class="text-white">NIS</label>
                        <input value="<?= $student['nis']?>" class="rounded-lg p-3 block w-full" type="number" name="nis" id="nis" placeholder="Masukan NIS Anda">
                        <input type="hidden" name="id" value="<?= $student['id']?>">
                        <div class="grid gap-2">
                           <button name="submit" class="bg-blue-900 hover:bg-blue-700 p-3 m-4 rounded-lg text-white" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
<?php include('./layouts/footer.php');?>
<?php include('./layouts/bottom.php');?>