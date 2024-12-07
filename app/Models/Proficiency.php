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

    /**
     * Get the parent proficienttable model (Weapon, Language, etc.).
     */
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

    public function scopeWeapons($query)
    {
        return $query->where('type', 'weapon');
    }

    public function scopeLanguages($query)
    {
        return $query->where('type', 'language');
    }
}
