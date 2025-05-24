<x-guest-layout>
    <div style="background: #f3f4f6; min-height: 50vh; display: flex; align-items: center; justify-content: center;">
        <div style="background: #fff; max-width: 400px; width: 100%; padding: 32px 28px; border-radius: 12px; box-shadow: 0 2px 16px rgba(0,0,0,0.07);">
            <h2 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1.2rem; color: #222;">Forgot your password?</h2>
            <div style="margin-bottom: 1rem; color: #444; font-size: 1rem;">
                {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

            @if (session('status'))
                <div style="background: #e0f2fe; color: #0369a1; padding: 10px; border-radius: 4px; margin-bottom: 1rem; font-size: 0.97rem;">
                    {{ session('status') }}
                </div>
            @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
                <div style="margin-bottom: 1rem;">
                    <label for="email" style="display: block; margin-bottom: 0.5rem; color: #222; font-size: 1rem;">Email Address</label>
                    <input id="email" name="email" type="email" required autofocus placeholder="Enter your email address" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 1rem; background: #fff;">
                    @if ($errors->has('email'))
                        <div style="color: #b91c1c; font-size: 0.97rem; margin-top: 0.3rem;">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <button type="submit" style="width: 100%; background: #2563eb; color: #fff; padding: 12px 0; border: none; border-radius: 4px; font-size: 1rem; font-weight: 600; cursor: pointer; margin-bottom: 0.5rem;">Email Password Reset Link</button>
            </form>
        </div>
        </div>
</x-guest-layout>
