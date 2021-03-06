<?php
//PHP Cari
include('koneksi.php');
if (isset($_POST['search'])) {
    $cari = $_POST['cari'];

    $query = ("SELECT * FROM table_buku WHERE judul LIKE '%$cari%'");
    $result = mysqli_query($koneksi, $query);
} else {
    $query = "SELECT * FROM table_buku ORDER BY id_buku ASC";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        body {
            overflow-x: hidden;
            background-color: #eee4e1;
            font-family: 'Nunito Sans', sans-serif;
        }

        h1 {
            color: #4a4e69;
            font-weight: 800;
        }

        p {
            color: #4a4e69;
            padding-top: 3%;
        }

        .btn-info {
            color: white;
            background-color: #3d5a80;
            border: none;
        }

        .btn-info:hover {
            color: black;
            background-color: #cfd2cd;
        }

        .btn-primary {
            color: white;
            background-color: #d9ae94;
            border: none;
        }

        .btn-primary:hover {
            color: black;
            background-color: #cfd2cd;
        }

        .btn-danger {
            color: white;
            background-color: #9e2a2b;
            border: none;
        }

        .btn-danger:hover {
            color: black;
            background-color: #cfd2cd;
        }

        .btn-warning {
            color: white;
            background-color: #52796f;
            border: none;
        }

        .btn-warning:hover {
            color: black;
            background-color: #cfd2cd;
        }
    </style>
</head>

<body>
    <div class="container" style="margin-top: 3%;">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Daftar Buku LibraryZen</h1>
            </div>
        </div>
        <div class="container-fluid" style="margin-top: 3%;">
            <div class="card">

                <div class="card-header" style="padding: 15px;">

                    <div class="row">

                        <div class="col-md-6">
                            <a type="button" class="btn btn-info" href="dashboard.php"><i class="fa fa-home"></i> Go To Home</a>
                        </div>
                        <div class="col text-end">
                            <a type="button" class="btn btn-primary" href="tambah_book.php"><i class="fa fa-plus"></i>&nbsp; Tambah Buku</a>
                        </div>

                    </div>
                    <br>
                    <div class="col">
                        <form action="" method="POST" style="width: 100%;">
                            <div class="input-group">
                                <input class="form-control" type="text" name="cari" placeholder="Search">
                                <button class="input-group-text btn btn-primary" type="submit" name="search"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="col-sm-6">
                            <div class="card mb-3" style="max-width: 540px; margin-top: 20x;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="gambar/<?php echo $row['gambar']; ?>" style="width: 130px;" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $no; ?>. <?php echo $row['judul']; ?></h5>
                                            <p class="card-text">Pengarang : <?php echo $row['pengarang']; ?></p>
                                            <p class="card-text">Penerbit : <?php echo $row['penerbit']; ?></p>
                                            <a type="button" class="btn btn-warning" href="edit_book.php?id_buku=<?php echo $row['id_buku']; ?>"><i class="fa fa-cog"></i> Edit</a>
                                            <a type="button" class="btn btn-danger" href="proses_hapus.php?id_buku=<?php echo $row['id_buku']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        $no++; //untuk nomor urut terus bertambah 1
                    }
                    ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="nav justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a type="button" class="btn btn-danger" aria-current="page" href="logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>