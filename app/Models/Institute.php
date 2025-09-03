<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Institute extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getLogo()
    {
        if ($this->logo !== null) {
            return env('APP_URL').'/storage/'.$this->logo;
        }

        return env('APP_URL').'/images/institute_logo.jpg';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($institute) {
            if (Auth::check()) {
                $institute->user_id = Auth::id();
            }
        });
    }
}
