
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Login Screen">
  <meta name="author" content="Bhaskarjyoti Gogoi">
	<link rel="icon" type="image/png" href="../images/favicon.png">
  <title>Login</title>
  <!-- Favicon -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/style.v3.4.css">
</head>

<body style="background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
  <div class="container">
    <div class="login-card">
      <div class="login-card-header mb-5 text-center">
        <a href="/"><img src="../images/logo.png" style="width: 100px; height: 100px;"></a>
      </div>
      <div class="login-card-body p-5">        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="phone">{{ __('Phone') }}</label>
                <input id="phone" type="text" pattern="[0-9]*" inputmode="numeric" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="off" autofocus maxlength="10">

                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>                  
            </div>
              <button type="submit" class="btn btn-primary">
                  {{ __('Login') }}
              </button>
            <div class="text-right mt-2">
              @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}" style="text-decoration: none;">
                      {{ __('Forgot Your Password?') }}
                  </a>
              @endif
            </div>
        </form>
        <hr>
        <div class="text-center">
          Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>