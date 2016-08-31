<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'agendas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nama', 'tanggal', 'content'];

//--MUTATORS -------------------------------------------------------------

    public function setTanggalAttribute($val)
    {
        $this->attributes['tanggal'] = Carbon::createFromFormat('d/m/Y', $val);
    }

//--ACCESSOR ---------------------------------------------------------------

    public function getTanggalAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['tanggal'])->format('d/m/Y');
    }

    public function getTanggalRawAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['tanggal']);
    }
}
