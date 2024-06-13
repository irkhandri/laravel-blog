<x-layout>
    <br> <br>
    <h1> Hi {{ auth()->user()->username }} </h1>


    @if ( session('success'))
        <div>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="w3-container w3-white w3-card  w3-content" style="max-width: 600px; margin-top: 80px;">
        <h2  class="w3-text-theme w3-center">Create your post</h2>

                <div class="w3-container" >
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <!-- Input:Email -->
                        <div class="w3-padding">
                        <label for="formInput#text">Title: </label>
                        <input
                            id="formInput#text"
                            type="text"
                            name="title"
                            value="{{ old ('title') }}"

                            placeholder="Enter your title..."
                        />
                        </div>
                        @error('title')
                            <p class="w3-text-red" > {{ $message }} </p>
                        @enderror
                
                        <div class="w3-padding">
                        <label for="formInput#textArea">Post: </label>
                        <textarea
                            id="formInput#textarea"
                            type="textArea"
                            name="body"
                            
                            placeholder="Enter your post..."
                            >{{ old ('body') }}</textarea>
                        </div>
                        @error('body')
                            <p class="w3-text-red" > {{ $message }} </p>
                        @enderror




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
                            <input type="submit" class="w3-button w3-theme w3-margin-top" value="Create post"></input>
                                <br>
                        </div>

                    </form>

                </div>
    </div>




<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
    <div class="w3-row">
        <div class="w3-col m4">
            <!-- Profile -->
            {{-- <div class="w3-card w3-round w3-white">
                <div class="w3-container w3-center">
                    <p class="w3-center"><img src="{{profile.imageUrl}}" class="w3-circle" style="max-width: 400px; max-height: 550px;  
                        border-radius: 40px; " alt="Avatar"></p>
                    <h2 >{{profile.name}}</h2>
                    <hr>
                    {% if profile.intro %}
                    <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> {{profile.intro}}</p>
                    {% endif %}

                    <p><i class="fa fa-at fa-fw w3-margin-right w3-text-theme"></i> {{profile.email}}</p>

                    {% if profile.location %}
                    <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> {{profile.location}}</p>
                    {% endif %}

                    {% if profile.number %}
                    <p><i class="fa  fa-mobile  w3-margin-right w3-text-theme"></i> {{profile.number}}</p>
                    {% endif %}

                    {# <p><i class="fa fa-calendar fa-fw w3-margin-right w3-text-theme"></i> Here from {{profile.created.date}}</p> #}

                    {% if profile.soc_facebook %}
                    <a href="{{profile.getSocFacebook}}"><i class="fa  fa-facebook w3-text-theme w3-xxlarge "></i></a>
                    {% endif %}

                    {# {% if author.soc_x %}
                    <a href="{{author.soc_x}}"><i class="fa  fa-twitter w3-text-theme  w3-xxlarge "></i></a>
                    {% endif %} #}

                    {# {% if profile.soc_youtube %}
                    <a href="{{author.soc_youtube}}"><i class="fa  fa-youtube w3-text-theme  w3-xxlarge ">    </i></a>
                    {% endif %} #}

                    {% if profile.soc_linkedin %}
                    <a href="{{profile.getSocLinkedin}}"><i class="fa  fa-linkedin w3-text-theme w3-xxlarge ">   </i></a>
                    {% endif %}

                    {# {% if author.soc_telegram %}
                    <a href="{{author.soc_telegram}}"><i class="fa  fa-telegram w3-text-theme w3-xxlarge ">   </i></a>
                    {% endif %} #}

                      <br> 

                    {%  if page =='myPage' %}
                    <a href="{{ path ('edit-profile', { 'id' : profile.id } ) }}" class="w3-button w3-theme w3-right w3-right"><i class="fa fa-edit"></i> Edit Profile</a>
                    {% endif %}

                </div>


                <!-- Send Message -->
                {% if page != 'myPage'%}
                <div class=" w3-white w3-margin w3-padding w3-center">
                
                    <a href="{{ path ('create-message', { 'id' : profile.id } ) }}" class="w3-button w3-theme w3-margin"><i class="fa fa-envelope"></i> Send Message</a>
                </div>
                {% endif %}

        
            </div> --}}


            <br>

            <div class="w3-card w3-round w3-white   ">
                <div class="w3-container ">
                    <h2>About me</h2>
                    {{-- <p> {{profile.bio}}</p> --}}
                </div>
            </div>
            <br>

            <!-- Interests -->
            <div class="w3-card w3-round w3-white  ">

                        <a class="w3-button w3-theme w3-right" href="{{ route('interests.create') }}"><i class="fa fa-plus"></i>Add Interest</a>

                <div class="w3-container ">
                    <h2>Interests</h2>
                
                    @foreach (auth()->user()->interests as $interest)
                        <form  action="{{ route('interests.destroy', $interest) }}", method="POST">
                            @csrf
                            @method('DELETE')
                            <button   class="w3-button w3-red w3-right  " style="margin-left: 10px;" ><i class="fa fa-eraser"></i> Delete </button>
                        </form>
                           
                        <a href="{{ route ('interests.edit', $interest ) }}" class="w3-button w3-theme w3-right "><i class="fa fa-edit"></i> Edit</a>
                    
                        <p class=" w3-tag  w3-text-white  w3-theme">{{$interest->title}}</p> 
                        <p> {{$interest->body}}</p>
                    @endforeach


                        
                            
                </div>
            </div>

        </div>

        <!-- Middle Column -->
        <div class="w3-col    w3-round w3-margin m7">


            {{-- {% if page == 'myPage' %}
                <h2 class="w3-text-theme w3-center"> My blogs</h2>
                <a class="w3-button w3-margin-bottom w3-margin-right w3-theme w3-right" href="{{ path ('blog-create')}}"><i class="fa fa-plus"></i>Addd Blog</a>

            {% else %}
                <h2 class="w3-text-theme w3-center"> {{profile.name}} blogs</h2>
            {% endif %} --}}


            @foreach ($posts as $post)
                

            <div class="w3-container w3-card w3-white w3-round w3-margin-bottom"><br>

                 <a href="{{ route('posts.edit', $post) }}" class="w3-button w3-theme "><i class="fa fa-edit"></i> Edit</a>


                <form  action="{{ route('posts.destroy', $post) }}", method="POST">
                    @csrf
                    @method('DELETE')
                    <button   class="w3-button w3-red  " ><i class="fa fa-eraser"></i> Delete </button>

                </form>

                <div >
                    <br>


                        <hr>
                    <div class="w3-row-padding" >
                        <div >
                            <img src="{{ $post->image }}" style="width:100%" alt="Logo" class="w3-margin-bottom">
                        </div>
                    </div>
                    <p>
                        {{-- {% for tag in blog.tags %}
                        <span class="w3-tag w3-small w3-theme">#{{tag.name}}</span>
                        {% endfor %} --}}
                        
                    </p>
                    <h3 class="w3-center">{{$post->title}}</h3>
                    <p>{{$post->body}}...</p>
                      

                      <!-- Likes --> 
                     {{-- <div class="w3-text-theme w3-right">
                        <i class="fa fa-thumbs-up"></i>
                        <span>{{ blog.vote_like  }} Like{{blog.vote_like|pluralize:"s"}} </span> 
                        <i class="fa fa-thumbs-down"></i>
                        <span>{{ blog.vote_dislike  }} Dislike{{blog.vote_dislike|pluralize:"s"}} </span> 
                    </div>      --}}


                    <a href="" type="button" class="w3-button w3-theme w3-center w3-margin-bottom"><i class="fa fa-info"></i> Show more</a> 
      
    
                    <br>

                </div>
            </div>
            
            @endforeach

             

        </div>

            
       
    </div>
</div>
<br>



</x-layout>