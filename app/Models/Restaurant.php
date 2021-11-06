<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static paginate(int $int)
 */
class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'image', 'desc'
    ];

    /**
     * @return HasMany
     */
    public function foods(): HasMany
    {
        return $this->hasMany(Food::class);
    }

    /**
     * @param string|null $image_path
     * @return string
     */
    public function getImageAttribute(string|null $image_path): string
    {
        return is_null($image_path) ? asset('res.png') : asset('/storage/' . $image_path);
    }
}
