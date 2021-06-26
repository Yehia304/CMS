<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(Auth::user()->is_admin != 1)
            {{ __('Blog') }}
                @auth()
                    <a href="{{route('user.newpost')}}" class="button btn-primary"
                       style="float: right; padding-bottom: 10px">Add a new Blog post</a>
                @endauth
            @else
                <a href="/admin" class="button btn-primary"
                   style="padding-bottom: 10px">Admin Panel</a>
            @endif

        </h2>

    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1>
                            <a style="font-size: x-large" href="/user/home">Blog</a>
                            <br>
                            <hr>
                            <br>
                            <strong style="font-size: large">Edit Post</strong>
                            <hr>
                        </h1>
                        <br>
                        <h3><strong>The current values are displayed inside inputs , change them or keep them as they are.</strong></h3>
                        <br>
                        <hr>
                        <br>
                        <form method="POST" action="{{route('user.editpost')}}" enctype="multipart/form-data">
                            <input type="hidden" value="{{$post->id}}" name="post_id">
                            @csrf
                            <label>Post header</label><br>
                            <input style="width: 300px" type="text" name="post_header" class="form-control" value="{{$post->post_header}}" required>
                            <br>
                            <label>Post content</label>
                            <br>
                            <textarea style="width: 1000px;height: 300px" class="form-control"
                                      name="post_content" required>{{$post->post_content}}</textarea>
                            <br>
                            <label>Post thumbnail</label>
                            <br>
                            <img style="width: 1000px; height: 100px" src="{{asset($post->post_thumbnail)}}">
                            <br>
                            <label>Change thumbnail (if a new photo is uploaded it will overwrite the current) if no change needed keep it as it is.</label>
                            <br>
                            <input type="file" name="post_thumbnail" required>
                            <br>
                            <br>
                            <label>Topic</label>
                            <br>
                            <select  name="topic_id">
                                @foreach($topics as $topic)
                                    @if ($topic == \App\Models\Topic::find($post->topic_id)->topic_name)
                                        <option value="{{\App\Models\Topic::where('topic_name',$topic)->first()->id}}" selected>{{$topic}}</option>
                                    @else
                                        <option value="{{\App\Models\Topic::where('topic_name',$topic)->first()->id}}">{{$topic}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <br>
                            <br>
                            <br>
                            <br>
                            <button type="submit">Confirm editing the post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
