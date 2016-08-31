<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menu_items';

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
    protected $fillable = ['nama', 'url', 'fa_icon', 'urutan', 'menu_id', 'parent_id'];

    public static function getArrayForSelect()
    {
        $array = [];
        $options = [];
        $parents = MenuItem::where('menu_id', '<>', 'menu_superadmin')
            ->where('parent_id', 0)
            ->orderBy('nama')->get();

        foreach($parents as $parent){
            $options[0] = 'PILIH';
            $options[$parent->id] = $parent->nama;
            foreach($parent->childs as $child){
                $options[$child->id] = '-' . $child->nama;
            }
        }

        return $options;
    }

    public static function getMenuGroups()
    {
        $groups = DB::table('menu_items')->select('menu_id')
            ->where('menu_id', '<>', 'menu_superadmin')
            ->distinct()->orderBy('menu_id', 'desc')
            ->lists('menu_id', 'menu_id');
        return $groups;
    }


    public function childs(){
        return $this->hasMany('App\MenuItem', 'parent_id', 'id');
    }

    public function parent(){
        return $this->belongsTo('App\MenuItem', 'parent_id');
    }

}
