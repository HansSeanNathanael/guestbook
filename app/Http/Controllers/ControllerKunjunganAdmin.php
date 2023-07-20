<?php

namespace App\Http\Controllers;

use App\Application\Command\Kunjungan\BuatKunjunganBaru\BuatKunjunganBaruCommand;
use App\Application\Command\Kunjungan\BuatKunjunganBaru\BuatKunjunganBaruRequest;
use App\Application\Command\Kunjungan\UbahStatusKunjungan\UbahStatusKunjunganCommand;
use App\Application\Command\Kunjungan\UbahStatusKunjungan\UbahStatusKunjunganRequest;
use App\Core\Query\Kunjungan\KunjunganQueryInterface;
use App\Core\Repository\Kunjungan\RepositoryKunjunganInterface;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ControllerKunjunganAdmin extends Controller
{
    public function halamanDaftarKunjungan(Request $request, KunjunganQueryInterface $kunjunganQuery) {
        $tanggal = $request->get("tanggal");
        $showDeleted = $request->get("show_deleted");

        if ($tanggal === null) {
            $tanggalSekarang = new DateTime("now");
            $daftarTamu = [];
            $daftarTamu = $kunjunganQuery->byDateDanStatus($tanggalSekarang, $showDeleted === "true");
            return view("admin.daftar_kunjungan", [
                "showDeleted" => $showDeleted,
                "daftarTamu" => $daftarTamu,
                "tanggal" => $tanggalSekarang->format("Y-m-d")
            ]);
        }
        else {
            $daftarTamu = $kunjunganQuery->byDateDanStatus(DateTime::createFromFormat("Y-m-d", $tanggal), $showDeleted === "true");
            return view("admin.daftar_kunjungan", [
                "showDeleted" => $showDeleted,
                "daftarTamu" => $daftarTamu,
                "tanggal" => $tanggal
            ]);
        }
    }

    public function ubahStatus(Request $request, RepositoryKunjunganInterface $repositoryKunjungan) {
        $idKunjungan = $request->post("id");
        $status = $request->post("status");

        if ($idKunjungan !== null && ($status !== "restore" || $status !== "delete")) {
            try {
                $requestUbahStatusKunjungan = new UbahStatusKunjunganRequest(
                    $idKunjungan,
                    $status === "delete"
                );
                $command = new UbahStatusKunjunganCommand();
                $command->execute($requestUbahStatusKunjungan, $repositoryKunjungan);
            }
            catch(Exception $e){}
        }
        return Redirect::back();
    }
}
