<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function getAuthorAttribute($value){
        return "Author- Mr. " .$value;
    }
    public function setTitleAttribute($value){
        $this->attributes['title'] = strtoupper($value);
    }
    public function setauthorAttribute($author){
        $this->attributes['author'] = ucwords($author);

        //some mrore built-in functions are
        // ucfirst() - it converts the first letter of a string to uppercase
        //lcfirst() - it converts the first letter of a string to lowercase
        //strtolower() - it converts whole string to lowercase 
        //ucwords() -  it converts the each words of a string to uppercase.
        }
        public function setBodyAttribute($value){
            $this->attributes['body'] = ucfirst($value);
        }
}
