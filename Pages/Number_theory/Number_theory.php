<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="/Pages/style1.css" <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>LCS</title>
  <style>
    a {
      text-decoration: none;
    }

    a:hover {
      background-color: black;
      text-decoration: none;
    }
  </style>
</head>

<body style="background-color:#b2b4ff">

  <div class="header" id="topheader">
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container text-uppercase p-2">
        <a class="navbar-brand font-weight-bold text-white logo" href="../../index.php"><mark style="background-color: blueviolet;">C</mark>odingHub</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../../index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Categories</a>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </div>
  <section class="lcs_php">
    <div class='container' style="color:whitesmoke;text-decoration:none;">
      <div class="row g-3">
        <?php
        $codeforces = array();
        $lightoj = array();
        $hackerearth = array();
        $uva = array();
        $connection = mysqli_connect('localhost', 'root', '', 'website');
        if ($connection) {

          $q = "Select Name,Link from Number_theory";
          $res = mysqli_query($connection, $q);

          if (mysqli_num_fields($res) > 0) {
            $all = mysqli_fetch_all($res);

            // first 10 are lightoj
            for ($i = 0; $i < 9; $i++) 
              $lightoj[$i] = $all[$i];
            

            // next 9 are codeforces
            for ($i = 10; $i < 19; $i++) 
              $codeforces[$i - 10] = $all[$i];
            

            //next 9 are Hackerrank
            for($i = 19; $i < 29; $i++)
              $hackerearth[$i - 20] = $all[$i];
            
              //next 9 are uva
            for($i = 29; $i < 39; $i++)
              $uva[$i - 30] = $all[$i];
            
          }
          
        ?>
          <div class="col-12 col-md-6">
            <div class="table-bordered p-3" style="border-radius: 8px;border-width:2px;border-color:white">
              <h1 class="h1" style="color:black;">LightOJ</h1>

              <ol >
              
                <?php
                foreach ($lightoj as $problem) {
                  echo "<li ><a href='$problem[1]' style='color:green;font-weight:500;font-size:19px;'>$problem[0]</a></li>";
                  
                }
                ?>
                
              </ol>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="table-bordered p-3" style="border-radius: 8px;border-width:2px;border-color:white;">
              <h1 class="h1" style="color:black">Codeforces</h1>

              <ul>
                
                <?php
                foreach ($codeforces as $problem) {
                echo "<li ><a href='$problem[1]' style='color:green;font-weight:500;font-size:19px;'>$problem[0]</a></li>";
                }
                ?>
              </ul>
              
            </div>
          </div>
        
          <div class="col-12 col-md-6 mt-3">
            <div class="table-bordered p-3" style="border-radius: 8px;border-width:2px;border-color:white">
              <h1 class="h1" style="color:black;">Hackerearth</h1>

              <ol >
              
                <?php
                foreach ($hackerearth as $problem) {
                  $str = substr($problem[1],8);
                  $link = 'https://www.hackerearth.com/practice/math/number-theory/basic-number-theory-1/practice-problems' . $str;
                  echo "<li ><a href='$link' style='color:green;font-weight:500;font-size:19px;'>$problem[0]</a></li>";
                  
                }
                ?>
                
              </ol>
            </div>
          </div>

          <div class="col-12 col-md-6 mt-3">
            <div class="table-bordered p-3" style="border-radius: 8px;border-width:2px;border-color:white;">
              <h1 class="h1" style="color:black">UVA</h1>

              <ul>
                
                <?php
                foreach ($uva as $problem) {
                echo "<li ><a href='$problem[1]' style='color:green;font-weight:500;font-size:19px;'>$problem[0]</a></li>";
                }
                ?>
              </ul>
              
            </div>
          </div>

  

        <?php

        } 
        else {
          echo "Connection Error!";
        }

        ?>
      </div>
    </div>
  </section>
</body>
</html>