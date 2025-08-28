<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminActivityLog extends Model
{
    use HasFactory;

    public $timestamps = false; // using created_at only

    protected $fillable = [
        'admin_id','action','ip_address','user_agent'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}