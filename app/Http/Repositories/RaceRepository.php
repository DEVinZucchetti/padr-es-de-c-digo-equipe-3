<?php 

namespace App\Http\Repositories;

use App\Models\Race;

class RaceRepository{

    public function getAll(){
        return Race::all();
    }

    public function create(array $data){
        return Race::create($data);
    }

}