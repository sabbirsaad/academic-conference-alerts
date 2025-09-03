<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_newsletter_subscribers');
    }

    protected function casts()
    {
        return [
            'email_verified_at' => 'timestamp',
            'unsubscribed_at' => 'timestamp',
        ];
    }
}
