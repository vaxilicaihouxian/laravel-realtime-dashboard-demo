<?php

use Illuminate\Support\Facades\DB;

/**
 * @return \Illuminate\Support\Collection
 */
function getUnreadNotifications(){
    return \Illuminate\Notifications\DatabaseNotification::whereNull('read_at')->get();
}

/**
 * @return mixed
 */
function countUnreadNotifications(){
    return \Illuminate\Notifications\DatabaseNotification::whereNull('read_at')->count();
}