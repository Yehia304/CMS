<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(isset($posts))
                        @if(count($posts) > 0)
                            @foreach($posts as $post)
                                <div class="py-12">
                                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                            <div class="p-6 bg-white border-b border-gray-200">
                                                <h1>{{\App\Models\Topic::where('id',$post->topic_id)->first()->topic_name}} - {{$post->post_header}}
                                                    @auth()
                                                    <div style="float: right">
                                                        <a href="{{route('user.post.edit',['post_id'=>$post->id])}}"> Edit</a>
                                                        <a style="margin-right: 10px;margin-left: 10px" href="{{route('user.post.delete',['post_id'=>$post->id])}}"> Delete</a>
                                                    </div>
                                                    @endauth
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
                            <center><div>{{$posts->links()}}</div></center>
                        @endif
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
