<?php

namespace App;

use Codesleeve\Stapler\ORM\EloquentTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

class BudgetReport extends Eloquent implements StaplerableInterface
{
    use EloquentTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'budget_reports';

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
    protected $fillable = ['name', 'laporan', 'neraca'];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('laporan');

        $this->hasAttachedFile('neraca');

        parent::__construct($attributes);
    }
}
