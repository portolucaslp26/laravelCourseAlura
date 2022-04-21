<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Session;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Session $session, Request $request)
    {
       return view('episodes.index', [
           'episodes' => $session->episodes,
           'sessionId' => $session->id,
           'message' => $request->session()->get('message')
       ]);
    }

    public function toView(Session $session, Request $request)
    {
        $visualizedEpisodes = $request->episodes;
        $session->episodes->each(function (Episode $episode) use ($visualizedEpisodes) {
            $episode->visualized = in_array($episode->id, $visualizedEpisodes);
        });
        $session->push();
        $request->session()->flash('message', 'Episódios marcados como assistidos');

        return redirect()->back();

    }
}
