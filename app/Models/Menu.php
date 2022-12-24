<?php

namespace App\Models;

use App\Models\Scopes\MenuScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Menu extends Model
{
    use HasFactory;
    protected $fillable=['name','description','price'];



    
// morph realation  
public function image(){
    return  $this->morphOne(Image::class,'imageable');
}



    // Gl;obal Scope 
                // protected static function booted()
                // {
                //     static::addGlobalScope(new MenuScope);
                // }
// anomnus global scope 
            // protected static function booted(){
            //     static ::addGlobalScope('menu',function(Builder $builder){
            //         $builder->where('price','>',60);
            //     });
            // }

// local scope  
            // public function scopeActive($query){
            // $query->where('price','>',40);
            // }


  // accessors  
//   protected function name():Attribute{
//     return Attribute::make(
//         get:fn($value)=>ucfirst($value),
//         set:fn($value)=>strtoupper($value),
        
//     );
//   }          
}
