<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    // Fields that can be mass assigned
    protected $fillable = [
        'name',
        'email',
        'phone',
        'logo',
    ];

    // Relationship: A branch has many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
