<?php

namespace App\Interface;

use App\Models\Pet;
use App\Models\Race;

interface PetRepositoryInterface{
    public function create(array $data);
    public function getOne($id);
    public function updateOne(Pet $pet, $id);

}
?>
