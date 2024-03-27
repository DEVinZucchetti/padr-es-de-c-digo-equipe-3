<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\RaceRepository;
use App\Models\Race;
use App\Traits\HttpResponses;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RaceController extends Controller
{
    use HttpResponses;

    private $raceRepository;

    public function __construct(RaceRepository $raceRepository) { 
        $this->raceRepository = $raceRepository;       
    }

    // Lista todos ou parcialmente os dados de um recurso
    public function index() {
        $races = $this->raceRepository->getAll();
        return $races;
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|unique:races|max:50'
            ]);

            $body = $request->all();

            $race = $this->raceRepository->create($body);

            return $race;
        } catch (Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

}
