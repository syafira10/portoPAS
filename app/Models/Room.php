<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable =[
        'name','description', 'harga','status','pemesan','No_hp', 'email', 'tgl_chek_in', 'tgl_check_out'
    ];
}
