<?php

class Crud extends Database
{
    public $nis;
    public $nama;

    public function prepare($data)
    {
        $statement = $this->koneksi->prepare($data);
        if (!$statement) {
            die("Error in preparing statement: " . $this->koneksi->error);
        }
        return $statement;
    }

    public function query($data)
    {
        $result = $this->koneksi->query($data);
        if (!$result) {
            die("SQL error: " . $this->koneksi->error);
        }
        return $result;
    }

    public function tampilsiswa()
    {
        $sql = "SELECT nis, nama FROM siswa";
        $result = $this->query($sql);
        return $result;
    }

    public function insertData($nis, $nama)
    {
        $sql = "INSERT INTO siswa (nis, nama) VALUES (?,?)";
        if ($stmt = $this->prepare($sql)) {
            $stmt->bind_param("ss", $param_nis, $param_nama);
            $param_nis = $nis;
            $param_nama = $nama;
            if ($stmt->execute()) {
                $stmt->close();
                return true;
            } else {
                $stmt->close();
                return false;
            }
        }
    }

    public function detailData($data)
    {
        $sql = "SELECT nis, nama FROM siswa WHERE nis=?";
        if ($stmt = $this->koneksi->prepare($sql)) {
            $stmt->bind_param("i", $param_data);
            $param_data = $data;
            if ($stmt->execute()) {
                $stmt->store_result();
                $stmt->bind_result($this->nis, $this->nama);
                $stmt->fetch();
                if ($stmt->num_rows == 1) {
                    return true;
                } else {
                    return false;
                }
            }
            $stmt->close();
        }
    }

    public function updateData($nis, $nama, $data)
    {
        $sql = "UPDATE siswa SET nis=?, nama=? WHERE nis=?";
        if ($stmt = $this->prepare($sql)) {
            $stmt->bind_param("ssi", $param_nis, $param_nama, $param_data);
            $param_nis = $nis;
            $param_nama = $nama;
            $param_data = $data;
            if ($stmt->execute()) {
                $stmt->close();
                return true;
            } else {
                $stmt->close();
                return false;
            }
        }
    }

    public function deleteData($data)
    {
        $sql = "DELETE FROM siswa WHERE nis=?";
        if ($stmt = $this->prepare($sql)) {
            $stmt->bind_param("i", $param_data);
            $param_data = $data;
            if ($stmt->execute()) {
                $stmt->close();
                return true;
            } else {
                $stmt->close();
                return false;
            }
        }

    }
}

?>
