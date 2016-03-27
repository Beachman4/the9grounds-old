<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Admin;
use User;
use Carbon\Carbon;
use App\Users;

class AdminController extends Controller
{
    public function index()
    {
        $today = Carbon::now();
        $yesterday = Carbon::yesterday();
        $day3 = Carbon::now()->subDays(2);
        $day4 = Carbon::now()->subDays(3);
        $day5 = Carbon::now()->subDays(4);
        $day6 = Carbon::now()->subDays(5);
        $day7 = Carbon::now()->subDays(6);

        $date_array = [
            Carbon::now()->format('n/j'),
            Carbon::yesterday()->format('n/j'),
            Carbon::now()->subDays(2)->format('n/j'),
            Carbon::now()->subDays(3)->format('n/j'),
            Carbon::now()->subDays(4)->format('n/j'),
            Carbon::now()->subDays(5)->format('n/j'),
            Carbon::now()->subDays(6)->format('n/j')
        ];
        $data_array = array();
        $test = Users::where('created_at', '>', Carbon::now()->yesterday())->where('created_at', '<', Carbon::now())->count();
        $test2 = Users::where('created_at', '>', Carbon::now()->subDays(2))->where('created_at', '<', Carbon::now()->yesterday())->count();
        array_push($data_array, $test);
        array_push($data_array, $test2);
        for($i = 3; $i <= 7; $i++) {
            $test = Users::where('created_at', '>', Carbon::now()->subDays($i))->where('created_at', '<', Carbon::now()->subDays($i - 1))->count();
            array_push($data_array, $test);
        }
        //dd($data_array);
        Admin::title('Dashboard');
        return view('admin.index', [
            'user_data' =>  array_reverse($data_array),
            'user_date' =>  array_reverse($date_array)
        ]);
    }
}
