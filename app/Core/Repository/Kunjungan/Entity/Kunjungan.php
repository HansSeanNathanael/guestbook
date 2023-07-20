<?php 

namespace App\Core\Repository\Kunjungan\Entity;

class Kunjungan {

    private IDKunjungan $idKunjungan;
    private TanggalKunjungan $tanggalKunjungan;
    private IdentitasTamu $identitasTamu;
    private TujuanKunjungan $tujuanKunjungan;
    private StatusKunjungan $statusKunjungan;

    public function __construct(
        IDKunjungan $idKunjungan,
        TanggalKunjungan $tanggalKunjungan,
        IdentitasTamu $identitasTamu,
        TujuanKunjungan $tujuanKunjungan,
        StatusKunjungan $statusKunjungan
    )
    {
        $this->idKunjungan = $idKunjungan;
        $this->tanggalKunjungan = $tanggalKunjungan;
        $this->identitasTamu = $identitasTamu;
        $this->tujuanKunjungan = $tujuanKunjungan;
        $this->statusKunjungan = $statusKunjungan;
    }

    public function getIDKunjungan() : IDKunjungan {
        return $this->idKunjungan;
    }

    public function getTanggalKunjungan() : TanggalKunjungan {
        return $this->tanggalKunjungan;
    }

    public function getIdentitasTamu() : IdentitasTamu {
        return $this->identitasTamu;
    }

    public function getTujuanKunjungan() : TujuanKunjungan {
        return $this->tujuanKunjungan;
    }

    public function getStatusKunjungan() : StatusKunjungan {
        return $this->statusKunjungan;
    }
}

?>