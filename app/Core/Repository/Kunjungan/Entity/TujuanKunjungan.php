<?php 

namespace App\Core\Repository\Kunjungan\Entity;

use Exception;

class TujuanKunjungan {

    private string $tujuanKunjungan;

    public function __construct(
        string $tujuanKunjungan
    ) {
        if (mb_strlen($tujuanKunjungan) > 500) {
            throw new Exception("tujuan kunjungan melebihi 500 karakter");
        }
        $this->tujuanKunjungan = $tujuanKunjungan;
    }

    public function tujuanKunjungan() : string {
        return $this->tujuanKunjungan;
    }

    public function setTujuan(string $tujuan) {
        $this->tujuanKunjungan = $tujuan;
    }
}

?>