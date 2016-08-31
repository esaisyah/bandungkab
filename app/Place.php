<?php

namespace App;

use Codesleeve\Stapler\ORM\EloquentTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

class Place extends Eloquent implements StaplerableInterface
{
    use EloquentTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'places';

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
    protected $fillable = ['nama', 'daerah', 'alamat', 'gambar', 'keterangan'];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('gambar', [
            'styles' => [
                'large' => '900x900',
                'medium' => '300x300',
                'thumb' => '100x100'
            ]
        ]);

        parent::__construct($attributes);
    }
}
