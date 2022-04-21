<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SerieRequest;
use App\Models\Episode;

;
use App\Models\Serie;
use App\Models\Session;
use App\Services\SerieCreator;
use App\Services\SerieRemover;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $series = Serie::query()
                    ->orderBy('name')
                    ->get();
        $message = $request->session()->get('message');

        return view('series.index', compact('series', 'message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('series.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SerieRequest $request, SerieCreator $serieCreator)
    {
        $serie = $serieCreator->createSerie(
            $request->name,
            $request->number_session,
            $request->number_episode
        );

        $request->session()
                ->flash(
                    'message',
                    "A série {$serie->name} foi criada com sucesso!"
                );

        return redirect('series');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, SerieRemover $serieRemover)
    {
        $serieName = $serieRemover->serieRemove($request->id);
        $request->session()
        ->flash(
            'message',
            "Série $serieName removida com sucesso!"
        );

        return redirect('/series');
    }

    public function editSerie($id, Request $request)
    {
        $newName = $request->name;
        $serie = Serie::find($id);
        $serie->name = $newName;
        $serie->save();
    }
}
