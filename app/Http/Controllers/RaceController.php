<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\RaceRepository;
use App\Http\Services\Race\CreateRaceService;
use App\Http\Services\Race\GetAllRacesService;
use App\Models\Race;
use App\Traits\HttpResponses;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class RaceController extends Controller
{
    use HttpResponses;
    private $raceRepository;

    public function __construct(RaceRepository $raceRepository) {
        $this->raceRepository = $raceRepository;
    }
    // Lista todos ou parcialmente os dados de um recurso
    public function index(GetAllRacesService $getAllRacesService) {
        $races = $getAllRacesService->handle();
        return $races;
    }

    public function store(Request $request, CreateRaceService $createRaceService)
    {
        try {

            $data = $request->all();
            $race = $createRaceService->handle($data);

            return $race;
        } catch (Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

}
