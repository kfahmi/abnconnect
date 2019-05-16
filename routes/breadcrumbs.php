<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(Lang::get('titles.pages.dashboard'), url('/home'));
});

// Home > user
Breadcrumbs::for('user', function ($trail) {
    $trail->parent('home');
    $trail->push(Lang::get('titles.pages.user'), url('/user'));
});
// Home > user > create
Breadcrumbs::for('user.create', function ($trail) {
    $trail->parent('user');
    $trail->push(Lang::get('titles.pages.user_create'), url('/user/create'));
});

// Home > user > edit
Breadcrumbs::for('user.edit', function ($trail,$user) {
    $trail->parent('user');
    $trail->push(Lang::get('titles.pages.user_edit',['model'=>$user->username]), route('user.edit',$user->id));
});



// Home > Param
Breadcrumbs::for('param', function ($trail) {
    $trail->parent('home');
    $trail->push(Lang::get('titles.pages.param'), url('/param'));
});


// Home > Group
Breadcrumbs::for('group', function ($trail) {
    $trail->parent('home');
    $trail->push(Lang::get('titles.pages.group'), url('/group'));
});

// Home > Group > Create
Breadcrumbs::for('group.create', function ($trail) {
    $trail->parent('group');
    $trail->push(Lang::get('titles.pages.group_create'), url('/group/create'));
});

// Home > Group > edit
Breadcrumbs::for('group.edit', function ($trail,$data) {
    $trail->parent('group');
    $trail->push(Lang::get('titles.pages.group_edit',['model'=>$data->name]), route('group.edit',$data->id));
});



// Home > Permission
Breadcrumbs::for('permission', function ($trail) {
    $trail->parent('home');
    $trail->push(Lang::get('titles.pages.permission'), url('/permission'));
});

Breadcrumbs::for('permission.create', function ($trail) {
    $trail->parent('home');
    $trail->push(Lang::get('titles.pages.permission_create'), url('/permission/create'));
});

Breadcrumbs::for('permission.update', function ($trail,$data) {
    $trail->parent('home');
    $trail->push(Lang::get('titles.pages.permission_update',['model'=>$data->name]), route('permission.edit',$data->id));
});



//Home > Report
Breadcrumbs::for('report', function ($trail) {
    $trail->parent('home');
    $trail->push(Lang::get('titles.pages.report'), url('/report'));
});









