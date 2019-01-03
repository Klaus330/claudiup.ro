<?php

namespace App\Upload;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class Picture
{
	
	public static function store(string $file, string $path, $width = 543, $height = 400)
	{
		$image = request()->file($file);
		$filename = static::getFilename($image);

        $location = public_path("{$path}/{$filename}");
        Image::make($image)->fit($width, $height)->save($location);

        return $filename;
	}

	public static function storeImages($file, string $path, $width = 543, $height = 400)
	{
		$filename = static::getFilename($file);

        $location = public_path("{$path}/{$filename}");        
        Image::make($file)->fit($width, $height)->save($location);

        return $filename;
	}

	public static function update($model,string $pictureName, $path, $width = 543, $height = 400)
	{
		$oldfilename = $model->$pictureName;

        $image = request()->file("{$pictureName}");

        $filename = static::getFilename($image);

        $location = public_path("{$path}/{$filename}");
        Image::make($image)->fit($width, $height)->save($location);
      
        static::delete($oldlocation = public_path("{$path}/{$oldfilename}"));
	}

	public static function getFilename($file)
	{
		return sprintf("%s.%s",
			 time(),
			 $file->getClientOriginalExtension()
		);
	}

	public static function delete(string $path)
	{
		File::delete(public_path($path));
	}
}