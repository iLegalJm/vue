<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    /* 
     *La propiedad "protegida $ oculta" en el modelo "Usuario" se utiliza para especificar qué
     *atributos deben ocultarse cuando se serializa el modelo. En este caso, los atributos
     *`contraseña` y `recordar_token` están marcados como ocultos, lo que significa que no se
     *incluirán en la representación JSON del modelo cuando se devuelva como respuesta. Esto se hace
     *comúnmente por razones de seguridad, ya que la información confidencial, como las contraseñas,
     *no debe exponerse en las respuestas de la API. 
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}