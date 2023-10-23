<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{--<form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')--}}
    {{--<form method="post" action="{{ route('my_page.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')--}}
    <form action="/user/{{ $user->id }}" method="POST" enctype="multipart/form-data">
        @csrf  
        @method('patch')
        <div>
            <x-input-label for="name" :value="__('名前')" />
            <x-text-input id="name" name="user[name]" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" placeholder="ユーザー名を入力"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" name="user[email]" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" placeholder="メールアドレスを入力" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        
        <div>
            <x-input-label for="bio" :value="__('bio')" />
            <x-text-input id="bio" name="user[bio]" type="text" class="mt-1 block w-full" :value="old('bio', $user->bio)" placeholder="自己紹介などを入力"/>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>
        
        <div>
            <div>
            <x-input-label for="image_path" :value="__('プロフィール画像')" />
            {{--<form action="/profile" method="post" enctype='multipart/form-data'> 
            {{ csrf_field() }}--}}
            <!-- 画像内容 -->
            <div class='image'>
                <input type="file" name="image_path">
            </div>
            {{--</form>--}}
            <x-input-error class="mt-2" :messages="$errors->get('image_path')" />
            </div>
        </div>

        <input type="submit" value="保存">
        {{--<div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            {{--@if (session('status') === 'my_page.update')--}
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>--}}
    </form>
    <div class="footer">
        <a href="/user">戻る</a>
    </div>
</section>
