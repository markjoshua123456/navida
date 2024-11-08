<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Import Str for generating random strings


class Product extends Model
{
    use HasFactory;


    protected $primaryKey = 'products_id';


    public $incrementing = false;




    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'categories_id',
        'product_name',
        'product_stocks',
        'product_status',
        'product_desc',
        'product_price',
        'item_code',
        'product_image',// Add item_code to the fillable array
    ];


    // Automatically generate a default item_code if not provided
    protected static function booted()
    {
        static::creating(function ($product) {
            // If item_code is not provided, generate a default code
            if (empty($product->item_code)) {
                $product->item_code = 'PROD-' . strtoupper(Str::random(8));
            }
        });
    }


    // Relationship with categories
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
}
