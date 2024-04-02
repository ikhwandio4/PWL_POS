<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class m_user extends Model
{
    use HasFactory;
    protected $table = 'm_users';
    protected $primaryKey = 'user_id';
    public $timestamps = false;


    //protected $fillable = ['level_id','username','nama','password'];
    protected $fillable = [ 'level_id', 'username', 'nama', 'password'];

   

    public function level(): BelongsTo
    {
        return $this->belongsTo(m_level::class, 'level_id', 'level_id');
    }
}
