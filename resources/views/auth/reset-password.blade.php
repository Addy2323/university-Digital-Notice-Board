<x-guest-layout>
    <div style="background: #f3f4f6; min-height: 50vh; display: flex; align-items: center; justify-content: center;">
        <div style="background: #fff; max-width: 400px; width: 100%; padding: 32px 28px; border-radius: 12px; box-shadow: 0 2px 16px rgba(0,0,0,0.07);">
            <h2 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1.2rem; color: #222;">Reset Password</h2>
            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div style="margin-bottom: 1rem;">
                    <label for="email" style="display: block; margin-bottom: 0.5rem; color: #222; font-size: 1rem;">Email Address</label>
                    <input id="email" name="email" type="email" required autofocus placeholder="Enter your email address" value="{{ old('email', $request->email) }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 1rem; background: #fff;">
                    @if ($errors->has('email'))
                        <div style="color: #b91c1c; font-size: 0.97rem; margin-top: 0.3rem;">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="password" style="display: block; margin-bottom: 0.5rem; color: #222; font-size: 1rem;">Password</label>
                    <input id="password" name="password" type="password" required placeholder="Create a new password" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 1rem; background: #fff;">
                    @if ($errors->has('password'))
                        <div style="color: #b91c1c; font-size: 0.97rem; margin-top: 0.3rem;">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="password_confirmation" style="display: block; margin-bottom: 0.5rem; color: #222; font-size: 1rem;">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required placeholder="Confirm your new password" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 1rem; background: #fff;">
                    @if ($errors->has('password_confirmation'))
                        <div style="color: #b91c1c; font-size: 0.97rem; margin-top: 0.3rem;">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                </div>
                <button type="submit" style="width: 100%; background: #2563eb; color: #fff; padding: 12px 0; border: none; border-radius: 4px; font-size: 1rem; font-weight: 600; cursor: pointer; margin-bottom: 0.5rem;">Reset Password</button>
            </form>
        </div>
    </div>
</x-guest-layout>
