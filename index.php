<?php 
include_once('./Models/student.php');

$students = student::index();

if(isset($_POST['submit'])) {
    $response = Student::create([
        'name' => $_POST['name'],
        'nis' => $_POST['nis'],
    ]);
 
    setcookie('message',$response,time()+10);
    header("location: index.php");
}

if(isset($_POST['delete'])){
    $response = Student::delete($_POST['id']);
    setcookie('message',$response,time()+10);
    header("location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css?family=Nama+Font" rel="stylesheet">

</head>
<body>
    <div class="">
        <!-- header -->
        <div class="bg-yellow-800 p-3 text-center text-white" style="font-weight: bold;">DATA SISWA XI RPL</div>
        <!-- main -->
        <div class="flex">
            <!-- sidebar -->
            <div class="basis-1/4 p-2 bg-yellow-100">
                <div class="bg-gray-200 m-3 p-3 rounded-lg">
                <form action="" method="POST" >  <P style="font-weight: bold;">FORM INPUT DATA</P>
                
                    <!-- nama -->
                    <div class="mb-3 m-2">
                        <label for="name">Nama</label>
                        <input   class="rounded-lg text-center block w-full focus:outline-none focus:ring focus:ring-yellow-900" type="text" name="name" id="name" placeholder="ketik disini" >
                    </div>
                    <!-- nis -->
                    <div class="mb-3 m-2">
                        <label for="nis" >Nis</label>
                        <input  class="rounded-lg text-center block w-full focus:outline-none focus:ring focus:ring-yellow-900" type="number" name="nis" id="nis" placeholder="ketik disini">
                    </div>
                    <!-- button -->
                    <div class="grid gap-2">
                        <button type="submit" name="submit" class="bg-blue-500 rounded-lg hover:bg-blue-200 p-1 text-white">Submit</button>
                    </div>
                    
                </form>
                <style>
                    .font-custom {
                    font-family: 'Nama Font', sans-serif;
                    }
                </style>
                </div>      

                <!--alert-->
                <?php include('./layouts/alert.php');?>


            </div>
            <!-- content -->
            <div class="basis-3/4 p-2 bg-yellow-100">
                <div class="bg-gray-200 p-3 m-3 rounded-lg"> <p class="text-center" style="font-weight: bold;">DATA SISWA</p>
                    <div class="">
                        <table class="w-full">
                            <thead class="text-center border border-yellow-900 bg-gray-400 text-white">
                                <tr>
                                    <th class="px-6 py-3">No.</th>
                                    <th class="px-6 py-3">Nama</th>
                                    <th class="px-6 py-3">Nis</th>
                                    <th class="px-6 py-3">Confirm</th>
                                </tr>
                            </thead>

                            <tbody class="text-center border border-gray-200 ">
                                <?php foreach($students as $key => $student) : ?>
                                <tr class="border border-yellow-900">
                                    <td class="px-6 py-3"><?= $key + 1 ?></td>
                                    <td class="px-6 py-3"><?= $student['name'] ?></td>
                                    <td class="px-6 py-3"><?= $student['nis'] ?></td>
                                    <td>
                                        <!-- detail -->
                                   <a href="detail.php?id=<?=$student['id'] ?>" class="text-white hover:bg-blue-200 pt-2 pb-2 pl-3 pr-3 rounded-xl  bg-blue-400">Detail</a>
                                        <!-- edit -->
                                   <a href="edit.php?id=<?=$student['id'] ?>" class="text-white hover:bg-green-200 pt-2 pb-2 pl-3 pr-3 rounded-xl  bg-green-700">Edit</a>
                                   <!-- hapus -->
                                        <form action="" method="POST" class="inline">
                                            <input type="hidden" name="id" value="<?= $student['id'] ?>">
                                            <button class="bg-red-600 hover:bg-red-200 pt-2 pb-2 pl-3 pr-3 rounded-xl  text-white" name="delete" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
            <div class="bg-yellow-900 p-3 text-center text-white">
                 &copy; anis 
             </div> 
    </div>
</body>
</html>