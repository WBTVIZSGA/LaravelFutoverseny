<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tavok extends Model
{
    use HasFactory;
    protected $table ='tavok';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function versenyTav(): BelongsTo
    {
        return $this->belongsTo(Versenyzok::class, 'tavokId');
    }
}
