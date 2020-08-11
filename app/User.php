<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role')->using(UserRole::class);
    }

    public function hasRole($role)
    {
        return $this->roles()->where('code', $role)->exists();
    }

    public function assignRoles($roles)
    {
        $newRoles = Role::whereIn('code', $roles)->pluck('id')->toArray();
        $this->roles()->syncWithoutDetaching($newRoles);
    }

    public function sendEmailVerificationNotification()
    {
        VerifyEmail::toMailUsing(static function ($notifiable, $verificationUrl) {
            return (new MailMessage)
                ->subject('Ověření emailové adresy')
                ->line('Pro ověření Vaší emailové adresy stiskněte tlačítko níže.')
                ->action('Ověřit emailovou adresu', $verificationUrl)
                ->line('Pokud jste nevytvářeli uživatelský účet, není nutná žádná další akce.');
        });
    }
}
