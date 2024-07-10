<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    protected $table = 'collections';
    protected $fillable = ['name'];
    public function items()
        {
            return $this->belongsToMany(Item::class);
        } 

}
