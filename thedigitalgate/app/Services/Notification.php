<?php

namespace App\Services;
use App\Models\Notifications;
use Log;
use Session;
use DB;

class Notification
{
    public function savenotification($user,$id,$notitext)
	{
        $Notifications = new Notifications;
        $Notifications->notification_text = $notitext;
        $Notifications->notifrom = $user;
        if($user == "trainer"){
            $Notifications->trainer_id = $id;
            $Notifications->aspirant_id = "";
        }
        if($user == "aspirant"){
            $Notifications->trainer_id = "";
            $Notifications->aspirant_id = $id;
        }
        $Notifications->created_date = date("Y-m-d H:i:s");
        $Notifications->status = "N";
        $Notifications->save();
        return true;
    }
}

?>