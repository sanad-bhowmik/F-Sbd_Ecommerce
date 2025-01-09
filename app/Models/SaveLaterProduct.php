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

    // If timestamps are used but have custom column names
    // protected const CREATED_AT = 'created_at';
    // protected const UPDATED_AT = 'updated_at';
}
