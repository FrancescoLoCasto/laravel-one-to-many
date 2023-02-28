@extends('layouts.admin')

@section('content')

<div class="container ">


   @foreach ($posts as $post)
      <div class="card text-center m-2">
         <div class="card-header bg-dark text-light">
            {{$post->author}}
         </div>
         <div class="card-body bg-primary text-light">
         <h5 class="card-title fs-2">{{$post->title}}</h5>
         <p class="card-text fs-5">{{$post->content}}</p>
         <div class="card-footer text-light">
            {{$post->post_date}}
         </div>
      </div>
      </div>
   @endforeach

   {{$posts->links()}}
</div>
@endsection

