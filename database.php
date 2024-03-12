<?php 
    $koneksi = mysqli_connect("localhost","root","","temporalis");
        if($koneksi){
            echo 'berhasil koneksi';
        }else{
            echo 'koneksi gagal';
        }
    if(isset($_POST['simpandata'])){

        $query = mysqli_query($koneksi,"insert into review set
        nama = '$_POST[nama]';
        pelayanan = '$_POST[pelayanan]';
        komentar = '$_POST[komentar]';
        ");
        if($query){
            header('location:index.html');
        }else {
            echo 'gagal upload';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .table, .form-group, .card{
      width: 60%;
    }
    .container{
      margin-top:50px;
    }
    .form-group{
      width:60%;
    }
  </style>
</head>
<body>

<div class="container">
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th>No</th>
      <th scope="nama">Nama</th>
      <th scope="pelayanan">Pelayanan</th>
      <th scope="komentar">komentar</th>
    </tr>
  </thead>
      <?php
      $no=1;
        $ambildata = mysqli_query($koneksi,'select * from review') ;
        while($loop = mysqli_fetch_Array($ambildata)){
            echo "
            <tr>
              <td>$no</td>
              <td>$loop[nama]</td>
              <td>$loop[pelayanan]</td>
              <td>$loop[komentar]</td>
            </tr>
            ";
            $no++;
        }
      ?>
  </table>
  </div>
</body>
</html>