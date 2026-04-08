@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@600;700&family=Nunito:wght@400;500;600&display=swap');

    * { box-sizing: border-box; margin: 0; padding: 0; }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        background: #0a2a3a;
        font-family: 'Nunito', sans-serif;
    }

    /* Animated tech background */
    .bg-layer {
        position: absolute;
        inset: 0;
        background-image: url('{{ asset("media/banner-login.jpg") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        z-index: 0;
    }

    /* Dark overlay agar card tetap terbaca */
    .bg-layer::after {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(5, 25, 40, 0.55);
    }

    /* Grid overlay */
    .bg-grid {
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(0,200,255,0.06) 1px, transparent 1px),
            linear-gradient(90deg, rgba(0,200,255,0.06) 1px, transparent 1px);
        background-size: 60px 60px;
        z-index: 1;
        animation: gridPan 20s linear infinite;
    }

    @keyframes gridPan {
        0% { transform: translate(0, 0); }
        100% { transform: translate(60px, 60px); }
    }

    /* Glowing orb effects */
    .orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        z-index: 1;
        pointer-events: none;
    }
    .orb-1 {
        width: 500px; height: 500px;
        background: radial-gradient(circle, rgba(0,180,255,0.15), transparent 70%);
        top: -150px; left: -150px;
        animation: pulse 6s ease-in-out infinite alternate;
    }
    .orb-2 {
        width: 400px; height: 400px;
        background: radial-gradient(circle, rgba(0,120,200,0.12), transparent 70%);
        bottom: -100px; right: 100px;
        animation: pulse 8s ease-in-out infinite alternate-reverse;
    }

    @keyframes pulse {
        from { transform: scale(1); opacity: 0.7; }
        to { transform: scale(1.15); opacity: 1; }
    }

    /* Floating cross/plus decorations */
    .crosses {
        position: absolute;
        inset: 0;
        z-index: 2;
        pointer-events: none;
    }
    .cross {
        position: absolute;
        color: rgba(0,200,255,0.25);
        font-size: 28px;
        font-weight: 100;
        animation: floatCross 10s ease-in-out infinite;
        line-height: 1;
    }
    .cross:nth-child(1) { top: 12%; left: 8%;  animation-delay: 0s; }
    .cross:nth-child(2) { top: 30%; left: 22%; animation-delay: 1.5s; }
    .cross:nth-child(3) { top: 65%; left: 5%;  animation-delay: 3s; }
    .cross:nth-child(4) { top: 80%; left: 35%; animation-delay: 2s; }
    .cross:nth-child(5) { top: 18%; right: 12%; animation-delay: 0.5s; }
    .cross:nth-child(6) { top: 55%; right: 8%; animation-delay: 2.5s; }
    .cross:nth-child(7) { top: 75%; right: 25%; animation-delay: 4s; }
    .cross:nth-child(8) { top: 40%; left: 42%; animation-delay: 1s; }

    @keyframes floatCross {
        0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0.3; }
        50% { transform: translateY(-12px) rotate(5deg); opacity: 0.6; }
    }

    /* Decorative squares */
    .sq {
        position: absolute;
        border: 1px solid rgba(0,200,255,0.2);
        z-index: 2;
        pointer-events: none;
    }
    .sq-1 { width: 80px; height: 80px; top: 15%; left: 18%; transform: rotate(15deg); }
    .sq-2 { width: 50px; height: 50px; bottom: 25%; left: 10%; transform: rotate(-10deg); }
    .sq-3 { width: 60px; height: 60px; top: 25%; right: 18%; transform: rotate(20deg); }
    .sq-4 { width: 90px; height: 90px; bottom: 20%; right: 12%; transform: rotate(-5deg); }

    /* Map/world overlay texture */
    .map-overlay {
        position: absolute;
        inset: 0;
        background:
            radial-gradient(ellipse at 30% 60%, rgba(0,160,230,0.07) 0%, transparent 50%),
            radial-gradient(ellipse at 70% 30%, rgba(0,120,200,0.05) 0%, transparent 40%);
        z-index: 2;
    }

    /* Code text overlay */
    .code-overlay {
        position: absolute;
        top: 0; left: 0;
        width: 45%;
        height: 100%;
        z-index: 3;
        overflow: hidden;
        pointer-events: none;
        opacity: 0.18;
    }
    .code-overlay pre {
        font-family: 'Courier New', monospace;
        font-size: 11px;
        color: #00d4ff;
        line-height: 1.6;
        padding: 20px;
        white-space: pre-wrap;
        word-break: break-all;
    }

    /* Right side code overlay */
    .code-overlay-right {
        position: absolute;
        bottom: 0; right: 0;
        width: 30%;
        height: 40%;
        z-index: 3;
        overflow: hidden;
        pointer-events: none;
        opacity: 0.15;
    }
    .code-overlay-right pre {
        font-family: 'Courier New', monospace;
        font-size: 10px;
        color: #00d4ff;
        line-height: 1.6;
        padding: 20px;
        white-space: pre-wrap;
    }

    /* Login card */
    .login-card {
        position: relative;
        z-index: 10;
        background: rgba(255,255,255,0.97);
        border-radius: 12px;
        padding: 48px 44px 40px;
        width: 100%;
        max-width: 460px;
        box-shadow:
            0 0 0 1px rgba(255,255,255,0.1),
            0 25px 60px rgba(0,0,0,0.4),
            0 0 80px rgba(0,180,255,0.1);
        animation: cardIn 0.7s cubic-bezier(0.16,1,0.3,1) both;
    }

    @keyframes cardIn {
        from { opacity: 0; transform: translateY(30px) scale(0.97); }
        to   { opacity: 1; transform: translateY(0) scale(1); }
    }

    .brand-title {
        font-family: 'Rajdhani', sans-serif;
        font-size: 42px;
        font-weight: 700;
        letter-spacing: 3px;
        text-align: center;
        background: linear-gradient(90deg, #00c6f7, #0099e5, #00d4ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 6px;
        text-transform: uppercase;
    }

    .login-subtitle {
        text-align: center;
        color: #333;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 4px;
    }

    .login-hint {
        text-align: center;
        color: #999;
        font-size: 13px;
        margin-bottom: 32px;
    }

    /* Input groups */
    .input-group {
        position: relative;
        margin-bottom: 16px;
    }

    .input-icon {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #aaa;
        font-size: 16px;
        z-index: 2;
        pointer-events: none;
    }

    .login-input {
        width: 100%;
        padding: 14px 16px 14px 46px;
        border: 1.5px solid #e5e7eb;
        border-radius: 8px;
        font-size: 14px;
        font-family: 'Nunito', sans-serif;
        color: #333;
        background: #fafafa;
        transition: border-color 0.25s, box-shadow 0.25s, background 0.25s;
        outline: none;
    }

    .login-input::placeholder { color: #bbb; }

    .login-input:focus {
        border-color: #00b4d8;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(0,180,216,0.12);
    }

    /* Password toggle */
    .toggle-password {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        color: #aaa;
        padding: 4px;
        display: flex;
        align-items: center;
        transition: color 0.2s;
        z-index: 3;
    }
    .toggle-password:hover { color: #00b4d8; }

    /* Remember me */
    .remember-row {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 24px;
        margin-top: 4px;
    }

    .custom-checkbox {
        width: 18px;
        height: 18px;
        border: 2px solid #ccc;
        border-radius: 4px;
        appearance: none;
        cursor: pointer;
        position: relative;
        transition: border-color 0.2s, background 0.2s;
        flex-shrink: 0;
    }

    .custom-checkbox:checked {
        background: #00b4d8;
        border-color: #00b4d8;
    }

    .custom-checkbox:checked::after {
        content: '';
        position: absolute;
        left: 4px; top: 1px;
        width: 6px; height: 10px;
        border: 2px solid white;
        border-top: none;
        border-left: none;
        transform: rotate(40deg);
    }

    .remember-label {
        font-size: 14px;
        color: #555;
        cursor: pointer;
        user-select: none;
    }

    /* Sign in button */
    .btn-signin {
        width: 100%;
        padding: 15px;
        background: linear-gradient(90deg, #0099e5, #00c6f7);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        font-family: 'Nunito', sans-serif;
        letter-spacing: 1px;
        cursor: pointer;
        transition: opacity 0.2s, transform 0.15s, box-shadow 0.2s;
        box-shadow: 0 4px 20px rgba(0,180,216,0.35);
        text-transform: uppercase;
    }

    .btn-signin:hover {
        opacity: 0.92;
        transform: translateY(-1px);
        box-shadow: 0 8px 28px rgba(0,180,216,0.45);
    }

    .btn-signin:active {
        transform: translateY(0);
    }

    /* Terms text */
    .terms-text {
        text-align: center;
        font-size: 12px;
        color: #aaa;
        margin-top: 22px;
        line-height: 1.6;
    }

    .terms-text a {
        color: #00b4d8;
        text-decoration: none;
    }

    /* Error messages */
    .alert-error {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #dc2626;
        padding: 12px 14px;
        border-radius: 8px;
        font-size: 13px;
        margin-bottom: 16px;
    }
</style>

<div class="login-wrapper">
    <!-- Background layers -->
    <div class="bg-layer"></div>
    <div class="bg-grid"></div>
    <div class="map-overlay"></div>

    <!-- Glowing orbs -->
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <!-- Decorative squares -->
    <div class="sq sq-1"></div>
    <div class="sq sq-2"></div>
    <div class="sq sq-3"></div>
    <div class="sq sq-4"></div>

    <!-- Floating plus signs -->
    <div class="crosses">
        <span class="cross">+</span>
        <span class="cross">+</span>
        <span class="cross">+</span>
        <span class="cross">+</span>
        <span class="cross">+</span>
        <span class="cross">+</span>
        <span class="cross">+</span>
        <span class="cross">+</span>
    </div>

    <!-- Left code overlay -->
    <div class="code-overlay">
        <pre>
//get the server path to the gallery to delete
$dir = realpath('../' . $delete);
if(is_dir($dir)){
    //delete the gallery
    rmdir($dir);
}

save new menu.xml
$me = realpath('../menu.xml');

//xml for new menu.xml
&lt;menu&gt;\n
$es[0] = '';
foreach($names as $key =&gt; $value){
    $xml .= '&lt;menu name="' . $key . '"&gt;';
    $value = 'V folder';
    closedDir($key);
&lt;/menu&gt;';

// sure menu.xml exists and is writable
is_writable($filename)){
//open the file
$handle = fopen($filename, 'wb');
    'Cannot open file';

//writing new xml
$handle($handle, $xml);
if($handle($xml)) {= FALSE){
    'Cannot write to file';

saving new xml
$handle($handle);
        </pre>
    </div>

    <!-- Right/bottom code overlay -->
    <div class="code-overlay-right">
        <pre>
&lt;?php
//the user
require_once(__FILE__ . '/includes/check_user.php');
require_once(__FILE__ . '/includes/functions.php');

//get the post variables
$deletes = explode(',', $_POST['al_deletes']);
$names = explode(',', $_POST['gal_names']);
$folders = explode(',', $_POST['gal_folders']);
        </pre>
    </div>

    <!-- Login Card -->
    <div class="login-card">
        <div class="brand-title">SMART JMP</div>
        <div class="login-subtitle">Login to your account</div>
        <div class="login-hint">Your credentials</div>

        @if($errors->any())
        <div class="alert-error">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="input-group">
                <span class="input-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </span>
                <input
                    type="text"
                    name="email"
                    class="login-input"
                    placeholder="Username"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >
            </div>

            <div class="input-group">
                <span class="input-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                </span>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="login-input"
                    placeholder="Password"
                    style="padding-right: 46px;"
                    required
                >
                <button type="button" class="toggle-password" onclick="togglePassword()" id="toggleBtn" title="Tampilkan password">
                    <svg id="icon-eye" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                    <svg id="icon-eye-off" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none;">
                        <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
                        <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
                        <line x1="1" y1="1" x2="23" y2="23"/>
                    </svg>
                </button>
            </div>

            <div class="remember-row">
                <input type="checkbox" name="remember" id="remember" class="custom-checkbox" checked>
                <label for="remember" class="remember-label">Remember</label>
            </div>

            <button type="submit" class="btn-signin">Sign in</button>

            <p class="terms-text">
                Dengan melanjutkan, Anda mengonfirmasi bahwa Anda telah<br>
                membaca <a href="#">Syarat &amp; Ketentuan</a> dan <a href="#">Kebijakan Cookie</a> kami
            </p>
        </form>
    </div>
</div>
<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const eyeOn  = document.getElementById('icon-eye');
        const eyeOff = document.getElementById('icon-eye-off');
        const isHidden = input.type === 'password';

        input.type = isHidden ? 'text' : 'password';
        eyeOn.style.display  = isHidden ? 'none'  : 'block';
        eyeOff.style.display = isHidden ? 'block' : 'none';
    }
</script>
@endsection