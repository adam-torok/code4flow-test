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
    const STATUS_RESOLVED = 'RESOLVED';
    const STATUS_DECLINED = 'DECLINED';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function response(){
        return $this->hasOne(ReportResponse::class, 'report_id');
    }

    public function isResolved(){
        return $this->status === self::STATUS_RESOLVED;
    }

    public function isWaiting(){
        return $this->status === self::STATUS_WAITING;
    }

    public function isDeclined(){
        return $this->status === self::STATUS_DECLINED;
    }

    public function getSubmittedDate(){
        return $this->created_at->diffForHumans();
    }

    public function getModificationDate(){
        return $this->updated_at->diffForHumans();
    }

    public function setResolved(){
        return $this->status = self::STATUS_RESOLVED;
    }

    public function setWaiting(){
        return $this->status = self::STATUS_WAITING;
    }

    public function setDeclined(){
        return $this->status = self::STATUS_DECLINED;
    }

    public function getStatus(){
        if($this->isDeclined()){
            return 'Elutasítva';
        }
        if($this->isWaiting()){
            return 'Várakozik';
        }
        if($this->isResolved()){
            return 'Javítva';
        }
    }

    public function getStatusTemplated(){
        if($this->isDeclined()){
            return '<span class="badge bg-danger">Elutasítva</span>';
        }
        if($this->isWaiting()){
            return '<span class="badge bg-warning">Várakozik</span>';
        }
        if($this->isResolved()){
            return '<span class="badge bg-success">Javítva</span>';
        }
    }

}
