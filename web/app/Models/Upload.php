<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $fillable = [
        'upword_id', 'filename', 'path', 'word_count',
    ];

    public function upword()
    {
        return $this->belongsTo(Upword::class);
    }
}
