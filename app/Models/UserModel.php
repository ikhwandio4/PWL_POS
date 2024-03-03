<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'm_users';  //mendifiniiskan nama tabel yang digunakan oleh model ini
    protected $primaryKey ='user_id'; //mendefinisikan primary key dari nama tabel yang digunakan
}
