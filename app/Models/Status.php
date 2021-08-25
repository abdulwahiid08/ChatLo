<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    //Membuat fillabel
    protected $fillable = ['body', 'identifier'];

    // N+1 Problem
    protected $with = ['author'];

    // Membuat relasi user status
    // karena status itu hanya dimiliki satu user
    // maka syntax nya adalah belongsTo
    public function author()
    {
        // Karna nama methodnya author, maka kita harus mengInisialisasi user_id
        // supaya yang dituju itu adalah si user id nya.
        return $this->belongsTo(User::class, 'user_id');
    }

}
