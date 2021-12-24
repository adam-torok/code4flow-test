<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'report_id',
    ];

    public function report(){
        return $this->belongsTo(Report::class);
    }
}
