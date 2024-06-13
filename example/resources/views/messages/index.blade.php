<x-layout>




<!-- Header -->
<div class="w3-container w3-text-theme " style="margin-top:80px">
    <h1 class="w3-center">My MailBox </h1>
</div>


<div class="w3-container w3-content" style="max-width: 1400px; margin-top: 80px;">

    <div class="w3-third">
        <a href="{{ route('messages.indexIn') }}" style="text-decoration: none;" >
        <div class="w3-white w3-text w3-card-4 w3-right  @if ($page === 'in') w3-gray  @endif
            w3-hover-gray   w3-button " style="width: 300px;">
            <div class="w3-container">
                <h2 class="w3-text-theme w3-center">Inbox</h2>
                @if ($page === 'in')
                    <p class=" w3-center w3-small">You have ({{$unread->count()}}) unread message</p>    
                @endif
            </div>
        </div>
        </a>
        <a href="{{ route('messages.indexOut') }}" style="text-decoration: none;" >
            <div class="w3-white w3-text w3-card-4 w3-right w3-button @if ($page === 'out') w3-gray w3-hover-gray  @endif " style="width: 300px;">
                <div class="w3-container">
                <h2 class="w3-text-theme w3-center">Outbox</h2>
                {{-- <!-- <p class=" w3-center">You have ({{unread}}) unread message{{unread|pluralize:"s"}}</p> -->  --}}
            </div>
        </div>
        </a>
    </div>
    


<!-- Message List -->
<div class="w3-twothird">
    <div class="w3-container w3-card w3-white w3-margin-bottom">

    <!-- Message 1 -->
    {{-- {% for mess in messages %} --}}
    @foreach ($messages as $message)
    {{-- <a href="{{ route('messages.show', $message) }}" style="text-decoration: none;"> --}}
        <div class="w3-container w3-margin w3-padding @if (!$message->isRead) w3-theme-l4  @else w3-strong @endif"
         @if ($message->isRead === false) style="font-weight: bold;" @endif>
            <p class="w3-right">  {{ $message->created_at->diffForHumans() }} </p>

            <h3> From <a href="{{ route ("posts.user", $message->sender) }}">     {{ $message->sender->username }} </a> </h3>
            <h3> To   <a href="{{ route ("posts.user", $message->recipient) }}">  {{ $message->recipient->username }} </a>  </h3>
        
            <a href="{{ route('messages.show', $message) }}" style="text-decoration: none;">
                <p style="font-weight: bold;" >Subject : {{ $message->subject }}  </p>
                <p> {{ Str::words($message->body, 20, '...') }} </p>
            </a>
        </div>
    {{-- </a> --}}
    @endforeach

    {{-- {% endfor %} --}}
</div>
    


    
</div>
</div>








</x-layout>