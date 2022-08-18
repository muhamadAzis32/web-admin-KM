<x-app-layout>
    <div class="container">

        <chats :user="{{ auth()->user() }}"></chats>
    
    </div>
</x-app-layout>