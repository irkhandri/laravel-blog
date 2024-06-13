<x-layout>


    <div class="w3-container w3-content" style="max-width: 1400px; margin-top: 80px;">
    
        <div class="w3-row-padding">
            <!-- Left Column -->
            <div class="w3-third">
                <div class="w3-white w3-text w3-card-4">
                    <div class="w3-container">
                        <h2 class="w3-text-theme w3-center">RESET PASSWORD</h2>
                        <p class=" w3-center">Nice to meet you, welcome to us.</p>
                    </div>
                </div><br>
            </div>
            <!-- End Left Column -->
    
            <!-- Right Column -->
            <div class="w3-twothird">
                <div class="w3-container w3-card w3-white w3-margin-bottom">
    
                    @if ( session('status'))
                        <p>{{ session('status') }}</p>
                    @endif
    
    
                    <h2 class="w3-text-theme w3-padding-16">
                        <i class="fa fa-user-plus fa-fw w3-margin-right w3-xxlarge w3-text-theme"></i>Reset password
                    </h2>
                    <!-- Signup Form -->
                    <h3  class="w3-text-theme">Enter your password</h3>
    
                    <div class="w3-container" >
    
                        <form action="{{ route("password.request") }}" method="POST">
                            @csrf
                            <!-- Input:Email -->
                            <div class="w3-padding">
                            <label for="formInput#text">Email: </label>
                            <input
                                id="formInput#text"
                                type="text"
                                name="email"
                                placeholder="Enter your email..."
                            />
                            </div>
                             {{-- {% if error %}
                          <p class="w3-text-red" > {{error}} </p>
                        {% endif %} --}}
    
                            <input type="submit" class="w3-button w3-theme w3-margin-top" value="Send"></input>
    
                    
                        </form>
    
    
                    </div>
    
                </div>
            </div>
        </div>
    </div>
    
    



</x-layout>