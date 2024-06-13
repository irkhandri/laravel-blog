<x-layout>

    <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">

        <!-- The Grid -->
        <div class="w3-row-padding" >
        
          <!-- Left Column -->
          <div class="w3-third" style="max-width:300px">
          
            <div class="w3-white w3-text w3-card-4">
              
              <div class="w3-container">
                <h2 class="w3-text-theme w3-center">About Blog</h2>
                <p><i class="fa fa-info fa-fw w3-margin-right w3-text-theme"></i>{{$post->title}}</p>
      
      
             
      
              </div>
      
            </div><br>
        
          <!-- End Left Column -->
          </div>
      
          <!-- Right Column -->
          <div class="w3-twothird">
            
    
          
            <div class="w3-container w3-card w3-white w3-margin-bottom">
            
              <h2 class="w3-text-theme w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-theme"></i>{{$post->title}}</h2>
              
      
              <div ><br>
   
    
    
    
    
                      
                        <hr>
                        <img src="{{ asset('storage/' . $post->image) }}" style="width:100%" alt="Nature">
    
                      <p>
                          {{-- {% for tag in blog.tags %}
                          <span class="w3-tag w3-small w3-theme">#{{tag.name}}</span>
                          {% endfor %} --}}
                          
                      </p>
    
                      <hr class="w3-clear">
                      <p class="w3-padding">
                        {{$post->body}}
                      </p>
    
                      <div class="w3-text-theme w3-right">
                        <i class="fa fa-thumbs-up"></i>
                        {{-- <span> {{blog.likes}}  </span>  --}}
                        <i class="fa fa-thumbs-down"></i>
                        {{-- <span>{{ blog.dislsikes  }} </span>  --}}
                       
                      </div> 
                      <br> 
                      
                      
                      {{-- {% if commented  %}
                        <h3>You can comment only once   </h3>
    
                      <hr> 
    
                      {% elseif inside %} --}}
                      <form method="POST" action="">
                        {{-- {# {% csrf_token %} #} --}}
    
                        <!-- Like and Dislike buttons -->
                        <div>
                          <button type="button" class="like-button w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i> Like</button>
                          <button type="button" class="dislike-button w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-down"></i> Dislike</button>
                        </div>
    
                       <div class="w3-padding w3-quarter">
                        <textarea 
                            id="formInput#textarea"
                            type="textArea"
                            name="description"
                            placeholder="Enter your comment..."
                            style="width: 550px; max-width: 14500px; height: 100px;"
                        ></textarea>
                        </div>
                        <br><br><br><br><br><br>
                        <input type="submit" class="w3-button w3-theme " value=" Comment"></input>
    
                        <input type="hidden" name="rate" id="react-input" value="">
    
                       </form>
    
                      {{-- {% elseif not inside  %} --}}
                    {{-- <h3> You can not comment, you must log in</h3>
                    <a href="{{ path ('login')}}" class="w3-button w3-theme  "><i class="fa fa"></i> Log In</a>
     --}}
                       {{-- {% endif %} --}}
    
                    {{-- {# {% else %} #}
                      {# <h3> You can not comment your own blogs</h3> #}
                    {# {% endif %}  #} --}}
    
                    
                     <h3 class="w3-text-theme">Comments</h3>
                    <hr> 
                      {{-- {% for comment in blog.comments %}
                      
    
                      <div class="w3-container w3-margin">
                          <div class="w3-row-padding w3-padding-16">
                              <div class="w3-col m2">
                                  <img src="{{comment.profile.imageUrl}}" alt="Avatar" class="w3-circle" style="width:100px">
                              </div>
                              <div class="w3-col m10">
                                  <p class="w3-right ">{{(comment.created.date|date("d/m/Y H:i")) }}</p>
                          
    
    
                                  <a href="{{ path ('profile', { 'id' : comment.profile.id } ) }}" ><h4>{{comment.profile.name}}</h4></a>
    
                                  {# <a href="/profiles/{{comment.profile.id}}" ><h4>{{comment.profile.name}}</h4></a> #}
                                  <p class="w3-right w3-opacity w3-text-theme">I {{comment.rate}} it .</p>
                                  <p>{{comment.description}}</p>
                                  
                              </div>
                          </div>
                      </div>
                      {% endfor %}
       --}}
              </div>
      
          
            
      
            </div>
      
            
      
          <!-- End Right Column -->
          </div>
          
        <!-- End Grid -->
        </div>
        
        <!-- End Page Container -->
       </div>
      
      <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the like and dislike buttons
            const likeButton = document.querySelector(".like-button");
            const dislikeButton = document.querySelector(".dislike-button");
            
            // Get the hidden input field
            const reactInput = document.querySelector("#react-input");
            
            // Add event listeners for button clicks
            likeButton.addEventListener("click", function() {
                // Set the hidden input value to "like" when the "Like" button is clicked
                this.classList.remove('w3-theme-d1');
                this.classList.add('w3-black');
                reactInput.value = "like";
                dislikeButton.classList.remove('w3-black');
                dislikeButton.classList.add('w3-theme-d1');
            });
            
            dislikeButton.addEventListener("click", function() {
                // Set the hidden input value to "dislike" when the "Dislike" button is clicked
                reactInput.value = "dislike";
                this.classList.remove('w3-theme-d1');
                this.classList.add('w3-black');
                likeButton.classList.remove('w3-black');
                likeButton.classList.add('w3-theme-d1');
    
    
            });
        });
      </script> 
    
    



</x-layout>