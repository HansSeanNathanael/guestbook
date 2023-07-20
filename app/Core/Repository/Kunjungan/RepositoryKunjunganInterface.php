<?php 

namespace App\Core\Repository\Kunjungan;

use App\Core\Repository\Kunjungan\Entity\IDKunjungan;
use App\Core\Repository\Kunjungan\Entity\Kunjungan;

interface RepositoryKunjunganInterface {
    
    public function byID(IDKunjungan $idKunjungan) : ?Kunjungan;

    public function save(Kunjungan $kunjungan) : void;
    
    public function update(Kunjungan $kunjungan) : void;
}

?>