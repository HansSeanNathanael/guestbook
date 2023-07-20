<?php 

namespace App\Core\Repository\Kunjungan\Entity;

class IdentitasTamu {

    public function __construct(
        private string $nama,
        private string $nomorTelepon,
        private string $alamat,
        private ?string $instansi,
        private ?string $tandaTangan
    ) {

    }

    public function nama() : string {
        return $this->nama;
    }

    public function nomorTelepon() : string {
        return $this->nomorTelepon;
    }

    public function alamat() : string {
        return $this->alamat;
    }

    public function instansi() : ?string {
        return $this->instansi;
    }

    public function tandaTangan() : ?string {
        return $this->tandaTangan;
    }

    public function setIdentitas(
        string $nama,
        string $nomorTelepon,
        string $alamat,
        ?string $instansi,
        ?string $tandaTangan
    ) {
        $this->nama = $nama;
        $this->nomorTelepon = $nomorTelepon;
        $this->alamat = $alamat;
        $this->instansi = $instansi;
        $this->tandaTangan = $tandaTangan;
    }
}

?>