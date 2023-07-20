<?php 

namespace App\Application\Command\Kunjungan\BuatKunjunganBaru;

use App\Core\Repository\Kunjungan\Entity\IdentitasTamu;
use App\Core\Repository\Kunjungan\Entity\IDKunjungan;
use App\Core\Repository\Kunjungan\Entity\Kunjungan;
use App\Core\Repository\Kunjungan\Entity\StatusKunjungan;
use App\Core\Repository\Kunjungan\Entity\TanggalKunjungan;
use App\Core\Repository\Kunjungan\Entity\TujuanKunjungan;
use App\Core\Repository\Kunjungan\RepositoryKunjunganInterface;
use DateTime;
use Exception;

class BuatKunjunganBaruCommand {

    public function execute(BuatKunjunganBaruRequest $request, RepositoryKunjunganInterface $repositoryKunjungan) {
        
        $tanggalKunjungan = null;
        if ($request->tanggalKunjungan !== null) {
            $tanggalKunjungan = DateTime::createFromFormat("Y-m-d\TH:i", $request->tanggalKunjungan);
        }
        if ($tanggalKunjungan === false) {
            throw new Exception("format tanggal salah");
        }

        $kunjunganBaru = new Kunjungan(
            new IDKunjungan(),
            new TanggalKunjungan($tanggalKunjungan),
            new IdentitasTamu($request->nama, $request->nomorTelepon, $request->alamat, $request->instansi, $request->tandaTangan),
            new TujuanKunjungan($request->tujuanKunjungan),
            new StatusKunjungan(false)
        );

        $repositoryKunjungan->save($kunjunganBaru);
    }
}

?>