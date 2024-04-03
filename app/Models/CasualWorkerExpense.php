<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasualWorkerExpense extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function casualWorker()
    {
        return $this->belongsTo(CasualWorker::class, 'casual_worker_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
