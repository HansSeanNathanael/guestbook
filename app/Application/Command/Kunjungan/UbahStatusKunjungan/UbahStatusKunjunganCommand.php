<?php 

namespace App\Application\Command\Kunjungan\UbahStatusKunjungan;

use App\Core\Repository\Kunjungan\Entity\IDKunjungan;
use App\Core\Repository\Kunjungan\RepositoryKunjunganInterface;
use DateTime;
use Exception;

class UbahStatusKunjunganCommand {

    public function execute(UbahStatusKunjunganRequest $request, RepositoryKunjunganInterface $repositoryKunjungan) {

        $idKunjungan = new IDKunjungan($request->idKunjungan);
        $kunjungan = $repositoryKunjungan->byID($idKunjungan);
        if ($kunjungan === null) {
            throw new Exception("data tidak ada");
        }

        $kunjungan->getStatusKunjungan()->setDeleted($request->statusKunjungan);
        $repositoryKunjungan->update($kunjungan);
    }
}

?>