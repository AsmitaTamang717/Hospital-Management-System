<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable =['slug','title','image','content'];
    protected $casts = [
        'title' => 'json',
        'content' => 'json',
    ];
    public function menu(){
        return $this->hasOne(Menu::class);
    }
}
