<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

abstract class PictureFactory extends Factory
{
    protected string $path;
    protected string $base_path;
    protected array $files;

    /**
     * @return string|null
     */
    protected function storeImage(): ?string
    {
        $path = $this->getImagePath();
        if ($path) {
            $extension = explode('.', $path);
            $format = end($extension);
            $image_name = md5($path) . '.' . $format;
            $resize = Image::make($path)->fit(300)->encode($format);
            Storage::disk('public')->put($this->base_path . $image_name, $resize->__toString());
            return $this->base_path . $image_name;
        }
        return null;
    }

    /**
     * @return string|null
     */
    protected function getImagePath(): ?string
    {
        if (count($this->files) > 0) {
            return $this->files[array_rand($this->files)];
        }
        return null;
    }

    /**
     * @param string $path
     */
    protected function setPath(string $path)
    {
        $this->path = Storage::path($path);
        foreach (Storage::files($path) as $file_path) {
            $this->files[] = storage_path("app/{$file_path}");
        }
    }

    /**
     * @param string $base_path
     */
    protected function setBasePath(string $base_path)
    {
        $this->base_path = $base_path;
    }
}
