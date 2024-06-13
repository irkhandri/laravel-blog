<x-layout>

    <div class="w3-container w3-white w3-card  w3-content" style="max-width: 900px; margin-top: 80px;">
        <h2  class="w3-text-theme w3-center">Update your post   </h2>

        <a href="{{ route("profile") }}"> &larr; Go back to profile </a>

        <div class="w3-container" >
            <form action="{{ route('posts.update', $post) }}" method="POST"  enctype="multipart/form-data">
                                
                @csrf
                @method('PUT')

                <!-- Input:Title -->
                <div class="w3-padding">
                    <label for="formInput#text">Title: </label>
                    <input
                        id="formInput#text"
                        type="text"
                        name="title"
                        value="{{ $post->title }}"
                        style="width: 500px; height: 60px;"
                        placeholder="Enter your title..."
                    />
                </div>
                @error('title')
                    <p class="w3-text-red" > {{ $message }} </p>
                @enderror
                
                <div class="w3-padding">
                    <label for="body">Post Content: </label>
                    <textarea
                        name="body"
                        style="width: 500px; height: 300px;"
                        > {{ $post->body }}</textarea>
                </div>
                @error('body')
                    <p class="w3-text-red" > {{ $message }} </p>
                @enderror


                @if ($post->image && $post->image !== 'posts_image/default.jpeg')
                    <div class="w3-padding" >
                        <label for=""> Current photo: </label>
                        <img src="{{ $post->image }}" alt="logo" style="width: 250px; ">
                    </div>      
                @endif




                <div class="w3-padding">
                    <label for="formInput#text">Image URL: </label>
                    <input
                        id="formInput#text"
                        type="text"
                        name="imageUrl"
                        value="{{ old ('imageUrl') }}"

                        placeholder="Enter imageUrl..."
                    />
                    </div>
                    @error('title')
                        <p class="w3-text-red" > {{ $message }} </p>
                    @enderror



                <div >
                    <input type="submit" class="w3-button w3-theme w3-margin-top" value="Update post"></input>
                        <br>
                </div>

            </form>

        </div>
    </div>


</x-layout>