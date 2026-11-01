<?php
$matkul = [
    [
        "nama" => "Algoritma dan Pemrograman",
        "sks" => 3,
        "nilai" => 85
    ],
    [
        "nama" => "Basis Data",
        "sks" => 3,
        "nilai" => 78
    ],
    [
        "nama" => "Struktur Data",
        "sks" => 4,
        "nilai" => 55
    ],
    [
        "nama" => "Jaringan Komputer",
        "sks" => 3,
        "nilai" => 90
    ],
    [
        "nama" => "Matematika Diskrit",
        "sks" => 2,
        "nilai" => 60
    ]
];


function hitungBobot($nilai) {
    if ($nilai >= 80) {
        return ["huruf" => "A", "bobot" => 4.0];
    } elseif ($nilai >= 70) {
        return ["huruf" => "B", "bobot" => 3.0];
    } elseif ($nilai >= 60) {
        return ["huruf" => "C", "bobot" => 2.0];
    } elseif ($nilai >= 50) {
        return ["huruf" => "D", "bobot" => 1.0];
    } else {
        return ["huruf" => "E", "bobot" => 0.0];
    }
}


$totalSks = 0;
$totalBobot = 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Mata Kuliah dan IPS</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        h2, h3 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #e5e5e5;
        }

        td:nth-child(2) {
            text-align: left;
        }

        .mengulang {
            background-color: #ffcccc;
            color: #990000;
        }

        .ringkasan {
            margin-top: 20px;
            padding: 15px;
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

<h2>Daftar Nilai Mata Kuliah</h2>

<table>
    <tr>
        <th>No.</th>
        <th>Nama Mata Kuliah</th>
        <th>SKS</th>
        <th>Nilai Angka</th>
        <th>Nilai Huruf</th>
        <th>Bobot</th>
        <th>Status</th>
    </tr>

    <?php
    $no = 1;

    foreach ($matkul as $mk) {
        $hasil = hitungBobot($mk["nilai"]);

        $huruf = $hasil["huruf"];
        $bobot = $hasil["bobot"];

        if ($bobot >= 2.0) {
            $status = "LULUS";
            $kelas = "";
        } else {
            $status = "MENGULANG";
            $kelas = "mengulang";
        }

        $totalSks += $mk["sks"];
        $totalBobot += $mk["sks"] * $bobot;
    ?>

    <tr class="<?= $kelas ?>">
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($mk["nama"]) ?></td>
        <td><?= $mk["sks"] ?></td>
        <td><?= $mk["nilai"] ?></td>
        <td><?= $huruf ?></td>
        <td><?= number_format($bobot, 1) ?></td>
        <td><?= $status ?></td>
    </tr>

    <?php
    }
    ?>

</table>

<?php
$ips = ($totalSks > 0) ? $totalBobot / $totalSks : 0;

if ($ips >= 3.00) {
    $maksSks = 24;
} else {
    $maksSks = 20;
}
?>

<div class="ringkasan">
    <h3>Ringkasan IPS</h3>

    <p>Total SKS: <?= $totalSks ?></p>

    <p>Total Bobot Nilai x SKS:
        <?= number_format($totalBobot, 2) ?>
    </p>

    <p>IPS:
        <strong><?= number_format($ips, 2) ?></strong>
    </p>

    <p>
        Maksimal SKS semester depan:
        <strong><?= $maksSks ?> SKS</strong>
    </p>
</div>

</body>
</html>
