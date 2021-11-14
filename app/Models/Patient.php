<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['address','age','user_id'];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
