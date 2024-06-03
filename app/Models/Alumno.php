<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Alumno
 *
 * @property $id
 * @property $usuario_id
 * @property $semestre
 * @property $matricula
 * @property $nivel_academico_id
 * @property $created_at
 * @property $updated_at
 *
 * @property NivelesAcademico $nivelesAcademico
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Alumno extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['usuario_id', 'semestre', 'matricula', 'nivel_academico_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nivelesAcademico()
    {
        return $this->belongsTo(\App\Models\NivelesAcademico::class, 'nivel_academico_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'usuario_id', 'id');
    }
    
}
