<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeMine($query)
    {
        return $query->where('creator_id', auth()->id());
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    public function scopeUnPublished($query)
    {
        return $query->whereNull('published_at');
    }

    public function scopeExpired($query)
    {
        return $query->where('end_at', '<', now());
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_conferences');
    }

    public function organizers()
    {
        return $this->belongsToMany(Institute::class, 'conference_institutes');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }

    protected function casts()
    {
        return [
            'start_at' => 'timestamp',
            'end_at' => 'timestamp',
            'published_at' => 'timestamp',
            'featured_at' => 'timestamp',
        ];
    }

    public function daysLeft()
    {
        return round(now()->diffInDays(Carbon::parse($this->start_at)));
    }

    public function link()
    {
        return route('conferences.show', $this->uuid);
    }
}
