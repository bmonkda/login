<nav>
   <ul>
        <a href="/">Inicio</a>
        @auth
            <a href="/dashboard">Dashboard</a>
            <form style="display: inline" action="/logout" method="POST">
                @csrf
                <a href="#" 
                onclick="this.closest('form').submit()">Logout</a>
                
            </form>
            
        @else
            <a href="/login">Login</a>
        
        @endauth
    </ul>
</nav>

@if (session('status'))
    {{ session('status') }}
@endif