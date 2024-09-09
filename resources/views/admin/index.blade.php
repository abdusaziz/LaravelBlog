<!DOCTYPE html>
<html lang="en">
    <head>
@include('admin.layout.adminhead')
@yield('pagecss')
</head>
@include('admin.layout.adminnav')
<div id="layoutSidenav_content">

@yield('content')

</div>
@include('admin.layout.adminjs')