<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'posts';
    // protected $primaryKey = 'id'
    // public $timestamps = false
    protected $guarded = ['id'];
    protected $fillable = [
        'title',
        'content',
        'categories_id',
        'posts_image',
    ];
    // protected $hidden = []
    // protected $dates = []

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function setPostsImageAttribute($value)
    {
        // dd(request()->all());
        $name = "posts_image";
        $disk = "public";
        $path = "/v1/images";
        $this->uploadFileToDisk($value, $name, $disk, $path);

    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function categories()
    {
        return $this->belongsTo(Categories::class, 'categories_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class);
    }

    public function getPostsTags()
    {
        return $this->belongsToMany(Tags::class, 'posts_tags', 'posts_id', 'tags_id');
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
