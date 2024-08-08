<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Gift extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'take_by',
        'take_at',
        'status',
    ];

    /**
     * The brands that belong to the subbrands.
     */
    public function author(): HasOne
    {
        return $this->HasOne(User::class);
    }
}
