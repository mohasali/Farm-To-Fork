<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\File;

use App\Enums\BoxType;

class Box extends Model
{
    use HasFactory;

    protected $fillable = ['title','type','price','description','stock','nutrInfo'];
    
    public function getImages()
    {
        // Get directory path
        $folderName = str_replace(' ', '_', $this->title);
        $dirPath = public_path('images/Boxes/' . $folderName);
        
        // If directory exists
        if (!File::exists($dirPath)) {
            // If directory doesn't exist, return placeholder
            return ['/images/Farm-to-ForkBox1.png'];
        }
        
        // Get all image files from directory
        $files = File::files($dirPath);
        
        // Convert to working paths
        $images = [];
        foreach ($files as $file) {
            // Check if its an image file
            $extension = strtolower($file->getExtension());
            if (in_array($extension, ['jpg', 'jpeg', 'png','webp'])) {
                // Convert path to web URL
                $relativePath = 'images/Boxes/' . $folderName . '/' . $file->getFilename();
                $images[] = '/' . $relativePath;
            }
        }
        
        // Sort images
        sort($images);
        
        // If no images, return the placeholder
        if (empty($images)) {
            return ['/images/Farm-to-ForkBox1.png'];
        }
        
        return $images;
    }

    public static function getEnumTypes(): array
    {
        return array_column(BoxType::cases(), 'value');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    
    public function itemOrders()
    {
        return $this->hasMany(ItemOrder::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }
}