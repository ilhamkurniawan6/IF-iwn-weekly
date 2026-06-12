<?php
        $connection = mysqli_connect("localhost", "root", "root", "iwn_weekly");
//fungsi tampil data
        function tampildata($query)
        {
            global $connection;
            $result = mysqli_query($connection, $query);

            $rows = [];
            while($row = mysqli_fetch_assoc($result))
                {
                    $rows[] = $row;
                }
            
            return $rows;
        }
//fungsi tambah data mahasiswa
        function tambahdata($data)
        {
            global $connection;

            $nama = htmlspecialchars($data['nama'], ENT_QUOTES, 'UTF-8');
            $nim = htmlspecialchars($data['nim'], ENT_QUOTES, 'UTF-8');
            $jurusan = htmlspecialchars($data['jurusan'], ENT_QUOTES, 'UTF-8');
            $email = htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8');
            $no_hp = htmlspecialchars($data['no_hp'], ENT_QUOTES, 'UTF-8');
            $foto = $data['foto'];

            $query = "INSERT INTO mahasiswa
                    (nama, nim, jurusan, email, no_hp, foto)
                    VALUES
                    ('$nama', '$nim', '$jurusan', '$email', '$no_hp', '$foto')";

            mysqli_query($connection, $query);

            return mysqli_affected_rows($connection);
        }
//fungsi hapus data mahasiswa
        function hapusdata($id)
        {
            global $connection;

            mysqli_query($connection, "DELETE FROM mahasiswa WHERE id = $id");

            return mysqli_affected_rows($connection);
        }
?>