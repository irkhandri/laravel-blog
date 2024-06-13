<x-layout>


<!-- Header -->
<div class="w3-container w3-text-theme w3-padding" style="margin-top:90px">
    <h1 class="w3-center">Messssaaaaageee</h1>
</div>

<!-- Current Message -->
<div  style="position: absolute;
top:40%;
left: 50%;
transform: translate(-50%, -50%);">
    
    <div class="w3-container w3-card w3-white w3-margin-left   " style="width: 900px;">
        <div class="w3-container w3-padding">
            <p class="w3-right">{{ $message->created_at->diffForHumans() }}</p>

            <p>From: <a style="text-decoration: none;font-weight: bold;" 
            
                href="{{ route ("posts.user", $message->sender) }}"> {{ $message->sender->username }}</a></p> 
            <p>To: <a style="text-decoration: none;font-weight: bold;" href="{{ route ("posts.user", $message->recipient) }}">{{ $message->recipient->username }}</a></p> 
            <p >Subject: {{$message->subject}}</p>
            <hr>
            <p>{{$message->body }}   </p>
        </div>
    </div>
    <div class="w3-container w3-center ">
        <a href="{{ route('messages.indexIn') }}" class="w3-button w3-theme-d1">Back to Inbox</a>
    </div>
</div>






</x-layout>