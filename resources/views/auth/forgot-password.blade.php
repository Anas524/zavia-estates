<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
    <link rel="icon" href="images/logo-no-bg.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        @font-face {
            font-family: 'Glyce-font';
            src: url('<?php echo asset('fonts/GlyceRegular-9M7DB.woff2'); ?>') format('woff2'),
                url('<?php echo asset('fonts/GlyceRegular-9M7DB.woff'); ?>') format('woff');
        }

        * {
            caret-color: transparent;
            user-select: none;
            box-sizing: border-box;
        }

        input,
        textarea,
        select,
        filter {
            caret-color: auto !important;
            user-select: text !important;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            background: #111;
            color: white;
            font-family: 'Montserrat', sans-serif;
            ;
        }

        .reset-container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        h2 {
            font-family: 'Glyce-font';
            color: #EFBF04;
        }

        .logo img {
            height: 150px;
            width: auto;
            transition: height 0.3s ease;
        }

        input,
        button {
            padding: 10px;
            margin-top: 10px;
            display: block;
            width: 300px;
        }

        .custom-btn {
            background: none;
            border: none;
            color: white;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            padding: 10px 0;
            display: inline-block;
            position: relative;
        }

        .hover-underline {
            position: relative;
            display: inline-block;
            text-decoration: none;
            cursor: pointer;
        }

        .hover-underline::after {
            content: "";
            position: absolute;
            bottom: -4px;
            left: 0;
            height: 2px;
            width: 0;
            background: currentColor;
            transition: width 0.3s ease;
        }

        .hover-underline:hover::after {
            width: 100%;
        }

        .form-group-modern {
            position: relative;
            border-top: 1px solid #999;
        }

        .form-group-modern input {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 2px solid #444;
            border-top: 2px solid transparent;
            border-bottom-left-radius: 6px;
            border-bottom-right-radius: 6px;
            padding: 12px 10px;
            font-size: 16px;
            color: white;
            outline: none;
            transition: all 0.3s ease;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            box-shadow: 0 0 0px 1000px black inset !important;
            -webkit-text-fill-color: #fff !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        .form-group-modern input:focus {
            border-color: var(--color-gold);
            background: transparent !important;
            outline: none;
            box-shadow: none;
            border-bottom: 2px solid var(--color-gold);
            border-top: 2px solid var(--color-gold);
        }

        .form-group-modern label {
            position: absolute;
            top: 14px;
            left: 12px;
            font-size: 14px;
            color: #aaa;
            pointer-events: none;
            transition: 0.3s ease;
        }

        .form-group-modern input:focus+label,
        .form-group-modern input:not(:placeholder-shown)+label {
            top: -10px;
            left: 10px;
            font-size: 12px;
            color: var(--color-gold);
            background-color: #111;
            padding: 0 4px;
            border-top: 2px solid var(--color-gold);
        }

        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #aaa;
            /* Golden color */
            font-size: 18px;
            z-index: 2;
        }
    </style>
</head>

<body>
    <div class="reset-container">
        <div class="logo">
            <img src="{{ asset('images/logo-no-bg.png') }}" alt="Zavia Estates Logo" />
        </div>

        <h2>Reset Your Password</h2>

        @if (session('status'))
        <p style="color: green;">{{ session('status') }}</p>
        @endif

        @if (!isset($token))
        {{-- 🔐 Request Reset Link Form --}}
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group-modern">
                <input type="email" name="email" required placeholder=" ">
                <label>Email Address</label>
            </div>
            <button type="submit" class="custom-btn">
                <span class="hover-underline">Send Reset Link</span>
            </button>
        </form>
        @else
        {{-- 🔐 Reset Password Form --}}
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group-modern">
                <input type="email" name="email" required placeholder=" " value="{{ request()->email }}">
                <label>Email Address</label>
            </div>

            <div class="form-group-modern">
                <input type="password" name="password" id="resetPassword" required placeholder=" ">
                <label>New Password</label>
                <i class="fas fa-eye toggle-password" data-target="#resetPassword"></i>
            </div>

            <div class="form-group-modern">
                <input type="password" name="password_confirmation" id="resetConfirmPassword" required placeholder=" ">
                <label>Confirm Password</label>
                <i class="fas fa-eye toggle-password" data-target="#resetConfirmPassword"></i>
            </div>

            <button type="submit" class="custom-btn">
                <span class="hover-underline">Reset Password</span>
            </button>
        </form>
        @endif
    </div>

    <script>
        $(document).ready(function() {
            $('.toggle-password').on('click', function() {
                const target = $(this).data('target');
                const input = $(target);
                const type = input.attr('type') === 'password' ? 'text' : 'password';
                input.attr('type', type);
                $(this).toggleClass('fa-eye fa-eye-slash');
            });
        });
    </script>
</body>

</html>