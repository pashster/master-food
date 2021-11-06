<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static paginate(int $int)
 */
class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'pic', 'price', 'desc', 'restaurant_id'
    ];

    /**
     * @return BelongsTo
     */
    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * @param string|null $pic_path
     * @return string
     */
    public function getPicAttribute(string|null $pic_path): string
    {
        return is_null($pic_path) ? asset('food.jpg') : asset('/storage/' . $pic_path);
    }
}
