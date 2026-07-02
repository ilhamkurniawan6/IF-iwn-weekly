<?php

$koneksi = mysqli_connect("localhost", "root", "root", "iwn_weekly");

function tampildata($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambahdata($data)
{
    global $koneksi;

    $nama = htmlspecialchars($data['nama'] ?? $data['asma'] ?? '', ENT_QUOTES, 'UTF-8');
    $nim = htmlspecialchars($data['nim'] ?? '', ENT_QUOTES, 'UTF-8');
    $jurusan = htmlspecialchars($data['jurusan'] ?? $data['prodi'] ?? '', ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($data['email'] ?? '', ENT_QUOTES, 'UTF-8');
    $no_hp = htmlspecialchars($data['no_hp'] ?? '', ENT_QUOTES, 'UTF-8');
    $foto = $data['foto'] ?? '';

    $query = "INSERT INTO mahasiswa
            (nama, nim, jurusan, email, no_hp, foto)
            VALUES
            ('$nama', '$nim', '$jurusan', '$email', '$no_hp', '$foto')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapusdata($id)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id=$id");

    return mysqli_affected_rows($koneksi);
}

?>