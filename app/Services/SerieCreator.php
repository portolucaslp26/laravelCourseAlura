<?php

namespace App\Services;
use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class SerieCreator
{
    public function createSerie(
        string $serieName,
        int $numTemp,
        int $numEpisode
    ) : Serie {
        DB::beginTransaction();

        $serie = Serie::create(['name' => $serieName]);
        for($i = 1; $i <= $numTemp; $i ++) {
            $session = $serie->sessions()->create(['number_session' => $i]);

            for($j = 1; $j <= $numEpisode; $j++) {
                $session->episodes()->create(['number_episode' => $j]);
            }
        }
        DB::commit();

        return $serie;
    }
}
