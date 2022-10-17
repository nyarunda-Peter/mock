<x-layout>

    <section class="px-6 py-8">

        <form method="post">
            @csrf
            
            @error('status')
                <div>{{ $message }}</div>
            @enderror

            <div>
                <label for="">First Name</label>
                <input type="name" name="fname" required>
                @error('fname')
                <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="">Last Name</label>
                <input type="name" name="lname" required>
                {{-- is calling @error like this correct? --}}
                @error('lname')
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
                {{-- is this correct? --}}
                <label for="">Phone Number</label>
                <input type="email" name="phone" required>
                @error('phone')
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

            <div>
                <label for="">Confirm Password</label>
                <input type="password" name="cpassword" required>
                @error('cpassword')
                <div>{{ $message }}</div>
                @enderror
            </div>

            <button>Register</button>

            <br><br>

            <a href="{{ route('login') }}">Log in</a>
        </form>

     </section>

 </x-layout>
