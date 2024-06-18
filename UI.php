<?php

// Koneksi ke database (sesuaikan dengan informasi koneksi database Anda)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start = isset($_POST['start']) ? $_POST['start'] : '';
    $end = isset($_POST['end']) ? $_POST['end'] : '';

    if (!empty($start) && !empty($end)) {
        // Implementasi Best First Search
        $paths = findShortestPaths($start, $end, $conn);
        if ($paths) {
            echo "Rute Jalur Dari $start Ke $end:<br>";
            foreach ($paths as $path) {
                if ($path['cost'] > 0) { // Hanya tampilkan jalur dengan total biaya lebih dari 0
                    echo "- " . $start . " -> " . implode(" -> ", $path['path']) . " dengan Total Nilai " . $path['cost'] . "<br>";
                }
            }
        } else {
            echo "There is no path from $start to $end.";
        }
    } else {
        echo "Please select start and end locations.";
    }
}

// Tutup koneksi database setelah selesai digunakan
$conn->close();

// Fungsi untuk mencari jalur terpendek menggunakan Best First Search
function findShortestPaths($start, $end, $conn) {
    $queue = new SplPriorityQueue();
    $queue->insert([$start, [], 0], 0); // Menyimpan path dan total cost
    $visited = [];

    $shortestPaths = []; // Array untuk menyimpan semua jalur terpendek

    while (!$queue->isEmpty()) {
        [$current, $path, $cost] = $queue->extract();
        if ($current == $end) {
            $shortestPaths[] = ['path' => $path, 'cost' => $cost]; // Menyimpan jalur terpendek
            continue; // Lanjut ke iterasi berikutnya untuk mencari jalur lainnya
        }
        
        if (!isset($visited[$current])) {
            $visited[$current] = true;

            // Ambil tetangga-tetangga dari current node dari database
            $sql = "SELECT node2, weight FROM connections_bidirectional WHERE node1='$current'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $neighbor = $row["node2"];
                    $neighborCost = $row["weight"];
                    if (!isset($visited[$neighbor])) {
                        $queue->insert([$neighbor, array_merge($path, [$neighbor]), $cost + $neighborCost], -$neighborCost); // Prioritas negatif agar yang terkecil keluar terlebih dahulu
                    }
                }
            }
        }
    }

    return $shortestPaths; // Mengembalikan array dari jalur-jalur terpendek
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Personal Portfolio Using HTML & CSS</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <div class="header-left-side">
        <h1>
          Campus <br />
          Maps
        </h1>
        <h2>KELOMPOK 6 AI GRUP C</h2>
        <p>
        Aplikasi Campus Maps adalah sebuah aplikasi yang dirancang khusus untuk membantu pengguna
         terkhusus nya mahasiswa baru  dalam navigasi di dalam sebuah kampus atau lingkungan universitas. 
         Aplikasi ini menyediakan berbagai fitur untuk membantu pengguna menemukan lokasi tertentu, menentukan rute terpendek antara dua lokasi ( Gedung 1 ke Gedung lainnya ) , dan mendapatkan informasi tambahan mengenai fasilitas-fasilitas di kampus
        </p>
        <form action="UI.php" method="post">
        <label for="start">Starting Location:</label>
        <select id="start" name="start">
            <!-- Opsi pilihan start location -->
            <option value="Agape">Agape</option>
            <option value="Biblos">Biblos</option>
            <option value="Chara">Chara</option>
            <option value="Didaktos">Didaktos</option>
            <option value="Euodia">Euodia</option>
            <option value="Filia">Filia</option>
            <option value="Gnosis">Gnosis</option>
            <option value="Hagios">Hagios</option>
            <option value="Iama">Iama</option>
            <option value="Koinonia">Koinonia</option>
            <option value="Logos">Logos</option>
            <option value="Makarios">Makarios</option>
            <option value="Ze">Ze</option>
        </select><br><br>

        <label for="end">End Location:</label>
        <select id="end" name="end">
            <!-- Opsi pilihan end location -->
            <option value="Agape">Agape</option>
            <option value="Biblos">Biblos</option>
            <option value="Chara">Chara</option>
            <option value="Didaktos">Didaktos</option>
            <option value="Euodia">Euodia</option>
            <option value="Filia">Filia</option>
            <option value="Gnosis">Gnosis</option>
            <option value="Hagios">Hagios</option>
            <option value="Iama">Iama</option>
            <option value="Koinonia">Koinonia</option>
            <option value="Logos">Logos</option>
            <option value="Makarios">Makarios</option>
            <option value="Ze">Ze</option>
        </select><br><br>

        <input type="submit" value="CARI">
    </form>
      </div>
      <div class="header-right-side">
        <img src="image.png" alt="img" />
      </div>
    </header>
  </body>
</html>
