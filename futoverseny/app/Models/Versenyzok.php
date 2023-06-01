<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Versenyzok extends Model
{
    use HasFactory;

    protected $table = 'versenyzok';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function versenyzoTav(): HasMany
    {
        return $this->hasMany(Tavok::class, 'tavokId');
    }
}
