<?php 

namespace App\Application\Command\Login;

class LoginRequest {

    public function __construct(
        public string $username,
        public string $password
    ) {}
}

?>