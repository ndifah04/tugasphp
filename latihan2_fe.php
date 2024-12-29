<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tgs Thn Baru</title>
    <style>
        body {
            margin: 0;
            padding: 2rem;
            font-family: Arial, sans-serif;
            background-color: #ffe4e1;
        }

        h1, h2 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            padding: 0.8rem;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f4cccc;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9dada;
        }

        tr:hover {
            background-color: #ffccd5;
        }

        form {
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        label {
            font-weight: bold;
            margin-bottom: 0.5rem;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 0.5rem;
        }

        button {
            background-color: #ff6f61;
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 0.5rem;
            cursor: pointer;
            font-size: 1rem;
        }

        button:hover {
            background-color: #e65c55;
        }

        .center {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>🌸Data User🌸</h1>
    <?php
    include "latihan2.php";

    $data = getData();

    if (count($data) > 0) {
        echo "<table>";
        echo "<thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Umur</th>
                    <th>Aksi</th>
                </tr>
              </thead>";
        echo "<tbody>";
        for ($i = 0; $i < count($data); $i++) {
            $user = $data[$i];
            echo "<tr>";
            echo "<td>" . ($i + 1) . "</td>";
            echo "<td>$user[nama]</td>";
            echo "<td>" . ($user['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan') . "</td>";
            echo "<td>$user[umur]</td>";
            echo "<td>
                    <a href='latihan2_put.php?id=$i'>Edit</a> | 
                    <a href='latihan2_delete.php?id=$i' style='color: red;'>Hapus</a>
                  </td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p class='center'>Tidak ada data pengguna.</p>";
    }
    ?>

    <h2>🌸Form Tambah User🌸</h2>
    <form method="post" action="latihan2_post.php">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" required>
        
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin" required>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
        
        <label for="umur">Umur</label>
        <input type="number" name="umur" id="umur" placeholder="Masukkan Umur" required>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>
