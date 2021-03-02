<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @package App\Models
 */
class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'quantity',
    ];
}
