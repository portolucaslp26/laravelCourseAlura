<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Serie;
use App\Models\Episode;
use Illuminate\Database\Eloquent\Collection;

class Session extends Model
{
    protected $fillable = ['number_session'];

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function series()
    {
        return $this->belongsTo(Serie::class);
    }

    public function getVisualizedEpisodes()
    {
        return $this->episodes->filter(function (Episode $episode) {
            return $episode->visualized;
        });
    }
}
