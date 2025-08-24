<?php

// app/Models/Contact.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact_messages';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'is_read'
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope untuk mendapatkan pesan yang belum dibaca
     */
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    /**
     * Scope untuk mendapatkan pesan yang sudah dibaca
     */
    public function scopeRead($query)
    {
        return $query->where('is_read', true);
    }

    /**
     * Mark pesan sebagai dibaca
     */
    public function markAsRead()
    {
        $this->update(['is_read' => true]);
    }
}

?>