<?php

namespace App\Http\Controllers;

use App\Application\Command\Logout\LogoutCommand;

class ControllerLogoutAdmin extends Controller
{

    public function logout() {
        $command = new LogoutCommand();
        $command->execute();

        return redirect()->route("halaman login");
    }
}
