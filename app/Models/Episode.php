<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Serie;
use App\Models\Session;

class Episode extends Model
{
    protected $fillable = ['number_episode'];

    public function sessions()
    {
        return $this->belongsTo(Serie::class);
    }
}
