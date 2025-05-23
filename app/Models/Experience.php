<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'profession',
        'company_logotype',
        'company_name',
        'tasks',
        'start_date',
        'end_date',
        'user_id',
    ]; 

    public function user(){
        return $this->belongsTo(User::class);
    }

}
