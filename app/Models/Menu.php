<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable =['display_order',	'menu_type_id',	'parent_id','module_id',	'page_id',	'menu_name',	'external_link'	,'status'];
    protected $casts =[
        'menu_name' => 'json'
    ];

    public function module(){
        return $this->belongsTo(Module::class);
    }
    public function page(){
        return $this->belongsTo(Page::class);
    }
}
