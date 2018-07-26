<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * 
 * @author Imadedine Jerbi <contact@imadedinejerbi.com>
 * 
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function orders(){
        
        return $this->hasMany('App\Order', 'user_uuid', 'uuid');
    }
    
    public static function getRandumUUID(){
        
        $usersUUIDs = User::all('uuid')->toArray();
        $userUUID = reset($usersUUIDs[array_rand($usersUUIDs)]);
        
        return $userUUID;
    }

}
