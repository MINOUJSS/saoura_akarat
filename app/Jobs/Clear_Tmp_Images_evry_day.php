<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\TmpImages;

class Clear_Tmp_Images_evry_day implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //select all images who are register one houer from now
        $images=TmpImages::all();
        //deleted from folder
        foreach($images as $image){
        if(\File::exists(public_path('/admins/uploads/tmp/'.$image->image)))                
                    {
                        \File::move(public_path('/admins/uploads/tmp/'.$image->image),public_path('/admins/uploads/thumbnails/'.$image->image));
                        // \File::delete(public_path('/admins/uploads/tmp/'.$image->image));
                    }
                    //delete image from data base
                    $image->delete();
                }
        //deleted from database

    }
}
