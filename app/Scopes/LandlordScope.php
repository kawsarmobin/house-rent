<?php 
namespace App\Scopes;

use App\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;

class LandlordScope implements Scope 
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('user_role', array_search('Landlord', User::USER_ROLE));
    }
}