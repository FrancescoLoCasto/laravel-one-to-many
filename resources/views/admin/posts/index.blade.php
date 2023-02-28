@extends('layouts.admin')

@section('content')
<div class="container">

   @if (session('message'))
      <div class="allert allert-{{session('message-class')}}">
         {{session('message')}}
      </div>
   @endif

   <table class="table table-striped table-bordered table-hover m-5">
      <thead>
        <tr>
          <th scope="col">#id</th>
          <th scope="col">Title</th>
          <th scope="col">Author</th>
          <th scope="col">Post</th>
          <th scope="col">
            <a href="{{route ('admin.posts.create')}}" class="btn btn-sm btn-primary">
               Create New!
            </a>
          </th>

        </tr>
      </thead>
      <tbody>
         @foreach ($posts as $post)
         <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->author}}</td>
            <td>{{$post->post_date}}</td>
            <td>
               <a href="{{route('admin.posts.edit', $post->slug)}}" class="btn btn-sm btn-primary">
                  Edit
               </a>
               <a href="{{route ('admin.posts.show', $post->slug)}}" class="btn btn-sm btn-warning">
                  Show
               </a>

               <form action="{{route('admin.posts.destroy', $post->slug)}}" method="POST" class="d-inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">
                     Delete
                  </button>
               </form>

            </td>
         </tr>
         @endforeach
      </tbody>
    </table>
    {{$posts->links()}}
</div>
@endsection
