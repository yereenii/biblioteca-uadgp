<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NivelesAcademico
 *
 * @property $id
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Alumno[] $alumnos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class NivelesAcademico extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alumnos()
    {
        return $this->hasMany(\App\Models\Alumno::class, 'id', 'nivel_academico_id');
    }
    
}
