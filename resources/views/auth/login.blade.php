<x-guest-layout>
    <div style="background: #f3f4f6; min-height: 50vh; display: flex; align-items: center; justify-content: center;">
        <div style="background: #fff; max-width: 400px; width: 100%; padding: 32px 28px; border-radius: 12px; box-shadow: 0 2px 16px rgba(0,0,0,0.07);">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h2 style="font-size: 2rem; font-weight: bold; margin-bottom: 1.2rem; color: #222;">Login</h2>
                @if(session('status'))
                    <div style="background: #e0f2fe; color: #0369a1; padding: 10px; border-radius: 4px; margin-bottom: 1rem; font-size: 0.97rem;">
                        {{ session('status') }}
                    </div>
                @endif
                @if($errors->any())
                    <div style="background: #fee2e2; color: #b91c1c; padding: 10px; border-radius: 4px; margin-bottom: 1rem; font-size: 0.97rem;">
                        Please check your credentials and try again.
                    </div>
                @endif
                <div style="margin-bottom: 1rem;">
                    <label for="email" style="display: block; margin-bottom: 0.5rem; color: #222; font-size: 1rem;">Email Address</label>
                    <input id="email" name="email" type="email" required autofocus placeholder="Enter your email address" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 1rem; background: #fff;">
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="password" style="display: block; margin-bottom: 0.5rem; color: #222; font-size: 1rem;">Password</label>
                    <input id="password" name="password" type="password" required placeholder="Enter your password" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 1rem; background: #fff;">
                </div>
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                    <label style="display: flex; align-items: center; font-size: 0.97rem; color: #444;">
                        <input id="remember_me" name="remember" type="checkbox" style="margin-right: 6px;"> Remember me
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" style="color: #2563eb; text-decoration: none; font-size: 0.97rem;">Forgot password?</a>
                    @endif
                </div>
                <button type="submit" style="width: 100%; background: #2563eb; color: #fff; padding: 12px 0; border: none; border-radius: 4px; font-size: 1rem; font-weight: 600; cursor: pointer; margin-bottom: 0.5rem;">Sign In</button>
                <div style="margin-top: 1.2rem; text-align: center; font-size: 0.97rem; color: #444;">
                    Don't have an account?
                    <a href="{{ route('register') }}" style="color: #2563eb; font-weight: 500; text-decoration: none;">Create one now</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
