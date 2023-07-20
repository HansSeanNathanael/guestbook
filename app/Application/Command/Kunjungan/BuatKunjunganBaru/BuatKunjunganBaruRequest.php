<?php 

namespace App\Application\Command\Kunjungan\BuatKunjunganBaru;

class BuatKunjunganBaruRequest {
    public function __construct(
        public string $nama,
        public string $nomorTelepon,
        public string $alamat,
        public ?string $instansi,
        public ?string $tandaTangan,
        public ?string $tanggalKunjungan,
        public string $tujuanKunjungan
    ) {}
}

?>