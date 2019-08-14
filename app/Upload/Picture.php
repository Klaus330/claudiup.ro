<?php

namespace App\Upload;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class Picture
{

	public static function store($file, string $path, $width = 543, $height = 400)
	{
		if(gettype($file) == 'string') // php special method
		{
			$file = request()->file($file);
		}

		$filename = static::getFilename($file);

        $location = public_path("{$path}/{$filename}");
        Image::make($file)->fit($width, $height)->save($location);

        return $filename;
	}

	public static function update($model,string $pictureName,string $path, $width = 543, $height = 400)
	{
		$oldfilename = $model->$pictureName;

        $image = request()->file("{$pictureName}");

        $filename = static::getFilename($image);

        $location = public_path("{$path}/{$filename}");
        Image::make($image)->fit($width, $height)->save($location);
      
        static::delete($oldlocation = public_path("{$path}/{$oldfilename}"));
        
        return $filename;
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