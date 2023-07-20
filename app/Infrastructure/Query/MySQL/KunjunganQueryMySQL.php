<?php 

namespace App\Infrastructure\Query\MySQL;

use App\Core\Query\Kunjungan\KunjunganDTO;
use App\Core\Query\Kunjungan\KunjunganQueryInterface;
use DateTime;
use Illuminate\Support\Facades\DB;

class KunjunganQueryMySQL implements KunjunganQueryInterface {

    public function byDateDanStatus(DateTime $date, bool $status) : array {
        
        $script = "SELECT k.id, k.nama, k.alamat, k.nomor_telepon, DATE_FORMAT(k.tanggal_kunjungan, '%Y-%m-%d %H:%i') AS tanggal_kunjungan, 
            k.instansi, k.tanda_tangan, k.tujuan_kunjungan, k.deleted FROM kunjungan AS k 
            WHERE DATE(k.tanggal_kunjungan) = :tanggal_kunjungan
                AND (k.deleted = FALSE OR k.deleted = :status)
            ORDER BY k.tanggal_kunjungan";
        $hasilQuery = DB::select($script, [
            "tanggal_kunjungan" => $date->format("Y-m-d"),
            "status" => $status
        ]);
        
        $result = [];
        foreach($hasilQuery as $hasil) {
            array_push($result, new KunjunganDTO(
                $hasil->id,
                $hasil->tanggal_kunjungan,
                $hasil->nama,
                $hasil->nomor_telepon,
                $hasil->alamat,
                $hasil->instansi,
                $hasil->tanda_tangan,
                $hasil->tujuan_kunjungan,
                boolval($hasil->deleted)
            ));
        }
        return $result;
    }
}

?>