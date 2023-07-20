<?php 

namespace App\Core\Query\Kunjungan;

class KunjunganDTO {
    public function __construct(
        public string $id,
        public string $tanggalKunjungan,
        public string $nama,
        public string $nomorTelepon,
        public string $alamat,
        public ?string $instansi,
        public ?string $tandaTangan,
        public string $tujuanKunjungan,
        public bool $deleted
    )
    {
        
    }
}

?>