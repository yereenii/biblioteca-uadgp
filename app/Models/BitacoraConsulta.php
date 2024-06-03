<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BitacoraConsulta
 *
 * @property $id
 * @property $documento_id
 * @property $usuario_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Documento $documento
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BitacoraConsulta extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['documento_id', 'usuario_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function documento()
    {
        return $this->belongsTo(\App\Models\Documento::class, 'documento_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'usuario_id', 'id');
    }
    
}
