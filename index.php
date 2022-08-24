<?php
include 'database.php';
include 'pegawai.php';

$db = new Database();
$pegawai = new Pegawai();
$dataPegawai = $pegawai->getAll($db->conn, 'SELECT * FROM pegawai');
$title = "SEMUA DATA PEGAWAI";
if (isset($_GET['filter'])) {
switch ($_GET['filter']) {
    case '1':
        $dataPegawai = $pegawai->getAll($db->conn, 'SELECT * FROM pegawai');
        $title = "SEMUA DATA PEGAWAI";
        break;
    case '2':
        $dataPegawai = $pegawai->getAll($db->conn, 'SELECT * FROM pegawai WHERE jenis_kelamin = "L"');
        $title = "DATA PEGAWAI BERJENIS KELAMIN LAKI-LAKI";
        break;
    case '3':
        $dataPegawai = $pegawai->getAll($db->conn, 'SELECT * FROM pegawai WHERE status = "M"');
        $title = "DATA PEGAWAI DENGAN STATUS MENIKAH";
        break;
    case '4':
        $dataPegawai= $pegawai->getAll($db->conn, 'SELECT * FROM pegawai WHERE status = "B"');
        $title = "DATA PEGAWAI DENGAN STATUS BELUM MENIKAH";
        break;
    case '5':
        $dataPegawai = $pegawai->getAll($db->conn, "SELECT * ,DATE_FORMAT(FROM_DAYS(DATEDIFF(now(),tgl_lahir)), '%Y') + 0 AS age from pegawai");
        $data = [];
        foreach ($dataPegawai as $key => $value) {
            if ($value['age'] >= 20 && $value['age'] <= 30) {
                $data[] = $value;
            }
        }
        $dataPegawai = $data;
        $title = "DATA PEGAWAI YANG BERUSIA DIANTARA 20 SAMPAI 30 TAHUN";
        break;
    case '6':
        $dataPegawai = $pegawai->getAll($db->conn, "SELECT * ,DATE_FORMAT(FROM_DAYS(DATEDIFF(now(),tgl_lahir)), '%Y') + 0 AS age from pegawai");
        $data = [];
        foreach ($dataPegawai as $key => $value) {
            if ($value['age'] >= 31 && $value['age'] <= 45) {
                $data[] = $value;
            }
        }
        $dataPegawai = $data;
        $title = "DATA PEGAWAI YANG BERUSIA DIANTARA 31 SAMPAI 45 TAHUN";
        break;
    case '7':
        $dataPegawai = $pegawai->getAll($db->conn, "SELECT * ,DATE_FORMAT(FROM_DAYS(DATEDIFF(now(),tgl_lahir)), '%Y') + 0 AS age from pegawai");
        $data = [];
        foreach ($dataPegawai as $key => $value) {
            if ($value['mulai_kerja'] >= 1 && $value['mulai_kerja'] <= 5) {
                $data[] = $value;
            }
        }
        $dataPegawai = $data;
        $title = "DATA PEGAWAI YANG MASA KERJANYA DIANTARA 1 SAMPAI 5 TAHUN";
        break;
    case '8':
        $dataPegawai = $pegawai->getAll($db->conn, "SELECT * ,DATE_FORMAT(FROM_DAYS(DATEDIFF(now(),tgl_lahir)), '%Y') + 0 AS mulai_kerja from pegawai");
        $data = [];
        foreach ($dataPegawai as $key => $value) {
            if ($value['mulai_kerja'] >= 6 && $value['mulai_kerja'] <= 10) {
                $data[] = $value;
            }
        }
        $dataPegawai = $data;
        $title = "DATA PEGAWAI YANG MASA KERJANYA DIANTARA 6 SAMPAI 10 TAHUN";
        break;
    case '9':
        $dataPegawai = $pegawai->getAll($db->conn, "SELECT * ,DATE_FORMAT(FROM_DAYS(DATEDIFF(now(),tgl_lahir)), '%Y') + 0 AS mulai_kerja from pegawai");
        $data = [];
        foreach ($dataPegawai as $key => $value) {
            if ($value['mulai_kerja'] >= 11 && $value['mulai_kerja'] <= 25) {
                $data[] = $value;
            }
        }
        $dataPegawai = $data;
        $title = "DATA PEGAWAI YANG MASA KERJANYA DIANTARA 11 SAMPAI 25 TAHUN";
        break;
    default:
        $dataPegawai = $pegawai->getAll($db->conn, 'SELECT * FROM pegawai');
        break;
    }
}

?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <center><h2><?= $title; ?></h2></center>
<br>
<br>
<br>
        <div class="d-flex justify-content-end">
            <form class="d-flex gap-3" action="" method="GET">
                <select name="filter" id="" class="form-select">
                    <option value="">Select Option</option>
                    <option value="1">All</option>
                    <option value="2">Laki Laki</option>
                    <option value="3">Menikah</option>
                    <option value="4">Belum Menikah</option>
                    <option value="5">Rentang Usia (20 - 30)</option>
                    <option value="6">Rentang Usia (31 - 45)</option>
                    <option value="7">Rentang Kerja (1 - 5)</option>
                    <option value="8">Rentang Kerja (6 - 10)</option>
                    <option value="9">Rentang Kerja (11 - 25)</option>

                </select>
                <button type="submit" class="btn btn-info">Submit</button>
            </form>
        </div>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dataPegawai as $key => $pegawai){ ?>

                <tr>
                    <td><?= $pegawai['id'] ?></td>
                    <td><?= $pegawai['nip'] ?></td>
                    <td><?= $pegawai['nama'] ?></td>
                    <td><?= $pegawai['jenis_kelamin'] ?></td>
                    <td><?= $pegawai['tgl_lahir'] ?></td>
                    <td><?= $pegawai['status'] ?></td>
                </tr>

                <?php } ?>
            </tbody>
        </table>



    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
