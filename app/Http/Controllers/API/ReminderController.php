<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Reminder;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function allReminders(){
        $reminder = Reminder::select('reminder_name as title', 'remind_at as start', 'active_color as color')
            //->where('tenant_id', Auth::user()->tenant_id)
            ->get();
        return response($reminder);
    }
}
