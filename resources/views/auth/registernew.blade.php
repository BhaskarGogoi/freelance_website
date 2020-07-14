
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Register Screen">
  <meta name="author" content="Bhaskarjyoti Gogoi">
  <title>Login</title>
  <!-- Favicon -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <div class="container">
    <div class="register-card">
      <div class="register-card-header mb-5 text-center">
        <a href="/">Logo Here</a>
      </div>
      <div class="register-card-body p-5">        
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label>Register As</label>
                <div>
                    <select class="form-control" id="user_type" name="usertype"  id="exampleFormControlSelect1" required>
                        <option>Select</option>
                        <option value="user">I want to work</option>
                        <option value="client">I want to hire</option>
                    </select>
                </div>
              </div>
            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">{{ __('Phone') }}</label>
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    
                </div>
            </div>
        </form>
        <hr>
        <div class="text-center">
          Already have an account? <a href="{{ route('login') }}">Sign In</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>