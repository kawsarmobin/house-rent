<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class HouseInfo extends Model
{
    const STATUS = [
        'Deactive' => 0,
        'Active' => 1,
    ];

    const IS_APPROVED = [
        'Unapproved' => 0,
        'Approved' => 1,
    ];

    protected $fillable = [
        'user_id', 'house_type_id', 'title', 'house_address', 'house_token', 'status', 'approved',
    ];

    protected $appends = [
        'approval'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function houseType()
    {
        return $this->belongsTo(HouseType::class);
    }

    public function getApprovalAttribute()
    {
        return array_search($this->approved,self::IS_APPROVED);
    }
}
