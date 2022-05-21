<!DOCTYPE html>
<html lang="en">
<head>
    @include('users.layouts.header')
</head>
<body>
    
    <section class="px-6 py-8">
        <main class="col-md-4 " style="margin: 20px auto;">
            <h1 class="text-center font-bold">REGISTER</h1>
            <form action="/register" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label for="name">Name</label>
                    <input type="text" value="{{old('name')}}" class="form-control" style="background:bisque" id="name" name="name" required>
                    @error('name')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                {{-- <div class="form-group mt-3">
                    <label for="username">Username</label>
                    <input type="text" value="{{old('username')}}"  class="form-control" style="background:bisque" id="username" name="username" required>
                    @error('username')
                    <p style="color:red">{{ $message }}</p>
                @enderror
                </div> --}}
                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input type="text" value="{{old('email')}}"  class="form-control" style="background:bisque" id="email" name="email" required>
                    @error('email')
                    <p style="color:red">{{ $message }}</p>
                @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input type="password"  class="form-control" style="background:bisque" id="password" name="password" required>
                    @error('password')
                    <p style="color:red">{{ $message }}</p>
                @enderror
                </div>
                {{-- <div class="form-group mt-3">
                    <label for="confirm-password">Confirm-password</label>
                    <input type="password"  class="form-control" style="background:bisque" id="confirm-password" name="confirm-password" required>
                    @error('confirm-password')
                    <p style="color:red">{{ $message }}</p>
                @enderror --}}
                <div class="form-group mt-3">
                    <button class="btn btn-success" type="submit">submit</button>   
                </div>
            </form>

        </main>

    </section>

</body>
</html>