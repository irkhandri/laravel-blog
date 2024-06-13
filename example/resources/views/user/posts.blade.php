<x-layout> 

    <x-layout>
        <br> <br>
    
    
       
    
       
    
    
    
    <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
        <div class="w3-row">
            <div class="w3-col m4">
    

                @if ( session('success'))
                <div>
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            
                <br>
    
                <div class="w3-card w3-round w3-white   ">
                    <div class="w3-container ">
                        <h2>About me</h2>
                        <h1>  {{ $profile->username }}'s posts, total  {{ $profile->posts->count() }}   </h1>

                        {{-- <p> {{profile.bio}}</p> --}}
                    </div>
                </div>
                <br>
    
                <!-- Interests -->
                <div class="w3-card w3-round w3-white  ">
    
    
                    <div class="w3-container ">
                        <h2>Interests</h2>
                    
                        @foreach (auth()->user()->interests as $interest)
                                           
                        <p class=" w3-tag  w3-text-white  w3-theme">{{$interest->title}}</p> 
                        <p> {{$interest->body}}</p>
                    @endforeach

                    </div>
                </div>
    
            </div>
    
            <!-- Middle Column -->
            <div class="w3-col    w3-round w3-margin m7">
    
                @foreach ($posts as $post)
                    
    
                <div class="w3-container w3-card w3-white w3-round w3-margin-bottom">
    
                    
                    <div >
                        <br>
    

                            <hr>
                        <div class="w3-row-padding" >
                            <div >
                                <img src="{{  $post->image }}" style="width:100%" alt="Logo" class="w3-margin-bottom">
                            </div>
                        </div>
                        <p>
                            {{-- {% for tag in blog.tags %}
                            <span class="w3-tag w3-small w3-theme">#{{tag.name}}</span>
                            {% endfor %} --}}
                            
                        </p>
                        <p> Posted {{ $post->created_at->diffForHumans() }}   </a>  </p>

                        <h3 class="w3-center">{{$post->title}}</h3>
                        <p>{{$post->body}}...</p>
                          
    
                          <!-- Likes --> 
                         {{-- <div class="w3-text-theme w3-right">
                            <i class="fa fa-thumbs-up"></i>
                            <span>{{ blog.vote_like  }} Like{{blog.vote_like|pluralize:"s"}} </span> 
                            <i class="fa fa-thumbs-down"></i>
                            <span>{{ blog.vote_dislike  }} Dislike{{blog.vote_dislike|pluralize:"s"}} </span> 
                        </div>      --}}
    
    
                        <a href="{{ route ('posts.show', $post) }}" type="button" class="w3-button w3-theme w3-center w3-margin-bottom"><i class="fa fa-info"></i> Show more</a> 
          
        
                        <br>
    
                    </div>
                </div>
                
                @endforeach
    
                 
    
            </div>
    
                
           
        </div>
    </div>
    <br>
    
    
    
    </x-layout>

</x-layout>    
