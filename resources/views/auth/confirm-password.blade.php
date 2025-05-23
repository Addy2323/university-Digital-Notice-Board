<x-guest-layout>
    <div style="background: #f3f4f6; min-height: 50vh; display: flex; align-items: center; justify-content: center;">
        <div style="background: #fff; max-width: 400px; width: 100%; padding: 32px 28px; border-radius: 12px; box-shadow: 0 2px 16px rgba(0,0,0,0.07);">
            <h2 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1.2rem; color: #222;">Confirm Password</h2>
            <div style="margin-bottom: 1rem; color: #444; font-size: 1rem;">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div style="margin-bottom: 1rem;">
                    <label for="password" style="display: block; margin-bottom: 0.5rem; color: #222; font-size: 1rem;">Password</label>
                    <input id="password" name="password" type="password" required placeholder="Enter your password" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 1rem; background: #fff;">
                    @if ($errors->has('password'))
                        <div style="color: #b91c1c; font-size: 0.97rem; margin-top: 0.3rem;">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <button type="submit" style="width: 100%; background: #2563eb; color: #fff; padding: 12px 0; border: none; border-radius: 4px; font-size: 1rem; font-weight: 600; cursor: pointer; margin-bottom: 0.5rem;">Confirm</button>
            </form>
        </div>
    </div>
</x-guest-layout>
