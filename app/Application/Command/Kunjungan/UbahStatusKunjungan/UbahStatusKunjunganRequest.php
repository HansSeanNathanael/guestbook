<?php 

namespace App\Application\Command\Kunjungan\UbahStatusKunjungan;

class UbahStatusKunjunganRequest {
    public function __construct(
        public string $idKunjungan,
        public bool $statusKunjungan
    ) {}
}

?>