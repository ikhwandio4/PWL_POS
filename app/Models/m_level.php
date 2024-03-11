<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class m_level extends Model
{
    use HasFactory;
    protected $table = "m_levels";
    protected $primarykey = "level_id";

    public function users(): HasMany
    {
        return $this->hasMany(m_user::class);
    }
}
