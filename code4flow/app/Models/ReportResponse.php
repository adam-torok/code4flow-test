<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportResponse extends Model
{
    use HasFactory;

    protected $table = 'report_responses';

    protected $fillable = [
        'text',
        'report_id',
    ];

    public function report(){
        return $this->belongsTo(Report::class);
    }

    public function getSubmittedDate(){
        return $this->created_at->diffForHumans();
    }
}
