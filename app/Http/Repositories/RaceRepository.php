<?php

namespace App\Http\Repositories;

use App\Interface\RaceRepositoryInterface;
use App\Models\Race;

class RaceRepository implements RaceRepositoryInterface{

    public function getAll(){
        return Race::all();
    }

    public function create(array $data){
        return Race::create($data);
    }
}

?>
