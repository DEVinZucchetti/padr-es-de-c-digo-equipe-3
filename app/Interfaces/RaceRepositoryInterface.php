<?php 
namespace App\Interfaces;

use App\Models\Race;

interface RaceRepositoryInterface{
    public function getAll();
    public function create(array $data):Race;   

}