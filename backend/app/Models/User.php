<?php

namespace App\Models;

use App\Enums\RoleEnums;
use Illuminate\Support\Str;
use denis660\Centrifugo\Centrifugo;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use App\Services\Tokens\Contracts\HasApiToken;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * @property int                  $id
 * @property string               $email
 * @property string               $password
 * @property string               $api_token
 * @property \App\Enums\RoleEnums $role
 */
class User extends Model implements HasApiToken, AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use HasFactory;
    use Notifiable;
    use Authenticatable;
    use Authorizable;
    use CanResetPassword;

    protected $fillable = [
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value instanceof RoleEnums ? $value : RoleEnums::from($value),
        );
    }

    protected function password(): Attribute
    {
        return Attribute::set(fn($value) => Hash::make($value));
    }

    public function generateCentrifugoToken(): string
    {
        /** @var Centrifugo $centrifugo */
        $centrifugo = resolve(Centrifugo::class);

        return $centrifugo->generateConnectionToken((string)$this->id);
    }

    public function columnName(): string
    {
        return 'api_token';
    }

    public function generateApiToken(): string
    {
        return Str::random(60);
    }
}
