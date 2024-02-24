<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'dapodik';
    protected $primaryKey = 'id'; // Ensure you have an 'id' field or change this to your primary key
    protected $allowedFields = [
        // List all fields you wish to make fillable
        'ta', 'is_active', 'peserta_didik_id', 'nama', // Continue with all other fields
    ];
    protected $returnType     = 'array';
    protected $useTimestamps = false; // Set to true if you have created_at & updated_at fields
}
