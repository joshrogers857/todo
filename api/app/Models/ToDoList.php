<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ToDoList extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(ToDoItem::class);
    }
}
