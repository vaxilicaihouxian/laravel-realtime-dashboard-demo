<?php

/**
 * @return mixed
 */
function getUnreadNotifications(){
    return Auth::user()->unreadNotifications()->take(10)->get()->toJson();
}

/**
 * @return mixed
 */
function countUnreadNotifications(){
    return Auth::user()->unreadNotifications()->count();
}