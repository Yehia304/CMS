@if(\Session::has('Updated'))
    <script>
        alert('Post has been updated');
    </script>
    @endif

@if(\Session::has('Unauthorized'))
    <script>
        alert('You are unauthorized to edit/delete this post!');
    </script>
@endif

@if(\Session::has('Useradded'))
    <script>
        alert('User added!');
    </script>
@endif

@if(\Session::has('Notadmin'))
    <script>
        alert('You have to be an admin to access this.');
    </script>
@endif


@if(\Session::has('Postadded'))
    <script>
        alert('Post created!');
    </script>
@endif

@if(\Session::has('Deleted'))
    <script>
        alert('Post deleted!');
    </script>
@endif



<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
            @auth()
                <a href="{{route('user.newpost')}}" class="button btn-primary"
                   style="float: right; padding-bottom: 10px">Add a new Blog post</a>
            @endauth
        </h2>

    </x-slot>
    @if(isset($create))
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form method="POST" action="{{route('user.createpost')}}" enctype="multipart/form-data">
                            @csrf

                            <label>Post header</label><br>
                            <input style="width: 300px" type="text" name="post_header" class="form-control" required>
                            <br>
                            <label>Post content</label>
                            <br>
                            <textarea style="width: 1000px;height: 300px" class="form-control"
                                      name="post_content" required></textarea>
                            <br>
                            <label>Post thumbnail</label>
                            <br>
                            <input type="file" name="post_thumbnail" required>
                            <br>
                            <br>
                            <label>Topic</label>
                            <br>
                            <select name="topic_name">
                                @foreach($topics as $topic)

                                    <option>
                                        {{$topic}}
                                    </option>
                                @endforeach
                            </select>
                            <br>
                            <br>
                            <button type="submit">Create post</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        @auth()
            @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <h1>{{\App\Models\Topic::where('id',$post->topic_id)->first()->topic_name}} - {{$post->post_header}}
                                    <div style="float: right">
                                <a href="{{route('user.post.edit',['post_id'=>$post->id])}}"> Edit</a>
                                <a style="margin-right: 10px;margin-left: 10px" href="{{route('user.post.delete',['post_id'=>$post->id])}}"> Delete</a>
                                    </div>
                                </h1>
                                <hr>
                                <div >
                                    <img style="width: 1000px; height: 100px" src="{{asset($post->post_thumbnail)}}">
                                </div>
                                <br>
                                <hr>
                                <br>
                                <div >{{$post->post_content}}</div>
                                <br>


                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            @else
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                               <h1>You have no posts to show!</h1>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
        @endauth
    @endif
</x-app-layout>
