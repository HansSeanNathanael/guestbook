<?php 

namespace App\Core\Repository\Kunjungan\Entity;

use DateTime;

class TanggalKunjungan {

    private DateTime $tanggalKunjungan;

    public function __construct(
        ?DateTime $tanggalKunjungan = null
    ) {
        if ($tanggalKunjungan === null) {
            $tanggalKunjungan = new DateTime("now");
        }
        $this->tanggalKunjungan = DateTime::createFromFormat("Y-m-d H:i", $tanggalKunjungan->format("Y-m-d H:i"));
    }

    public function tanggalKunjungan() : DateTime {
        return $this->tanggalKunjungan;
    }

    public function setTanggalKunjungan(DateTime $tanggalKunjungan) : void {
        $this->tanggalKunjungan = $tanggalKunjungan;
    }
}

?>