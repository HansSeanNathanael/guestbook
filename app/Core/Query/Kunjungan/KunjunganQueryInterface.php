<?php 

namespace App\Core\Query\Kunjungan;

use DateTime;

interface KunjunganQueryInterface {

    /**
     * @return KunjunganDTO[]
     */
    public function byDateDanStatus(DateTime $date, bool $status) : array;
}

?>