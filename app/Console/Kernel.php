<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Notifications\NotificationSender;
use Illuminate\Notifications\RoutesNotifications;
use App\Notifications\NewOrderToFindRealeEstate;
use App\Admin;
use App\Operation;
use App\OrderToFindRealeEstate; 
use App\RealEestate;
use App\AdminNotification;
use App\TmpImages;
use DateTime;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //$schedule->command('inspire')->hourly();

        //مراقبة يومية للزبائن الذين قاموا بكراء عقارات
        $schedule->call(function(){
        //get ended renting
        $operations=Operation::all();
        foreach ($operations as $operation) {            
            //get order  data
            $order=OrderToFindRealeEstate::findOrFail($operation->order_id);
            if(is_end_of_rent($operation->id)==false && $order->statu ==3)
            {            
                //informe admine aboute this end
                //insert into admin_notification table
        $note=new AdminNotification;
        $note->icon_class="fa fa-user";
        $note->notification='إنتهى عقد الإيجار لـ:'.$order->name;
        $note->link='default';
        $note->type='order';
        $note->save();
        //update the rdirectecting link
        $up_note=AdminNotification::find($note->id);
        $up_note->link=route('admin.reale_estate.order.to.find.notification.detailes',[$order->id,$note->id]);
        $up_note->update();
        //  change order statu
        $order->statu=7;
        $order->update();
        // change reale estate statu
        $reale_estate=RealEestate::findORFail($operation->reale_estate_id);
        $reale_estate->statu=7;
        $reale_estate->update();
        //sendding email notifications to admins
        $note_data=[
            'body'=>$note->notification,
            'action'=>'مشاهدة التفاصيل',
            'url'=>route('admin.reale_estate.order.to.find.notification.detailes',[$order->id,$note->id]),
            'footer'=>'الساورة للعقارات.'
        ];

        $admins=Admin::where('type',1)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewOrderToFindRealeEstate($note_data));
        }

            }
        }    
    })->daily()->runInBackground();
       // مسح الصور الموقتة التي تعدى وقت إضافتها ساعة
       $schedule->call(function(){
        //select all images who are register one houer from now
        $images=TmpImages::all();
        //deleted from folder
        foreach($images as $image){
            //verify diff of date
        $now=new DateTime();
        $image_date=new DateTime($image->created_at);
        $interval=$now->diff($image_date);
        $dif_day = $interval->format('%d'); 
        $dif_hour = $interval->format('%h');
        $dif_minut = $interval->format('%i');  
        if($dif_day>=0 && $dif_hour>=0 && $dif_minut>=30 && \File::exists(public_path('/admins/uploads/tmp/'.$image->image)))                
                    {
                        \File::move(public_path('/admins/uploads/tmp/'.$image->image),public_path('/admins/uploads/thumbnails/'.$image->image));
                        // \File::delete(public_path('/admins/uploads/tmp/'.$image->image));
                    //delete image from data base
                    $image->delete();
                    }
                    
                }
       })->everyFiveMinutes()->runInBackground();
        // مراقبة الحجز المؤقت للعقارات 

        // مراقبة الحجز بعربون

        //رفع تقرير أسبوعي عن الأرباح

        //رفع تقرير شهري عن الأرباح

        //رفع تقرير سنوي عن الأرباح

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
