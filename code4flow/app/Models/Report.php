<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'user_id',
    ];

    const STATUS_WAITING = 'WAITING';
    const STATUS_APPROVED = 'APPROVED';
    const STATUS_DECLINED = 'DECLINED';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function response(){
        return $this->hasMany(ReportResponse::class);
    }

    public function isApproved(){
        return $this->status === self::STATUS_APPROVED;
    }

    public function isWaiting(){
        return $this->status === self::STATUS_WAITING;
    }

    public function isDeclined(){
        return $this->status === self::STATUS_DECLINED;
    }
}
