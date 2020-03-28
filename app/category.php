<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
 protected $fillable = ['name'];

      public function getNameAttribute($value){
         return ucfirst($value);
      }

      public function scopeWhenSearch($query , $search){
         return $query->when($search, function ($q) use( $search){
            return $q->where('name','like',"%$search%");
         });

         
      }
      public function movies(){
         return $this->belongsToMany(movie::class,'movie_category');
     }
}//end category
