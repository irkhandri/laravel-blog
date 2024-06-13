<x-layout>




<!-- Page Container -->
<div class="w3-container  w3-content " style="max-width: 1100px; margin-top: 80px">
    <!-- The Grid -->
        
    @if ( session('success'))
                <div>
                    <p>{{ session('success') }}</p>
                </div>
            @endif
        <!-- Searching -->
        <div class="w3-row-padding w3-margin">
            
            {{-- <div class="w3-card  w3-white w3-padding">
                <form  id="searchForm" class="form" action="" method="POST">
                    <div class="w3-margin">
                      <h2  for="formInput#search">Search Authors </h2>
                      <input class="w3-input w3-card w3-theme-l5" id="formInput#search" type="text" name="query"
                        placeholder="Search by Author" value="" />
                    </div>
        
                    <input class="w3-button w3-theme-d1 w3-margin-bottom" type="submit" value="Search" />
                    <!-- <button type="submit"  class=" w3-button w3-theme-d1 w3-margin-bottom">Comment</button> -->

                  </form>
            </div> --}}
        
        </div>


        <h2 class="w3-center w3-text-theme"> Authors</h2>
        <!-- Middle Column -->
        <div class="w3-col m12">


            <div class="w3-row-padding ">

                @foreach ($profiles as $profile)
                    
                
                {{-- {% for profile in profiles %} --}}
                <div class="w3-col m4">
                    <div class=" w3-card w3-white w3-margin w3-padding w3-center">
                        <h4>{{$profile->username}} </h4>
                        {{-- <img src="" alt="profile avatar" style="max-width: 250px; max-height: 250px;  
                            border-radius: 40px; "> --}}

                        {{-- <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-theme"></i> </p>
                        <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> </p>  --}}

                            <p><i class="fa fa-at fa-fw w3-margin-right w3-text-theme"></i> {{ $profile->email }} </p>
                
                            <a href="{{ route('messages.create', $profile) }}" class="w3-button w3-theme "><i class="fa fa-envelope"></i> Send Message</a>
                                {{-- <a class="w3-button w3-gray w3-hover-gray w3-margin"><i class="fa fa-envelope"></i> Send Message</a> --}}
                       
                       
                                                 
                        <a href="{{ route ('posts.user', $profile) }}">
                            <button  class="w3-button w3-theme "><i class="fa fa-info"></i> About </button>
                        </a>
                    </div>
                </div>
                @endforeach

            </div>
            
        </div>


   
</div>





</x-layout>