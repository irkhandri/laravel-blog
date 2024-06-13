<x-layout>



<div class="w3-container w3-content" style="max-width: 1400px; margin-top: 80px;">
    <div class="w3-row-padding">

        <div class="w3-twothird" >
            <div class="w3-container w3-card w3-white w3-margin-bottom">


            <h1 class="w3-text-theme w3-padding-16 w3-center">Send message</h1>


                <form action="{{ route("messages.store", $recipient) }}" method="POST">

                        @csrf

                        <!-- Input:Email -->
                        <div class="w3-padding">
                        <label for="formInput#text">Subject: </label>
                        <input
                            id="formInput#text"
                            type="text"
                            name="subject"
                            placeholder="Enter subject..."
                        />
                        </div>
                        @error('subject')
                        <p class="w3-text-red" > {{ $message }} </p>
                        @enderror
                
                        <div class="w3-padding">
                        <label for="formInput#textArea">Message: </label>
                        <textarea
                            id="formInput#textarea"
                            type="textArea"
                            name="body"
                            placeholder="Enter your text..."
                        ></textarea>
                        </div>
                        @error('body')
                        <p class="w3-text-red" > {{ $message }} </p>
                        @enderror

                        <div >
                        <input type="submit" class="w3-button w3-theme w3-margin-top" value=" Send"></input>
                            <br>
                        </div>

                    </form>
            
            

            </div>
        </div>
    </div>
</div>  




</x-layout>