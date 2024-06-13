  
    <x-layout> 


        <div class="w3-container w3-content" style="max-width: 1400px; margin-top: 80px;">

            <div class="w3-row-padding">
                <!-- Left Column -->
                <div class="w3-third">
                    <div class="w3-white w3-text w3-card-4">
                        <div class="w3-container">
                            <h2 class="w3-text-theme w3-center">Some greeting</h2>
                            <p class=" w3-center">Nice to meet you, welcome to us.</p>
                        </div>
                    </div><br>
                </div>
                <!-- End Left Column -->
        
                <!-- Right Column -->
                <div class="w3-twothird">
                    <div class="w3-container w3-card w3-white w3-margin-bottom">
        
        
        
                        <h2 class="w3-text-theme w3-padding-16">
                            <i class="fa fa-user-plus fa-fw w3-margin-right w3-xxlarge w3-text-theme"></i>Create new password
                        </h2>
                        <!-- Signup Form -->
                        <h3  class="w3-text-theme">Reset your password</h3>
        
                        <div class="w3-container" >
        
                            <form action="{{ route('password.update') }}" method="POST">
                                @csrf
                             
                                <input type="hidden" name="token" value="{{ $token }}">

                                <!-- Input:Email -->
                                <div class="w3-padding">
                                <label for="formInput#text">Email: </label>
                                <input
                                    id="formInput#text"
                                    type="text"
                                    name="email"
                                    value="{{ old ('email') }}"
                                    placeholder="Enter your email..."
                                />
                                </div>
                                @error('email')
                                    <p class="w3-text-red" > {{ $message }} </p>
                                @enderror
                        
                                <!-- Input:Password -->
                                <div class="w3-padding">
                                <label for="formInput#password">Password: </label>
                                <input
                                    id="formInput#passowrd"
                                    type="password"
                                    name="password"
                                    placeholder="••••••••"
                                />
                                </div>
                                @error('password')
                                    <p class="w3-text-red" > {{ $message }} </p>
                                @enderror

                                <!-- Input:Confirm Password -->
                                <div class="w3-padding">
                                    <label for="formInput#confirmpassword">Confirm password: </label>
                                    <input
                                        id="formInput#confirmpassowrd"
                                        type="password"
                                        name="password_confirmation"
                                        placeholder="••••••••"
                                    />
                                    </div>
        
                                <div >
                                <input type="submit" class="w3-button w3-theme w3-margin-top" value="Reset password"></input>
                                    <br>
                                </div>
        
                            </form>
        
                           
        
                        </div>
        
                        <div class="w3-center">
                            <p>Already have an Account?</p>
                            <a class="w3-button w3-theme" href="">Log In</a>
                          </div>
        
        
        
       
        
                    </div>
                </div>
            </div>
        </div>
        
        
    </x-layout>    
