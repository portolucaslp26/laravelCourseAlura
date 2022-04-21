<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Session;

class Serie extends Model
{
    protected $table = 'series';

    protected $fillable = ['name'];

    public $timestamp = false;

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
