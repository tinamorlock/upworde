<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upword extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'description', 'word_count',
        'status', 'submitted_at', 'completed_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }

    public function statusUpdates()
    {
        return $this->hasMany(StatusUpdate::class);
    }
}
