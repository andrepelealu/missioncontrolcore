<?php namespace Eyeweb\MissionControl\Modules\Users\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Karl456\Presenter\Traits\PresentableTrait;
use Eyeweb\MissionControl\Modules\Users\Notifications\ResetPassword;
use Eyeweb\MissionControl\Modules\Usergroups\Models\Usergroup;

/**
 * Class User
 * @package Eyeweb\MissionControl\Modules\Users\Models
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable;
    use Authorizable;
    use CanResetPassword;
    use SoftDeletes;
    use PresentableTrait;
    use Notifiable;

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'usergroup_id'
    ];

    /**
     * Usergroup relation
     * @return mixed
     */
    public function usergroup()
    {
        return $this->belongsTo(Usergroup::class, 'usergroup_id');
    }

    /**
     * @var string
     */
    protected $presenter = 'Eyeweb\MissionControl\Modules\Users\Presenters\UserPresenter';

    /**
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

}
