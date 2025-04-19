<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username', 'first_name', 'last_name', 'email', 'password',
        'phone', 'st_address_1', 'st_address_2', 'city', 'state', 'country', 'zip',
        'web_url', 'ig_url', 'fb_url', 'x_url', 'substack_url', 'tiktok_url',
        'amazon_url', 'pin_url', 'medium_url', 'youtube_url',
        'writer_type', 'bio', 'role_id',
    ];

    protected $hidden = ['password', 'remember_token'];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function upwords()
    {
        return $this->hasMany(Upword::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
