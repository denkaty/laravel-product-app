<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'products';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['name', 'category_id', 'description', 'image'];
    // protected $hidden = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($obj) {
            if ($obj->image !== null) {
                Storage::delete(Str::replaceFirst('storage/', 'public/', $obj->image));
            }
        });
    }
    public function setImageAttribute($value)
    {

        $attribute_name = "image";
        $destination_path = "products";

        if ($value == null) {
            Storage::delete(Str::replaceFirst('storage/', 'public/', $this->{$attribute_name}));

            $this->attributes[$attribute_name] = null;
        } elseif ($value instanceof \Illuminate\Http\UploadedFile) {
            $disk = "public";
            $fileName = md5($value->getClientOriginalName() . random_int(1, 9999) . time()) . '.' . $value->getClientOriginalExtension();
            Storage::putFileAs("public/" . $destination_path, $value, $fileName, $disk);
            $this->attributes[$attribute_name] =  'storage/products/' . $fileName;
        } else {
            $this->attributes[$attribute_name] = 'storage/products/' . $value;
        }
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
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
