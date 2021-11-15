<?php
//PHP Login
if (isset($_POST['submit'])) {
    session_start(); //memulai
    include 'koneksi.php'; //koneksi

    $user = mysqli_real_escape_string($koneksi, $_POST['user']); 
    $pass = mysqli_real_escape_string($koneksi, $_POST['pass']);

    $cek = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE username = '" . $user . "' AND password = '" . md5($pass) . "'");
    if (mysqli_num_rows($cek) > 0) {
        $d = mysqli_fetch_object($cek);
        $_SESSION['status_login'] = true;
        $_SESSION['a_global'] = $d;
        $_SESSION['id'] = $d->admin_id;
        echo '<script>window.location="index.php"</script>';
    } else {
        echo '<script>alert("Username atau Password yang Anda Masukkan Salah!")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>LibraryZen</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        body {
            overflow-x: hidden;
            background-color: #eff7f6;
        }

        h1 {
            color: #669bbc;
            font-weight: 800;
            font-family: 'Montserrat', sans-serif;
        }

        p {
            color: #4a4e69;
            padding-top: 1%;
            font-weight: bolder;
            font-family: 'Roboto', sans-serif;
        }

        form {
            border: 3px solid #f1f1f1;
            background-color: #84a98c;
            box-shadow: 1000px;
            margin-top: 1%;
            margin-bottom: 10%;
            margin-left: 10%;
            margin-right: 10%;

        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #1b4332;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            margin-left: auto;
            margin-right: auto;
            width: 780px;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container1 {
            margin-top: 1%;
            margin-bottom: 10%;
            margin-left: 30%;
            margin-right: 30%;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #283618;
            color: #e6d5e5;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        span.psw {
            float: right;
            padding-top: 0px;
        }

        @media screen and (width: 120px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container" style="margin-top: 7%;">
        <div class="row" data-aos="zoom-in-up">
            <div class="col-md-12 text-center">
                <h1>Welcome to LibraryZen</h1>
                <h1>Web Daftar Buku</h1>
            </div>
        </div>
    </div>
    <div class="row" data-aos="zoom-in-up">
        <div class="col-md-12 text-center">
            <p>Silahkan Login Untuk Dapat Menggunakan Web LibraryZen </p>
        </div>
    </div>
    <div class="row" data-aos="zoom-in-up">
    </div>
    <div>
        <!-- HTML Login -->
        <form action="" method="POST">
            <div class="imgcontainer">
                <img src="user.png" alt="Avatar" class="avatar">
            </div>
            <div class="container1">
                <form action="" method="POST">
                    <input type="text" name="user" placeholder="Username" class="input-control">
                    <input type="password" name="pass" placeholder="Password" class="input-control">
                    <input type="submit" name="submit" value="Login" class="btn">
                </form>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>