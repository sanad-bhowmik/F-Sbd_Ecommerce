<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveLaterProduct extends Model
{
    use HasFactory;

    protected $table = 'save_later_product';

    protected $fillable = [
        'user_id',
        'product_id',
        'status',
    ];

    public $timestamps = false;

    /**
     * Relationship with the User model
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with the Product model
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
