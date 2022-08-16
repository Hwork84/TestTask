<div class="card-body">
    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ route('save_post') }}">
        @csrf

        @if(str_contains(Request::url(), 'edit'))
            <input type="hidden" id="id" name="id" class="form-control" value="{{ $posts->id }}">
        @endif
        <div class="form-group">
            <label for="pub_title">Title Publication</label>
            <input type="text" id="pub_title" name="pub_title" class="form-control" value="{{ $posts->publication_title ?? isset($posts) }}" required="">
        </div>
        <div class="form-group">
            <label for="pub_text">Text Publication</label>
            <textarea name="pub_text" id="pub_text"  class="form-control"  required="">{{$posts->publication_text ?? isset($posts)}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
