<?php 

namespace App\Application\Command\Kunjungan\UbahKunjungan;

use App\Core\Repository\Kunjungan\Entity\IDKunjungan;
use App\Core\Repository\Kunjungan\RepositoryKunjunganInterface;
use DateTime;
use Exception;

class UbahKunjunganCommand {

    public function execute(UbahKunjunganRequest $request, RepositoryKunjunganInterface $repositoryKunjungan) {

        $idKunjungan = new IDKunjungan($request->idKunjungan);
        $kunjungan = $repositoryKunjungan->byID($idKunjungan);
        if ($kunjungan === null) {
            throw new Exception("data tidak ada");
        }

        $tanggalKunjungan = DateTime::createFromFormat("Y-m-d\TH:i", $request->tanggalKunjungan);
        if ($tanggalKunjungan === false) {
            throw new Exception("format tanggal salah");
        }

        $kunjungan->getTanggalKunjungan()->setTanggalKunjungan($tanggalKunjungan);
        $kunjungan->getIdentitasTamu()->setIdentitas(
            $request->nama, $request->nomorTelepon, $request->alamat, 
            $request->instansi, $request->tandaTangan
        );
        $kunjungan->getTujuanKunjungan()->setTujuan($request->tujuanKunjungan);
        $repositoryKunjungan->update($kunjungan);
    }
}

?>