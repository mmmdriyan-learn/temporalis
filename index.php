<!-- script PHP -->
<?php 
    $koneksi = mysqli_connect("localhost","root","","temporalis");
        // test koneksi database
        if($koneksi){
            echo 'berhasil koneksi ';
        }else{
            echo 'gagal';
        }
    if(isset($_POST['simpandata'])){
        $nama = $_POST['nama'];
        $pelayanan = $_POST['pelayanan'];
        $komentar = $_POST['komentar'];

        $query = mysqli_query($koneksi, "insert into review (nama,pelayanan,komentar) values('$nama','$pelayanan','$komentar')");
        if($query){
            header('location:index.php');
        }else {
            echo 'gagal upload';
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width= device-width, initial-scale= 1">
        <title>Temporalis Company</title>
        <link rel="stylesheet" type="text/CSS" href="CSS/style.css">
        <link rel="stylesheet" type="text/CSS" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            h2{
                margin-top: 30px;
            }
            h4 {
                font-size: 16px;
                font-weight: bold;
            }
            .btn{
                color: white;
                background-color:#9d4ba5;
            }
            .btn:hover{
                background-color:#5d1796;
                font-weight: bold;
            }
            .table, .form-group{
            width: 40%;
            }
            .thead{
                background: linear-gradient(to bottom, #9d4ba5, #5d1796);
            }
            .container .kedua, .container .ketiga{
            margin-top:50px;
            }
            .container .kedua{
                margin: 20px;
            }
            .output {
                width:80%;
            }
            a{
                color:white;
            }
            header ul li a{
                color:black;
            }
            header ul li a:hover {
            background: linear-gradient(to bottom, #9d4ba5, #5d1796);
            color: white;
            text-decoration: none;
            }
            .active {
            background: linear-gradient(to bottom, #9d4ba5, #5d1796);
            color: white;
            text-decoration: none;
            }
    
        </style>
    </head>
<body>
    <div class="fixed">

    <!--header-->
    <div class="medsos">
        <div class="container">
            <ul>
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="https://www.instagram.com/_temporalis/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
            </ul>
        </div>
    </div>
    <header>
        <div class="container">
        <h1 style="font-family:montserrat">TEMPORALIS</h1>
        <ul>
            <li class="active"><a href="index.php">HOME</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="service.php">SERVICE</a></li>
            <li><a href="contact.php">CONTACT</a></li>
            <li><a href="Portfolio.php">PORTFOLIO</a></li>
        </ul>
        </div>
    </header>
</div>

<!--banner-->
<section class="banner">
    <h2>WELCOME TO TEMPORALIS COMPANY</h2>
</section>

<!--about-->
<section class="about">
    <div class="container">
        <h3>ABOUT</h3>
        <p>Temporalis Company merupakan perusahaan yang berdiri sejak 2021 saat tugas mata kuliah <strong>Pemrograman Web</strong> diberikan. Temporalis Company bergerak dibidang jasa web development, android development, logo design, dan dbms. </p>
    </div>
</section>

<!--service-->
<section class="service">
    <div class="container">
        <h3>SERVICE</h3>
        <div class="box">
            <div class="col-4">
                <div class="icon"><i class="fas fa-database"></i></div>
                    <h4>DBMS</h4>
            </div>
            <div class="col-4 small">
                <div class="icon"><i class="fas fa-globe"></i></div>
                    <h4>WEB DEVELOPMENT</h4>
            </div>
            <div class="col-4">
                <div class="icon"><i class="fas fa-pen-nib"></i></div>
                    <h4>LOGO DESIGN</h4>
            </div>
            <div class="col-4">
                <div class="icon"><i class="fab fa-android"></i></div>
                    <h4>ANDROID DEVELOPMENT</h4>
            </div>
        </div>
    </div>
</section>

<!-- review -->
<div class="container kedua">
    <h2>Beri Ulasan</h2>
    <form method="POST">
      <div class="form-group">
        <label for="namaa">Nama   :</label>
        <input type="text" class="form-control" id="nama" placeholder="Masukan nama anda" name="nama">
      </div>
      <div class="form-group">
        <label for="pelayanan">Pelayanan :</label>
        <select id="pelayanan" class="form-select" name="pelayanan">
            <option value="DBMS">DBMS</option>
            <option value="Web Development">Web Development</option>
            <option value="Logo Design">Logo Design</option>
            <option value="Android Development">Android Development</option>
        </select>
      </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Ulasan</label>
            <textarea class="form-control" id="komentar" name= "komentar" rows="3"></textarea>
        </div>
      <button type="submit" name="simpandata" class="btn">Submit</button>
    </form>
<div class="container ketiga">
<table class="table table-bordered output">
  <thead class="thead text-light">
    <tr>
      <th scope="nama" class="text-center">Nama</th>
      <th scope="pelayanan" class="text-center">Pelayanan</th>
      <th scope="komentar" class="text-center">komentar</th>
    </tr>
  </thead>
      <?php
        $ambildata = mysqli_query($koneksi,'select * from review order by id_review desc limit 5');
        while($loop = mysqli_fetch_Array($ambildata)){
            echo "
            <tr>
              <td>$loop[nama]</td>
              <td>$loop[pelayanan]</td>
              <td>$loop[komentar]</td>
            </tr>
            "
            ;
        }
      ?>
  </table>
  <br>
  <br>
  <br>
  <br>

<!-- footer -->
<footer>
    <div class ="container">
        <small>Copyright &copy; 2021 - Temporalis Company. All rights Reserved. </small>
    </div>
</footer>

<!-- <script type= "text/javascript">
$(document).ready(function() {
    $(".bg-loader").hide();
})
</script> -->

</body>
</html>

