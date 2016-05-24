<?php

function psp($search)
{
    return sprintf('%%%s%%', $search);
}

function format_money($value)
{
    return sprintf('$ %s', number_format($value, 2, '.', ''));
}

/* Navigation helpers */
function class_active()
{
    return ' class="active"';
}

function is_finance()
{
    $is = Request::is('user/finance*') or Request::is('admin/finance*');

    if ($is) return class_active();
}

function is_profile()
{
    $is = Request::is('user/profile*');

    if ($is) return class_active();
}

function is_users()
{
    $is = Request::is('admin/users*');

    if ($is) return class_active();
}