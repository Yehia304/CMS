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
        alert('Blogger has been created!');
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
            <a href="/admin">Admin Panel</a>
        </h2>

    </x-slot>
    @if(isset($posts))
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
                            <h1>This blogger has no posts to show!</h1>
                        </div>
                    </div>
                </div>
            </div>
        @endif




        @else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1><strong style="font-size: x-large">View bloggers posts</strong>

                        <a style="float: right" href="{{route('admin.add.blogger')}}">Add a new blogger</a>

                    </h1>
                    <br>
                    <br>
                    @foreach($users as $user)
                       Blogger : <a href="{{route('user.posts',['user_id'=>$user->id])}}">{{$user->name}}'s Posts</a>
                        <br>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>








        @endif
</x-app-layout>
