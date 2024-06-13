    
    <x-layout> 

<!-- Page Container -->
<div class="w3-container  w3-content " style="max-width: 1100px; margin-top: 80px">
   <!-- The Grid -->

       <!-- Searching -->
       <div class="w3-row-padding w3-margin">
           
               {{-- <div class="w3-card  w3-white w3-padding">
                   <form  id="searchForm" class="form" action="" method="POST">
                       <div class="w3-margin">
                         <h2  for="formInput#search">Search Blogs </h2>
                         <input class="w3-input w3-card w3-theme-l5" id="formInput#search" type="text" name="query"
                           placeholder="Search by Blog Title/Author/Tags" value="" />
                       </div>
           
                       <input class="w3-button w3-theme-d1 w3-margin-bottom" type="submit" value="Search" />
                       <!-- <button type="submit"  class=" w3-button w3-theme-d1 w3-margin-bottom">Comment</button> -->

                     </form>
               </div> --}}
           
       </div>


       <h2 class="w3-center w3-text-theme "> All Blogs</h2>


       <!-- Middle Column -->
       
           <div class="w3-center  w3-row-padding w3-margin ">

               {{-- {% for blog in blogs %} --}}
               @foreach ($posts as $blog)
               <div class="w3-col m13 w3-margin-right w3-card  w3-white  " style="margin-top: 20px;">
                   <div class="friend-card w3-container w3-padding ">
                   
                        <img src="{{ $blog->image }}" alt="{{ $blog->image }}" style="width: 75%; margin-top: 30px; max-width: 1100px;">

                       {{-- <img src="{{ asset('storage/' . $blog->image) }}" alt="Event" style="width: 75%; margin-top: 30px; max-width: 1100px;"> --}}
                       <h3 >{{$blog->title}}</h3>


                       <p> Posted {{ $blog->created_at->diffForHumans() }} By <a href="{{ route ('posts.user', $blog->user ) }}"> {{ $blog->user->username }} </a>  </p>
                       <p>
                           {{-- {% for tag in blog.tags %}
                           <span class="w3-tag w3-small w3-theme">#{{tag.name}}</span>
                           {% endfor %} --}}
                           
                       </p>
                       <p> {{ Str::words( $blog->body, 40, '...')}}</p>
                       <div class="w3-text-theme w3-right">
                           {{-- <i class="fa fa-thumbs-up"></i>
                           <span>{{ blog.likes }}  </span> 
                           <i class="fa fa-thumbs-down"></i>
                           <span>{{ blog.dislikes }}  </span>  --}}
                          
                       </div>  
                       <br>
                       <a href="{{ route ('posts.show', $blog) }}"><button class="w3-button w3-theme w3-margin"><i class="fa fa-info"></i> Show more</button></a>
                       
                   </div>
               </div>

                   
               @endforeach

   
           </div>

           <!--  Pagination -->

           

       {{-- {# {% include 'pagination.html' with my_list=blogs paginator=paginator  %} #} --}}

  
</div>


    </x-layout>    

