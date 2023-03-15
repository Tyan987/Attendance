<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function homeIndex()
    {
        return view('home');
    }

    public function checkInIndex()
    {
        return view('checkIn');
    }

    public function checkIn()
    {
        $user_id = Auth::user()->id;

        $check_attend = Attendance::all()->where('user_id', $user_id)->where('date', Carbon::today()->timezone('Asia/Jakarta')->format('d/m/Y'))->first();

        if ($check_attend == null) {
            $attendance = new Attendance;
            $attendance->user_id = $user_id;
            $attendance->date = Carbon::today()->timezone('Asia/Jakarta')->format('d/m/Y');
            $attendance->check_in = Carbon::now()->timezone('Asia/Jakarta')->format('H:i:s');
            $attendance->check_out = "";
            $attendance->late_duration = 0;
            $attendance->over_time_duration = 0;
            $attendance->early_check_out_duration = 0;

            if (Carbon::Parse($attendance->check_in)->gt(Carbon::parse('08:00:00'))) {
                $attendance->late_duration = Carbon::Parse($attendance->check_in)->diffInMinutes(Carbon::parse('08:00:00'));
            }

            $attendance->save();
            return redirect('/viewAttendance');
        }

        return redirect('/home');
    }

    public function checkOutIndex()
    {
        return view('checkOut');
    }

    public function checkOut()
    {
        $user_id = Auth::user()->id;
        $attendance = Attendance::all()->where('user_id', $user_id)->where('date', Carbon::today()->timezone('Asia/Jakarta')->format('d/m/Y'))->first();

        if ($attendance != null) {
            $attendance->check_out = Carbon::now()->timezone('Asia/Jakarta')->format('H:i:s');

            if (Carbon::Parse($attendance->check_out)->gt(Carbon::parse('17:00:00'))) {
                $attendance->over_time_duration = Carbon::parse('17:00:00')->diffInMinutes(Carbon::Parse($attendance->check_out));
            }

            if (Carbon::Parse($attendance->check_out)->lt(Carbon::parse('17:00:00'))) {
                $attendance->early_check_out_duration = Carbon::Parse($attendance->check_out)->diffInMinutes(Carbon::parse('17:00:00'));
            }

            $attendance->update();
            return redirect('/viewAttendance');
        }

        return redirect('/home');
    }

    public function viewAttendance()
    {
        $user_id = Auth::user()->id;
        $attendance = DB::table('attendances')->where('user_id', $user_id)->get();

        if ($attendance == null) {
            return redirect('/home');
        }

        return view('viewAttendance', ['attendances' =>  $attendance]);
    }
}
