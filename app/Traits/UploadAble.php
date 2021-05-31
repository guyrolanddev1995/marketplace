<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

/**
 * Trait UploadAble
 * @package App\Traits
 */
trait UploadAble 
{
    /**
     * upload one file
     * @param UploadedFile $file
     * @param null $folder
     * @param string $disk
     * @param null $filename
     * @return false|string
     */
    public function uploadOne(UploadedFile $file, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        return $file->storeAs(
            $folder,
            $name . '.' . $file->getClientOriginalExtension(),
            $disk
        );
    }

    /**
     * @param null $path
     * @param string $disk
     */
    public function deleteOne($path = null, $disk = "public")
    {
        Storage::disk($disk)->delete($path);
    }

    private function saveFile($file, $folder, $disk="public")
    {
        $name = basename($file->storePublicly($folder, ['disk' => $disk]));
        return $name;
    }

    public function storeGalerieFiles(Request $request)
    {
        $file = $request->file;
        $name = $this->saveFile($request->file('file'), '/tmp');

        return response()->json([
            'name' => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
}