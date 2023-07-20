<?php 

namespace App\Core\Repository\Kunjungan\Entity;

use Ramsey\Uuid\Uuid;

class IDKunjungan {

    private string $id;

    public function __construct(?string $id = null)
    {
        if ($id === null) {
            $id = Uuid::uuid4();
        }
        $this->id = $id;
    }

    public function id() : string {
        return $this->id;
    }
}

?>