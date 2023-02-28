@extends('layouts.admin')

@section('content')
<div class="container">
 
  @include('admin.partials.editCreateForm', ['method'=>'PUT','routeName'=>'admin.posts.update'])
</div>
