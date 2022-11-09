<?php

namespace App\Http\Controllers\Site\Landing_page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\TmpImages;

class TmpUploadController extends Controller
{
    public function upload(Request $request)
    {        
        //check if has file
        if($request->hasfile('files'))
        {
            $images=$request->file('files');
            // dispatch(new RealeEstateImageUploader($files,$reale_estate->id));
            foreach ($images as $index => $image) {
                $image_name=uniqid().'_'.md5(time()).'.'.$image->getClientOriginalExtension();                  
                $distinationPath=public_path('/admins/uploads/tmp');                  
                // $getrealepath=$image->getRealPath();
                
              $resize_image=Image::make($image->getRealPath());
              $resize_image->resize(600,600,function($constraint){
                  $constraint->aspectRatio();
              })->save($distinationPath.'/'.$image_name);
                
                //insert image name to tmp images tables
                $Image=new TmpImages;
                $Image->image=$image_name;
                $Image->session_id=$request->session()->get('session_id');
                $Image->index=$index;
                $Image->save();
        
            }
            return $image_name;
        }
        return '';
    }

    public function destroy()
    {
        $image=TmpImages::where('image',request()->getContent())->first();
        if($image)
        {
            //delete image from folder
            if(\File::exists(public_path('/admins/uploads/tmp/'.$image->image)))                
                    {
                        \File::move(public_path('/admins/uploads/tmp/'.$image->image),public_path('/admins/uploads/thumbnails/'.$image->image));
                        // \File::delete(public_path('/admins/uploads/tmp/'.$image->image));
                    //delete image from data base
                    $image->delete();
                    }
            return response('');
        }
    }
}
