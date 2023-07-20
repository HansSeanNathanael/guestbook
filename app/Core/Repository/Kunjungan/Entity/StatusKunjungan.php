<?php 

namespace App\Core\Repository\Kunjungan\Entity;

class StatusKunjungan {

    private bool $deleted;

    public function __construct(bool $deleted)
    {
        $this->deleted = $deleted;
    }

    public function isDeleted() : bool {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted) {
        $this->deleted = $deleted;
    }
}

?>