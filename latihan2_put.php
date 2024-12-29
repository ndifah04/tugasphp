<?php
include "latihan2.php";
?>

<?php if ($_SERVER["REQUEST_METHOD"] == "GET") : ?>

    <?php if (isset($_GET["id"])) : ?>
        <?php
        $id = $_GET["id"];
        $datas = getData();
        $data = $datas[$id];
        ?>

        <?php if ($data != null) : ?>

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Edit Data <?= htmlspecialchars($data["nama"]) ?></title>
                <style>
                    body {
                        margin: 0;
                        margin-inline: 1rem;
                        margin-top: 2rem;
                    }

                    label {
                        font-weight: bold;
                    }

                    input, select {
                        border-radius: .5rem;
                        border-width: 1px;
                        padding-block: .2rem;
                        padding-inline: .3rem;
                    }

                    form {
                        display: flex;
                        flex-direction: column;
                        gap: 1rem;
                    }

                    button {
                        width: max-content;
                    }
                </style>
            </head>
            <body>
                <h1>Edit Data User</h1>

                <p style="display: none;" id="index"><?= $id ?></p>

                <form id="put">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($data["nama"]) ?>">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin">
                        <option value="L" <?= $data["jenis_kelamin"] == "L" ? "selected" : "" ?>>Laki-laki</option>
                        <option value="P" <?= $data["jenis_kelamin"] == "P" ? "selected" : "" ?>>Perempuan</option>
                    </select>
                    <label for="umur">Umur</label>
                    <input type="number" id="umur" name="umur" value="<?= htmlspecialchars($data["umur"]) ?>">
                    <button type="submit">Edit</button>
                </form>

                <script>
                    document.getElementById("put").addEventListener("submit", async function (e) {
                        e.preventDefault();

                        const id = document.getElementById("index").innerText.trim();
                        const nama = document.getElementById("nama").value.trim();
                        const jenis_kelamin = document.getElementById("jenis_kelamin").value.trim();
                        const umur = document.getElementById("umur").value.trim();

                        if (!nama || !umur || !jenis_kelamin) {
                            alert("Semua field harus diisi!");
                            return;
                        }

                        try {
                            const response = await fetch(`?id=${id}`, {
                                method: "PUT",
                                headers: {
                                    "Content-Type": "application/json",
                                },
                                body: JSON.stringify({
                                    nama,
                                    jenis_kelamin,
                                    umur,
                                }),
                            });

                            if (response.ok) {
                                alert("Data berhasil diubah!");
                                window.location.href = "latihan2_fe.php";
                            } else {
                                alert("Terjadi kesalahan saat mengubah data!");
                            }
                        } catch (error) {
                            console.error("Error:", error);
                            alert("Terjadi kesalahan saat menghubungi server!");
                        }
                    });

                    document.getElementById("backToDashboard").addEventListener("click", function () {
                        window.location.href = "latihan2_fe.php";
                    });
                </script>
            </body>
            </html>

        <?php else : ?>
            <h2>Data Tidak Ditemukan</h2>
            <script>
                document.getElementById("backToDashboard").addEventListener("click", function () {
                    window.location.href = "latihan2_fe.php";
                });
            </script>
        <?php endif; ?>

    <?php else : ?>
        <h2>ID Tidak Diatur</h2>
        <script>
            document.getElementById("backToDashboard").addEventListener("click", function () {
                window.location.href = "latihan2_fe.php";
            });
        </script>
    <?php endif; ?>

<?php elseif ($_SERVER["REQUEST_METHOD"] == "PUT") : ?>

    <?php
    $json = json_decode(file_get_contents("php://input"), true);

    if (!isset($_GET["id"])) {
        http_response_code(400);
        echo json_encode(["message" => "ID tidak ditemukan"]);
        exit;
    }

    $id = $_GET["id"];
    $nama = $json["nama"];
    $umur = $json["umur"];
    $jenis_kelamin = $json["jenis_kelamin"];

    $user = new User($nama, $jenis_kelamin, $umur);

    $datas = getData();
    $datas[$id] = [
        "nama" => $user->nama,
        "jenis_kelamin" => $user->jenis_kelamin,
        "umur" => $user->umur,
    ];

    file_put_contents($jsonname, json_encode($datas));

    echo json_encode(["message" => "Berhasil mengedit data"]);
    ?>

<?php endif; ?>
