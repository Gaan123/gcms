<?php


namespace App\Extended;


use App\Model\Media;
use Illuminate\Http\UploadedFile;

class MediaUploader extends \Optix\Media\MediaUploader
{
    /**
     * Set the file to be uploaded.
     *
     * @param UploadedFile $file
     * @return \Optix\Media\MediaUploader
     */
    public function setFile(UploadedFile $file)
    {
        $this->file = $file;

        $fileName = $file->getClientOriginalName();
        $name = pathinfo($fileName, PATHINFO_FILENAME);
        $img=Media::where('file_name',$fileName)->first();
        if ($img){
            $name=$name.'-'.strtotime(now());
            $fileName=$name.'.'.pathinfo($fileName, PATHINFO_EXTENSION);
        }
        $this->setName($name);
        $this->setFileName($fileName);

        return $this;
    }

}
