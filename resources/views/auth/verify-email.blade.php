<x-guest-layout>
    <div style="background: #f3f4f6; min-height: 50vh; display: flex; align-items: center; justify-content: center;">
        <div style="background: #fff; max-width: 400px; width: 100%; padding: 32px 28px; border-radius: 12px; box-shadow: 0 2px 16px rgba(0,0,0,0.07);">
            <h2 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1.2rem; color: #222;">Verify Your Email</h2>
            <div style="margin-bottom: 1rem; color: #444; font-size: 1rem;">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>
    @if (session('status') == 'verification-link-sent')
                <div style="background: #e0f2fe; color: #0369a1; padding: 10px; border-radius: 4px; margin-bottom: 1rem; font-size: 0.97rem;">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif
            <div style="margin-top: 1rem; display: flex; align-items: center; justify-content: space-between;">
                <form method="POST" action="{{ route('verification.send') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" style="background: #2563eb; color: #fff; padding: 10px 18px; border: none; border-radius: 4px; font-size: 1rem; font-weight: 600; cursor: pointer;">Resend Verification Email</button>
                </form>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
            @csrf
                    <button type="submit" style="background: none; color: #2563eb; border: none; font-size: 1rem; text-decoration: underline; cursor: pointer;">Log Out</button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
