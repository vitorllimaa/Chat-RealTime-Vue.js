<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['body'];
    protected $appends  = ['owner'];

    public function getOwnerAttribute() {

        return $this->user_id == auth()->user()->id;
    }

    public function getCreatedAtAttribute($value)
 {
     return date("d/m/Y H:i:s", strtotime($value));
 }

    public function user() {

        return $this->belongsTo(User::class);
    }
}
