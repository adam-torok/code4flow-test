<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'email',
        'zip',
        'county',
        'city',
        'second_name',
        'first_name',
        'title',
        'education',
        'note',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function poems(){
        return $this->hasMany(Poem::class);
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }

    public function getName(){
        return $this->first_name . ' ' . $this->second_name;
    }

    public function getRegistrationDate(){
        return $this->created_at->diffForHumans();
    }

    public function getVerificationDate(){
        return $this->verified_at->diffForHumans();
    }

    public function getModificationDate(){
        return $this->updated_at->diffForHumans();
    }

    public function isDisabled(){
        return $this->is_disabled;
    }

    public function getStatusTemplated(){
        if($this->isDisabled()){
            return '<span class="right badge badge-danger">Felfüggesztve</span>';
        }else{
            return '<span class="right badge badge-success">Engedélyezett</span>';
        }
    }
}
