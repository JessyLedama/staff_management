<?php
/**
 * User: Jessy Ledama
 * Date: 24/6/2020
 */

namespace App\Repositories;


use App\AuditTrail;
use Illuminate\Support\Facades\Auth;

class HomeRepository
{

    public function userVisitHomePage(){
        $recent_activities = AuditTrail::latest()->get();
        if (Auth::user()->is_admin == false ) {
            $recent_activities = AuditTrail::where('resource_type_affected', 'admin')->where('affected_resource_id', Auth::user()->id)->latest()->get();
        }
        return view('admin-home', compact('recent_activities'));
    }


}