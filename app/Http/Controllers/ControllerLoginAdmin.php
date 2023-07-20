<?php

namespace App\Http\Controllers;

use App\Application\Command\Login\LoginCommand;
use App\Application\Command\Login\LoginRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ControllerLoginAdmin extends Controller
{
    public function halamanLogin() {
        return view("login");
    }

    public function login(Request $request) {
        $validasi = Validator::make($request->post(), [
            "username" => ["required"],
            "password" => ["required"],
        ], [
            "username.required" => "username null",
            "password.required" => "password null",
        ]);

        
        if ($validasi->fails()) {
            return Redirect::back()->withErrors($validasi->errors()->first());
        }

        $requestLogin = new LoginRequest(
            $request->post("username"),
            $request->post("password")
        );

        try {
            $command = new LoginCommand();
            $command->execute($requestLogin);
            return redirect()->route("halaman daftar kunjungan");
        }
        catch(Exception $e) {
            return Redirect::back()->withErrors($e->getMessage());
        }
    }
}
