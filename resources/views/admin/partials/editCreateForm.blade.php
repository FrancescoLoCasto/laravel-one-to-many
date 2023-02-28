

<form action="{{route($routeName, $post)}}" method="POST" enctype="multipart/form-data" >
   @csrf
   @method($method)
   <div class="mb-3">
      <label for="post_title" class="form-label">Title</label>
      <input type="text" class="form-control" id="post_title" placeholder="" name="title" value="{{old('title', $post->title)}}">
    </div>
    <div class="mb-3">
      <label for="post_content" class="form-label">Post textarea</label>
      <textarea class="form-control" id="post_content" rows="15" name="content" >
         {{old('content', $post->content)}}
      </textarea>
    </div>

    <div class="mb-3">
      <label for="post_content" class="form-label">Post Image</label>
      <input type="file" class="form-control" id="post_image" placeholder="" name="image" value="{{old('image', $post->image)}}">
    </div>

    <div class="mb-3">
      <label for="post_date" class="form-label">Post Date</label>
      <input type="datetime" class="form-control" id="post_date" rows="5" name="post_date" value="{{old('post_date', $post->post_date)}}"></input>
    </div>

    <div class="">
      <button type="submit" class="btn" >
         Create new post
      </button>
    </div>

</form>

