<?php

use Illuminate\Support\Facades\DB;

/**
 * @return \Illuminate\Support\Collection
 */
function getUnreadNotifications(){
    return Auth::check() ? Auth::user()->unreadNotifications()->take(10)->get()->toJson():[];
}

/**
 * @return mixed
 */
function countUnreadNotifications(){
    return Auth::check() ? Auth::user()->unreadNotifications()->count() : 0;
}