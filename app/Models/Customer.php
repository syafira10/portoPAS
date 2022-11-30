<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable =[
        'nama','orderan', 'email','no_hp', 'tgl_chek_in', 'tgl_chek_out'
    ];
}
