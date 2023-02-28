@extends('layouts.admin')

@section('content')
<div class="container">


 @include('admin.partials.editCreateForm', ['method'=>'','routeName'=>'admin.posts.store'])
</div>

