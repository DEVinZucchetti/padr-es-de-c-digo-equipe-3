<?php

namespace App\Interface;

use App\Models\Race;

interface RaceRepositoryInterface{
    public function getAll();
    public function create(array $data);
}
?>
