<?php

namespace App\Services;
use App\Models\{Serie, Session, Episode};
use Illuminate\Support\Facades\DB;

class SerieRemover
{
    public function serieRemove(int $serieId) : string
    {
        $serieName = '';

        DB::transaction(function() use ($serieId, &$serieName){
            $serie = Serie::find($serieId);
            $serieName = $serie->name;
            $serie->sessions->each(function (Session $session) {
                $session->episodes()->each(function (Episode $episode) {
                    $episode->delete();
                });
                $session->delete();
            });
            $serie->delete();
        });

        return $serieName;
    }
}
