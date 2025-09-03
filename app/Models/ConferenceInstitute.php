<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConferenceInstitute extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    public function conference(): BelongsTo
    {
        return $this->belongsTo(Conference::class);
    }

    public function institute(): BelongsTo
    {
        return $this->belongsTo(Institute::class);
    }
}
