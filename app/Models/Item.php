<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table= 'items';
    protected $fillable = ['name', 'description', 'img', 'price', 'category_id'];
        public function category()
            {
            return $this->belongsTo(Category::class);
            }
            public function sizes()
            {
            return $this->belongsToMany(Size::class);
            }
            public function colors()
            {
            return $this->belongsToMany(Color::class);
            }
            public function collections()
            {
            return $this->belongsToMany(Collection::class);
            }

}
