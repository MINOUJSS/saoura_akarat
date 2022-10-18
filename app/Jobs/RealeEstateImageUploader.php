<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Images;
use Image;

class RealeEstateImageUploader implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $files;
    public $reale_estate_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($files,$reale_estate_id)
    {
        $this->files=$files;
        $this->reale_estate_id=$reale_estate_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->files as $index => $image) {
              $image_name=md5(time()).'.'.$image->getClientOriginalExtension();                  
              $distinationPath=public_path('/admins/uploads/thumbnails');                  
              $getrealepath=$image->getRealPath();
        
            $resize_image=Image::make($image->getRealPath());
            $resize_image->resize(600,600,function($constraint){
                $constraint->aspectRatio();
            })->save($distinationPath.'/'.$image_name);

            $image=new Images;
            $image->reale_estate_id=$this->reale_estate->id;
            $image->image=$image_name;
            $image->index=$index;
            $image->save();
        }
    }
}
