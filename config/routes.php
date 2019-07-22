<?php

return array(    
    
    'product/([0-9]+)' => 'product/view/$1',

    'cart/add/([0-9]+)' => 'cart/add/$1',

    'cart/delete/([0-9]+)' => 'cart/delete/$1',

    'cart/checkout' => 'cart/checkout',

    'cart' => 'cart/index',
    
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',

    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',

    'admin/product/create' => 'adminProduct/create',
    
    'admin/product' => 'adminProduct/index',

    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',

    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',

    'admin/category/create' => 'adminCategory/create',

    'admin/category' => 'adminCategory/index',

    'admin' => 'admin/index',

    'category/([0-9]+)' => 'catalog/category/$1',

    'catalog' => 'catalog/index',

    'cabinet/edit/([0-9]+)' => 'cabinet/edit/$1',

    'cabinet' => 'cabinet/index', 
    
    'contacts' => 'site/contacts',

    'login' => 'user/login',

    'logout' => 'user/logout',

    'register' => 'user/register',

    '' => 'site/index'
);