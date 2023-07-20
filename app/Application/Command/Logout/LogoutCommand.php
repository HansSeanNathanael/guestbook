<?php 

namespace App\Application\Command\Logout;

use Illuminate\Support\Facades\Auth;

class LogoutCommand {
    
    public function execute() {
        Auth::logout();
    }
}

?>