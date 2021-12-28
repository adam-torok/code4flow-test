<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'is_published',
        'category_id',
        'user_id',
    ];

    const STATUS_WAITING = 'WAITING';
    const STATUS_APPROVED = 'APPROVED';
    const STATUS_DECLINED = 'DECLINED';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function setApproved(){
        return $this->status = self::STATUS_APPROVED;
    }

    public function setWaiting(){
        return $this->status = self::STATUS_WAITING;
    }

    public function setDeclined(){
        return $this->status = self::STATUS_DECLINED;
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

    public function getStatus(){
        if($this->isDeclined()){
            return 'Elutasítva';
        }
        if($this->isWaiting()){
            return 'Várakozik';
        }
        if($this->isApproved()){
            return 'Engedélyezve';
        }
    }

    public function getStatusTemplated(){
        if($this->isDeclined()){
            return '<span class="right badge badge-danger">Elutasítva</span>';
        }
        if($this->isWaiting()){
            return '<span class="right badge badge-warning">Várakozik</span>';
        }
        if($this->isApproved()){
            return '<span class="right badge badge-success">Engedélyezve</span>';
        }
    }

    public function getSubmittedDate(){
        return $this->created_at->diffForHumans();
    }

    public function getModificationDate(){
        return $this->updated_at->diffForHumans();
    }
}
