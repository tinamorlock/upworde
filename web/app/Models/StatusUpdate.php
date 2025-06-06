<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusUpdate extends Model
    {
    use HasFactory;

    protected $fillable = [
        'upword_id', 'message', 'posted_at',
    ];

    public function upword()
    {
        return $this->belongsTo(Upword::class);
    }
}
