<x-layout>

    <section class="px-6 py-8">

        <form method="post">
            @csrf
            
            @error('status')
                <div>{{ $message }}</div>
            @enderror

            <div>
                <label for="">Name</label>
                <input type="name" name="name" required>
                @error('name')
                <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="">Email</label>
                <input type="email" name="email" required>
                @error('email')
                <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="">Password</label>
                <input type="password" name="password" required>
                @error('password')
                <div>{{ $message }}</div>
                @enderror
            </div>

            <button>Register</button>

            <br><br>

            <a href="{{ route('login') }}">Log in</a>
        </form>

     </section>

 </x-layout>
