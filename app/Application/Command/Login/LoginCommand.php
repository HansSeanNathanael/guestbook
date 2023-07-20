<?php 

namespace App\Application\Command\Login;

use Exception;
use Illuminate\Support\Facades\Auth;

class LoginCommand {
    
    public function execute(LoginRequest $request) {
        $autentikasi = Auth::attempt([
            "username" => $request->username,
            "password" => $request->password
        ]);
        if (! $autentikasi) {
            throw new Exception("akun salah");
        }
    }
}

?>