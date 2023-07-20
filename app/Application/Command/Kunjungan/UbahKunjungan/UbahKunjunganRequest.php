<?php 

namespace App\Application\Command\Kunjungan\UbahKunjungan;

class UbahKunjunganRequest {
    public function __construct(
        public string $idKunjungan,
        public string $nama,
        public string $nomorTelepon,
        public string $alamat,
        public ?string $instansi,
        public ?string $tandaTangan,
        public string $tanggalKunjungan,
        public string $tujuanKunjungan
    ) {}
}

?>