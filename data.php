<?php
session_start();

class FormBase
{
    protected function tambahData($input)
    {
        if (!isset($_SESSION['data'])) {
            $_SESSION['data'] = [];
        }

        array_push($_SESSION['data'], $input);
    }

    public function ambilData()
    {
        return $_SESSION['data'] ?? [];
    }
}

class FormDataDiri extends FormBase
{
    public function simpan($nama, $umur, $alamat, $nomor, $identitas)
    {
        $data = compact('nama', 'umur', 'alamat', 'nomor', 'identitas');
        $this->tambahData($data);
    }
}

class FormBooking extends FormBase
{
    public function simpan($tipekamar, $jumlahkamar, $checkin, $checkout, $pembayaran)
    {
        $data = compact('tipekamar', 'jumlahkamar', 'checkin', 'checkout', 'pembayaran');
        $this->tambahData($data);
    }
}

class FormPreferensi extends FormBase
{
    public function simpan($namatamu, $umurtamu, $hubungan, $kelamin, $identitas)
    {
        $data = compact('namatamu', 'umurtamu', 'hubungan', 'kelamin', 'identitas');
        $this->tambahData($data);
    }
}

class FormPembayaran extends FormBase
{
    public function simpan($kartu, $nama, $pembayaran, $jumlahbayar, $tanggalbayar)
    {
        $data = compact('kartu', 'nama', 'pembayaran', 'jumlahbayar', 'tanggalbayar');
        $this->tambahData($data);
    }
}
