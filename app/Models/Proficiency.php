<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Proficiency extends Model
{
    protected $fillable = [
        'name',
        'type',
        'origin',
        'description'
    ];

    public function proficienttable(): MorphTo
    {
        return $this->morphTo();
    }

    public static $rules = [
        'name' => 'required|string|max:255',
        'type' => 'required|string|in:weapon,language,tool,armor,skill',
        'origin' => 'nullable|string|max:255',
        'description' => 'nullable|string',
    ];

}
