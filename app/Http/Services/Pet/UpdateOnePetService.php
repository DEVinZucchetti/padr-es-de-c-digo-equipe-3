<?php
namespace App\Http\Services\Pet;

use App\Http\Repositories\PetRepository;
use ErrorException;

class UpdateOnePetService {

    private $petRepository;

    public function __construct(PetRepository $petRepository) {
        $this->petRepository = $petRepository;
    }


    public function handle($id, $data){
        $pet =  $this->petRepository->getOne($id);
        if (!$pet) throw new ErrorException('Pet não encontrado');
        return $this->petRepository->updateOne($pet, $data);
    }
}

?>
