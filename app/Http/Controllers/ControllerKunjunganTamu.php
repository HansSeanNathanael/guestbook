<?php

namespace App\Http\Controllers;

use App\Application\Command\Kunjungan\BuatKunjunganBaru\BuatKunjunganBaruCommand;
use App\Application\Command\Kunjungan\BuatKunjunganBaru\BuatKunjunganBaruRequest;
use App\Core\Repository\Kunjungan\RepositoryKunjunganInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ControllerKunjunganTamu extends Controller
{
    public function halamanKunjunganBaru() {
        return view("publik.kunjungan");
    }

    public function kunjunganBaru(Request $request, RepositoryKunjunganInterface $repositoryKunjungan) {
        $validasi = Validator::make($request->post(), [
            "nama" => ["required"],
            "nomor_telepon" => ["required"],
            "alamat" => [],
            "tujuan_kunjungan" => [],
            "tanda_tangan" => []
        ], [
            "nama.required" => "nama kosong",
            "nomor_telepon.required" => "nomor telepon kosong",
            "alamat.required" => "alamat kosong",
            "tujuan_kunjungan.required" => "tujuan kunjungan kosong",
            "tanda_tangan.required" => "tanda tangan kosong",
        ]);

        if ($validasi->fails()) {
            return Redirect::back()->withErrors($validasi->errors()->first());
        }

        $requestKunjunganBaru = new BuatKunjunganBaruRequest(
            $request->post("nama"),
            $request->post("nomor_telepon"),
            $request->post("alamat"),
            $request->post("instansi"),
            $request->post("tanda_tangan"),
            null,
            $request->post("tujuan_kunjungan")
        );

        try {
            $command = new BuatKunjunganBaruCommand();
            $command->execute($requestKunjunganBaru, $repositoryKunjungan);
            return redirect()->route("halaman kunjungan tamu");
        }
        catch(Exception $e) {
            return Redirect::back()->withErrors($e->getMessage());
        }
    }
}
