<?php

namespace App;

use App\Models\UserRole;
use App\Models\UserPersonalInfo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /* set status */
    const ACTIVE = true;
    const DEACTIVE = false;

    /* set admin */
    const ADMIN = true;
    const REGULER_USER = false;

    /* set admin */
    const VERIFIED = true;
    const UNVERIFIED = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_role_id', 'status', 'is_admin', 'is_verified',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_role()
    {
        return $this->belongsTo(UserRole::class);
    }

    public function userPersonalInfo()
    {
        return $this->hasOne(UserPersonalInfo::class);
    }

    protected $appends = [
        'admin_or_not', 'user_status', 'verified'
    ];

    protected function getAdminOrNotAttribute()
    {
        if ($this->is_admin == 0) {
            return 'REGULER USER';
        } elseif($this->is_admin == 1) {
            return 'ADMIN';
        } else {
            return '';
        }
    }

    protected function getUserStatusAttribute()
    {
        if ($this->status == 0) {
            return 'DEACTIVE';
        } elseif($this->status == 1) {
            return 'ACTIVE';
        } else {
            return '';
        }
    }

    protected function getVerifiedAttribute()
    {
        if ($this->is_verified == 0) {
            return 'UNVERIFIED';
        } elseif($this->is_verified == 1) {
            return 'VERIFIED';
        } else {
            return '';
        }
    }
}
