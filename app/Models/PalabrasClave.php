<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PalabrasClave
 *
 * @property $id
 * @property $palabra
 * @property $created_at
 * @property $updated_at
 *
 * @property PalabrasClaveDocumento[] $palabrasClaveDocumentos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PalabrasClave extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['palabra'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function palabrasClaveDocumentos()
    {
        return $this->hasMany(\App\Models\PalabrasClaveDocumento::class, 'id', 'palabra_clave_id');
    }
    
}
