<x-guest-layout>
    <div style="background: #f3f4f6; min-height: 50vh; display: flex; align-items: center; justify-content: center;">
        <div style="background: #fff; max-width: 400px; width: 100%; padding: 32px 28px; border-radius: 12px; box-shadow: 0 2px 16px rgba(0,0,0,0.07);">
    <form method="POST" action="{{ route('register') }}">
        @csrf
                <h2 style="font-size: 2rem; font-weight: bold; margin-bottom: 1.2rem; color: #222;">Create Account</h2>
                @if($errors->any())
                    <div style="background: #fee2e2; color: #b91c1c; padding: 10px; border-radius: 4px; margin-bottom: 1rem; font-size: 0.97rem;">
                        Please check the form for errors.
        </div>
                @endif
                <div style="margin-bottom: 1rem;">
                    <label for="name" style="display: block; margin-bottom: 0.5rem; color: #222; font-size: 1rem;">Full Name</label>
                    <input id="name" name="name" type="text" required autofocus placeholder="Enter your full name" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 1rem; background: #fff;">
        </div>
                <div style="margin-bottom: 1rem;">
                    <label for="email" style="display: block; margin-bottom: 0.5rem; color: #222; font-size: 1rem;">Email Address</label>
                    <input id="email" name="email" type="email" required placeholder="Enter your email address" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 1rem; background: #fff;">
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="password" style="display: block; margin-bottom: 0.5rem; color: #222; font-size: 1rem;">Password</label>
                    <input id="password" name="password" type="password" required placeholder="Create a strong password" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 1rem; background: #fff;">
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="password_confirmation" style="display: block; margin-bottom: 0.5rem; color: #222; font-size: 1rem;">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required placeholder="Confirm your password" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 1rem; background: #fff;">
        </div>
                <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                    <input id="terms" name="terms" type="checkbox" required style="margin-right: 6px;">
                    <label for="terms" style="font-size: 0.97rem; color: #444;">I agree to the <a href="#" style="color: #2563eb; text-decoration: none;">Terms and Conditions</a></label>
        </div>
                <button type="submit" style="width: 100%; background: #2563eb; color: #fff; padding: 12px 0; border: none; border-radius: 4px; font-size: 1rem; font-weight: 600; cursor: pointer; margin-bottom: 0.5rem;">Create Account</button>
                <div style="margin-top: 1.2rem; text-align: center; font-size: 0.97rem; color: #444;">
                    Already have an account?
                    <a href="{{ route('login') }}" style="color: #2563eb; font-weight: 500; text-decoration: none;">Sign in</a>
        </div>
    </form>
        </div>
    </div>
</x-guest-layout>
