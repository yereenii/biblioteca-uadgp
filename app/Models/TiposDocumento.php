<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TiposDocumento
 *
 * @property $id
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Documento[] $documentos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TiposDocumento extends Model
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
    public function documentos()
    {
        return $this->hasMany(\App\Models\Documento::class, 'id', 'tipo_documento_id');
    }
    
}
