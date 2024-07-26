<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ToDoItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'to_do_list_id',
        'content',
        'is_complete',
    ];

    public function list(): BelongsTo
    {
        return $this->belongsTo(ToDoList::class);
    }
}
