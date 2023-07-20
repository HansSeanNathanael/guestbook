<?php 

namespace App\Infrastructure\Repository\MySQL;

use App\Core\Repository\Kunjungan\Entity\IdentitasTamu;
use App\Core\Repository\Kunjungan\Entity\IDKunjungan;
use App\Core\Repository\Kunjungan\Entity\Kunjungan;
use App\Core\Repository\Kunjungan\Entity\StatusKunjungan;
use App\Core\Repository\Kunjungan\Entity\TanggalKunjungan;
use App\Core\Repository\Kunjungan\Entity\TujuanKunjungan;
use App\Core\Repository\Kunjungan\RepositoryKunjunganInterface;
use DateTime;
use Illuminate\Support\Facades\DB;

class RepositoryKunjunganMySQL implements RepositoryKunjunganInterface {
    
    public function byID(IDKunjungan $idKunjungan) : ?Kunjungan {
        $script = "SELECT k.id, k.nama, k.alamat, k.nomor_telepon, k.tanggal_kunjungan, k.instansi, k.tanda_tangan, k.tujuan_kunjungan, k.deleted 
            FROM kunjungan AS k WHERE k.id = :id_kunjungan";
        $hasilQuery = DB::select($script, [
            "id_kunjungan" => $idKunjungan->id()
        ]);

        if (count($hasilQuery) == 0) {
            return null;
        }

        $entitas = $hasilQuery[0];
        return new Kunjungan(
            new IDKunjungan($entitas->id),
            new TanggalKunjungan(new DateTime($entitas->tanggal_kunjungan)),
            new IdentitasTamu(
                $entitas->nama,
                $entitas->nomor_telepon,
                $entitas->alamat,
                $entitas->instansi,
                $entitas->tanda_tangan
            ),
            new TujuanKunjungan($entitas->tujuan_kunjungan),
            new StatusKunjungan($entitas->deleted)
        );
    }

    public function save(Kunjungan $kunjungan) : void {
        $currentTime = new DateTime("now");
        $currentTimeString = $currentTime->format("Y-m-d H:i:s");
        DB::table("kunjungan")->insert([
            "id" => $kunjungan->getIDKunjungan()->id(), 
            "nama" => $kunjungan->getIdentitasTamu()->nama(), 
            "alamat" => $kunjungan->getIdentitasTamu()->alamat(), 
            "nomor_telepon" => $kunjungan->getIdentitasTamu()->nomorTelepon(), 
            "tanggal_kunjungan" => $kunjungan->getTanggalKunjungan()->tanggalKunjungan()->format("Y-m-d H:i:s"), 
            "instansi" => $kunjungan->getIdentitasTamu()->instansi(), 
            "tanda_tangan" => $kunjungan->getIdentitasTamu()->tandaTangan(), 
            "tujuan_kunjungan" => $kunjungan->getTujuanKunjungan()->tujuanKunjungan(), 
            "deleted" => $kunjungan->getStatusKunjungan()->isDeleted(),
            "created_at" => $currentTimeString,
            "updated_at" => $currentTimeString
        ]);
    }
    
    public function update(Kunjungan $kunjungan) : void {
        $currentTime = new DateTime("now");
        $currentTimeString = $currentTime->format("Y-m-d H:i:s");
        DB::table("kunjungan")->where("id", "=", $kunjungan->getIDKunjungan()->id())->update([
            "id" => $kunjungan->getIDKunjungan()->id(), 
            "nama" => $kunjungan->getIdentitasTamu()->nama(), 
            "alamat" => $kunjungan->getIdentitasTamu()->alamat(), 
            "nomor_telepon" => $kunjungan->getIdentitasTamu()->nomorTelepon(), 
            "tanggal_kunjungan" => $kunjungan->getTanggalKunjungan()->tanggalKunjungan()->format("Y-m-d H:i:s"), 
            "instansi" => $kunjungan->getIdentitasTamu()->instansi(), 
            "tanda_tangan" => $kunjungan->getIdentitasTamu()->tandaTangan(), 
            "tujuan_kunjungan" => $kunjungan->getTujuanKunjungan()->tujuanKunjungan(), 
            "deleted" => $kunjungan->getStatusKunjungan()->isDeleted(),
            "updated_at" => $currentTimeString
        ]);
    }
}

?>