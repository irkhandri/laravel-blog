<x-layout>
    <div class="w3-container w3-white w3-card  w3-content w3-padding-24" style="max-width: 600px; margin-top: 80px;">
        <h2  class="w3-text-theme w3-center"> Add interest</h2>
            <br>
                <div class="w3-container" >
               
                <form action="{{ route ('interests.store') }}" method="POST">

                        @csrf
                        <div class="w3-padding">
                        <label for="formInput#text">Name: </label>
                        <input
                            id="formInput#text"
                            type="text"
                            name="title"
                            placeholder="Enter title..."
                            value=""
                        />
                        </div>
                
                        <div class="w3-padding">
                        <label for="formInput#text">Description: </label>
                        <input
                            id="formInput#text"
                            type="text"
                            name="body"
                            placeholder="Enter description..."
                            value=""
                        />
                        </div>

                        <div >
                        <input type="submit" class="w3-button w3-theme w3-margin-top" value="Add interest"></input>
                            <br>
                        </div>

                    </form>

                </div>
    </div>
</x-layout>