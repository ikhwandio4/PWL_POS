<?php

namespace App\Models;

use ILLuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;


class m_user extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use AuthenticatableTrait;
    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return[];
    }
   

    protected $table = 'm_users';
    protected $primaryKey = 'user_id';

    protected $fillable =[
        'username',
        'nama',
        'password',
        'level_id',
        'image',

    ];

    // @var array
 //   protected $fillable = ['level_id', 'username', 'nama', 'password', 'image'];
    // protected $fillable = ['level_id', 'username', 'nama'];

    public function level(): BelongsTo{
        return $this->belongsTo(m_level::class, 'level_id', 'level_id');
    }

    protected function image():Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/strorage/posts' . $image),
        );
       
    }
}