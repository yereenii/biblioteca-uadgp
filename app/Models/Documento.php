<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Documento
 *
 * @property $id
 * @property $autor_id
 * @property $titulo
 * @property $editorial
 * @property $descripcion
 * @property $tipo_documento_id
 * @property $fecha_publicacion
 * @property $archivo_documento
 * @property $portada_documento
 * @property $created_at
 * @property $updated_at
 *
 * @property Autore $autore
 * @property TiposDocumento $tiposDocumento
 * @property BitacoraConsulta[] $bitacoraConsultas
 * @property PalabrasClaveDocumento[] $palabrasClaveDocumentos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Documento extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['autor_id', 'titulo', 'editorial', 'descripcion', 'tipo_documento_id', 'fecha_publicacion', 'archivo_documento', 'portada_documento'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function autore()
    {
        return $this->belongsTo(\App\Models\Autore::class, 'autor_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiposDocumento()
    {
        return $this->belongsTo(\App\Models\TiposDocumento::class, 'tipo_documento_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bitacoraConsultas()
    {
        return $this->hasMany(\App\Models\BitacoraConsulta::class, 'id', 'documento_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function palabrasClaveDocumentos()
    {
        return $this->hasMany(\App\Models\PalabrasClaveDocumento::class, 'id', 'documento_id');
    }
    
}
