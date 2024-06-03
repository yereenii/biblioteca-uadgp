<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PalabrasClaveDocumento
 *
 * @property $documento_id
 * @property $palabra_clave_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Documento $documento
 * @property PalabrasClafe $palabrasClafe
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PalabrasClaveDocumento extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['documento_id', 'palabra_clave_id'];


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
    public function palabrasClafe()
    {
        return $this->belongsTo(\App\Models\PalabrasClafe::class, 'palabra_clave_id', 'id');
    }
    
}
