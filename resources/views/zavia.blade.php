<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zavia Estates</title>
    <link rel="icon" href="images/logo-no-bg.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        if ('scrollRestoration' in history) {
            history.scrollRestoration = 'manual';
        }
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div id="intro-screen">
        <img src="images/logo-no-bg.png" alt="Zavia Estates Logo" />
    </div>

    <header id="main-header">
        <div class="logo">
            <img src="images/logo-no-bg.png" alt="Zavia Estates Logo" />
        </div>
        <div class="menu-toggle">
            <span>MENU</span>
        </div>
    </header>

    @if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Section 1 -->
    <section class="hero-slider" id="hero">
        <div class="slide" style="background-image: url('images/pexels-fredy-george-antony-19422558-6536034.jpg');">
        </div>
        <div class="slide" style="background-image: url('images/pexels-dastan-6254888.jpg');">
        </div>
        <div class="slide"
            style="background-image: url('images/vecteezy_modern-apartment-living-room-with-city-view_48834396.jpeg');">
        </div>
        <div class="slide"
            style="background-image: url('images/vecteezy_modern-architectural-design-with-copyspace-background-urban_60006026.jpeg');">
        </div>
        <div class="slide" style="background-image: url('images/pexels-perqued-13203190.jpg');"></div>

        <div class="hero-text">
            <h1>Zavia Estates</h1>
            <p>Shaping Perspectives, Elevating Living</p>
        </div>
    </section>

    <main style="margin-top: 100vh;" id="main"> <!-- Just to enable scroll -->
        <!-- Page content here -->
    </main>

    <!-- Overlay Background -->
    <div id="menu-overlay"></div>

    <!-- Right Slide-In Menu -->
    <div id="side-menu">
        <div class="side-menu-header">
            <img src="images/logo-no-bg.png" alt="Zavia Estates Logo" />
            <span id="close-menu">&times;</span>
        </div>
        <ul class="menu-items">
            <li><a class="hover-underline" href="#home"
                    onclick="window.scrollTo(0, 0); location.reload(); return false;">Home</a></li>
            <li><a class="hover-underline" href="#land">Land Acquisition</a></li>
            <li><a class="hover-underline" href="#jv">JV Advisory</a></li>
            <li><a class="hover-underline" href="#offplan">Off-plan Investment</a></li>
            <li><a class="hover-underline" href="#leadership">Leadership</a></li>
            @guest
            <li><a class="hover-underline" href="#" id="login-link">Login</a></li>
            @endguest

            @auth
            <li><a class="hover-underline" href="#" id="openAccountSidebar">My Account</a></li>
            @endauth
        </ul>
    </div>

    <div id="loginSidebar" class="login-sidebar-modern">
        <span id="closeLoginSidebar" class="close-btn">&times;</span>
        <h2 class="login-title">Welcome Back</h2>

        <form method="POST" action="{{ route('login') }}" class="login-form-modern">
            @csrf
            <div class="form-group-modern">
                <input type="email" name="email" id="email" value="{{ old('email') }}" required placeholder=" ">
                <label>Email Address</label>
            </div>

            <div class="form-group-modern password-group">
                <input type="password" name="password" id="loginPassword" required placeholder=" ">
                <label>Password</label>
                <i class="fas fa-eye toggle-password" data-target="#loginPassword"></i>
            </div>

            @if ($errors->has('login_error'))
            <p class="login-error" style="color:red; margin:0">{{ $errors->first('login_error') }}</p>
            @endif

            <div class="form-options">
                <label class="remember-me">
                    <input type="checkbox" name="remember">
                    Remember Me
                </label>

                <a href="{{ route('password.request') }}" class="hover-underline forgot-link">Forgot Password?</a>
            </div>

            <button type="submit" class="login-btn-modern">
                <span class="hover-underline">Login</span>
            </button>

            <div class="login-switch">
                <p>New to Zavia estates?</p>
                <a href="#" class="hover-underline" id="openRegister">Create an Account</a>
            </div>
        </form>
    </div>

    <div class="register-fullscreen-modern" id="registerFullscreen">
        <div class="register-modern-card">
            <span id="closeRegisterFullscreen" class="close-btn">&times;</span>
            <div class="register-logo">
                <img src="images/logo-no-bg.png" alt="logo">
            </div>
            <h2 class="register-title">Create Account</h2>
            <form method="POST" action="{{ route('register') }}" class="register-form">
                @csrf

                <div class="form-group">
                    <input type="text" name="name" required placeholder=" ">
                    <label>Full Name</label>
                </div>

                <div class="form-group">
                    <input type="email" name="email" required placeholder=" ">
                    <label>Email Address</label>
                </div>

                <div class="form-group password-group">
                    <input type="password" name="password" id="regPassword" required placeholder=" ">
                    <label>Password</label>
                    <i class="fas fa-eye toggle-password" data-target="#regPassword"></i>
                </div>

                <div class="form-group password-group">
                    <input type="password" name="password_confirmation" id="regConfirmPassword" required placeholder=" ">
                    <label>Confirm Password</label>
                    <i class="fas fa-eye toggle-password" data-target="#regConfirmPassword"></i>
                </div>

                <button type="submit" class="register-btn">
                    <span class="hover-underline">Register</span>
                </button>

                <div class="reg-login-switch">
                    <p>Already a member?</p>
                    <a href="#" class="hover-underline" id="openLoginFromRegister">Sign In</a>
                </div>

                @if ($errors->has('email'))
                <div class="error-message">
                    This email is already registered. Please sign in instead.
                </div>
                @endif
            </form>
        </div>
    </div>

    <div id="accountSidebar" class="account-sidebar">
        <div class="account-sidebar-header">
            <h2>My Account</h2>
            <span id="closeAccountSidebar" class="close-btn">&times;</span>
        </div>

        <div class="account-sidebar-content">
            @auth
            <p class="wel-text">Welcome, <strong>{{ auth()->user()->name }}</strong></p>

            @if(auth()->user()->is_admin)
            <a href="{{ route('admin.newsletter') }}" class="hover-underline admin-panel-btn" style="margin-bottom: 12px;">
                <i class="fas fa-envelope"></i> Newsletter Subscribers
            </a>
            <a href="{{ route('admin.contact') }}" class="hover-underline admin-panel-btn">
                <i class="fas fa-address-book"></i> Contact Submissions
            </a>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn hover-underline">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
            @else
            <p>You are not logged in.</p>
            @endauth
        </div>
    </div>

    <!-- Section 2 -->
    <section id="about" class="about-us-section">
        <div class="container">
            <h2 class="section-title">About Us</h2>

            <!-- Our Story -->
            <div class="about-block">
                <h3>Our Story</h3>
                <p>
                    Zavia Estates is a boutique real estate agency headquartered in Dubai, created by a forward-thinking
                    team
                    with deep expertise in land acquisition, joint ventures, and exclusive off-plan developments.
                </p>
                <p>
                    With aspirations to evolve into a full-fledged project management consultancy and developer,
                    Zavia Estates is not just navigating the market — we are shaping its future.
                </p>
            </div>

            <!-- Founder’s Vision -->
            <div class="about-block">
                <h3>Vision</h3>
                <p>
                    Rooted in discretion, excellence, and long-term vision, Zavia Estates operates at the intersection
                    of
                    opportunity and innovation. Our relationships are built on trust, our deals are driven by precision,
                    and
                    our mission is clear: To deliver unmatched value while shaping the future of real estate in Dubai.
                </p>
            </div>

            <!-- Mission & Core Values -->
            <div class="about-block two-column reveal-right">
                <div>
                    <h3>Our Mission</h3>
                    <p>
                        To guide investors and developers through every phase of their journey by combining sharp market
                        intelligence,
                        personalized service, and strategic vision to unlock enduring value.
                    </p>
                </div>
                <div>
                    <h3>Core Values</h3>
                    <ul>
                        <li>Integrity & Discretion</li>
                        <li>Client-Centered Excellence</li>
                        <li>Visionary Leadership</li>
                        <li>Precision & Innovation</li>
                    </ul>
                </div>
            </div>

            <!-- Roadmap -->
            <div class="about-block reveal-right">
                <h3>Our Roadmap</h3>
                <ul class="timeline">
                    <li><strong>2020</strong> – Zavia Estates founded as brokerage</li>
                    <li><strong>2022</strong> – Expanded into JV and Off- Plan advisory</li>
                    <li><strong>2024</strong> – Initiated land acquisition & partnerships between
                        Landowners & Developers</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Section 3 -->
    <section id="services" class="services-section">

        <!-- A. Land Acquisition -->
        <div id="land" class="service-fullscreen" style="background-image: url('images/land-advisory.png');">
            <div class="overlay">
                <div class="service-text">
                    <h2>Land Acquisition</h2>
                    <p>At Zavia Estates, land isn’t just real estate—it’s raw potential. From the dynamic skyline of
                        Downtown Dubai to the serene expanses of Al Jaddaf, from the coastal charisma of Palm Jebel Ali
                        to the strategic corridors of Dubai Island and MBR City—we specialize in unlocking prime parcels
                        across the UAE.</p>
                    <p>Whether you're a visionary developer, an institutional investor, or an international fund eyeing
                        the Middle East, our land acquisition advisory is built around insight, discretion, and
                        unmatched access. We connect our clients to opportunities others don’t even know exist—whether
                        it’s freehold plots for hospitality ventures, residential developments, or mixed-use mega
                        concepts.</p>
                    <p>Every transaction we facilitate is more than just a deal—it’s a foundation for the future.</p>
                </div>
            </div>
        </div>

        <!-- B. Joint Ventures (JV) -->
        <div id="jv" class="service-fullscreen" style="background-image: url('images/jv-structuring.png');">
            <div class="overlay">
                <div class="service-text">
                    <h2>Joint Ventures (JV)</h2>
                    <p>In a market as progressive as the UAE, partnerships define progress. At Zavia Estates, we don’t
                        just facilitate Joint Ventures—we engineer them. For developers with a vision and landowners
                        with untapped assets, we create value-aligned partnerships that turn blueprints into benchmarks.
                    </p>
                    <p>Our JV process goes beyond introductions. We conduct deep-dive feasibility studies, anchored in
                        real market data, construction economics, and regulatory frameworks. Sellers get clarity on the
                        value they’re sitting on. Developers see transparent cost-to-profit scenarios. Both parties
                        understand the math and the magic of what they can build together.</p>
                    <p>We’ve already delivered favorable JV terms with reputable developers in Dubai because we know
                        that great ventures are forged with more than contracts; they’re built on strategy, trust,
                        and mutual gain.</p>
                    <!-- <img src="images/services/jv-process.png" alt="JV Process" class="infographic"> -->
                </div>
            </div>
        </div>

        <!-- C. Off-Plan Properties -->
        <div id="offplan" class="service-fullscreen" style="background-image: url('images/offplan-investment.png');">
            <div class="overlay">
                <div class="service-text">
                    <h2>Off-Plan Properties</h2>
                    <p>Buying into tomorrow starts today. Whether you're securing your future home or positioning for
                        capital appreciation, Zavia Estates curates off-plan opportunities that are as strategic as they
                        are stylish.</p>
                    <p>From Emaar beachfront towers to Sobha’s refined luxury in Hartland, and from Danube’s
                        value-centric options to boutique gems across JVC, Dubai Islands, Arjan, and Dubai Creek
                        Harbour—our portfolio spans every major hotspot and emerging precinct in Dubai and the UAE.</p>
                    <p>But we’re not here to sell square footage, we’re here to advise. We analyze numbers, forecast
                        market trends, and map out ROIs so you can make informed choices. End-users find their ideal
                        address. Investors get the growth story they’re looking for.</p>
                    <p>At Zavia Estates, off-plan isn’t about waiting, it’s about moving ahead of the curve.</p>
                </div>
            </div>
        </div>

    </section>

    <!-- Section 4 -->
    <section id="projects" class="projects">
        <h1 class="section-title">Featured Projects</h1>
        <div class="project-grid">
            <div class="project-card reveal-bottom" data-project="isolana">
                <h3>ISOLANA</h3>
                <p><strong>Location:</strong> Dubai Islands</p>
                <p>Exclusive waterfront living. Premium units still available.</p>
                <ul class="key-features">
                    <li>High ROI up to 8%</li>
                    <li>Handover: Q4 2026</li>
                </ul>
                <a href="#" class="inquire-btn hover-underline">Inquire Now ➝</a>
            </div>

            <div class="project-card reveal-bottom" data-project="mak">
                <h3>MAK - I’Sola Bella</h3>
                <p><strong>Location:</strong> JVC, Dubai</p>
                <p>Fully sold out luxury apartments with smart living features.</p>
                <ul class="key-features">
                    <li>ROI: 7%</li>
                    <li>Handover: Completed</li>
                </ul>
                <a href="#" class="inquire-btn hover-underline">Inquire Now ➝</a>
            </div>
        </div>
    </section>

    <section id="project-detail" style="display: none;">
        <div id="project-title"></div>
        <div class="project-gallery" id="project-gallery"></div>
        <div class="back-to-projects">
            <a href="#" class="hover-underline" id="back-to-projects">← Back to Projects</a>
        </div>
    </section>

    <div id="slideshow-overlay" class="slideshow-overlay" style="display: none;">
        <span id="close-slideshow" class="close-btn">&times;</span>
        <div class="slideshow-stage">
            <img id="prev-img" class="side-img" />
            <img id="slideshow-img" class="main-img" />
            <img id="next-img" class="side-img" />
        </div>
        <button id="prev-slide" class="slideshow-button">&#10094;</button>
        <button id="next-slide" class="slideshow-button">&#10095;</button>
    </div>

    <!-- Leadership Section -->
    <section id="leadership" class="leadership" style="display: none;">
        <h1 class="section-title">LEADERSHIP</h1>
        <div class="leader-grid">
            <div class="leader-card" data-leader="fawad">
                <img src="images/CEO_Fawad Khan new with bw copy 2.png" alt="Fawad Khan" />
                <div class="hover-overlay"><span>Learn More</span></div>
                <h3>FAWAD KHAN</h3>
                <p>CEO</p>
            </div>

            <div class="leader-card" data-leader="ashiq">
                <img src="images/COO_Ashiq Ali copy.png" alt="Ashiq Ali" />
                <div class="hover-overlay"><span>Learn More</span></div>
                <h3>ASHIQ ALI</h3>
                <p>COO</p>
            </div>

            <div class="leader-card" data-leader="zubair">
                <img src="images/CEO_Zubair khan new copy.png" alt="Zubair Khan" />
                <div class="hover-overlay"><span>Learn More</span></div>
                <h3>ZUBAIR KHAN</h3>
                <p>CFO</p>
            </div>
        </div>
    </section>

    <!-- Leader Detail Section -->
    <section id="leader-detail" class="leader-detail" style="display: none;">
        <div class="profile-container">
            <div class="profile-image">
                <img id="profile-img" src="" alt="Leader Photo">
            </div>
            <div class="profile-details">
                <h1 id="profile-name">NAME</h1>
                <h3 id="profile-role">ROLE</h3>
                <p><strong>PHONE:</strong> <a id="profile-phone" href="#"></a></p>
                <p><strong>EMAIL:</strong> <a id="profile-email" href="#"></a></p>
                <p><strong>LICENSE #:</strong> <span id="profile-license"></span></p>
                <p><strong>LOCATION:</strong> <span id="profile-location"></span></p>
                <p class="bio" id="profile-bio1"></p>

                <div id="more-bios" style="display: none;">
                    <p class="bio" id="profile-bio2"></p>
                    <p class="bio" id="profile-bio3"></p>
                </div>

                <div class="bio-toggle-bar">
                    <a href="#" id="read-more-btn">View Full Bio</a>
                    <a href="#" id="read-less-btn" style="display: none;">Hide Full Bio</a>
                    <a href="#" id="back-to-leadership">← Back to Leadership</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5 -->
    <!-- LANDSCAPE VIDEOS -->
    <section class="video-showcase landscape-showcase">
        <a href="#" class="contact-btn hover-underline">Contact Us ➝</a>
        <div class="overlay-text">ZAVIA ESTATES PRESENTS</div>
        <div class="video-wrapper left">
            <video src="videos/estate2-ls.mp4" muted autoplay loop playsinline disablepictureinpicture
                controlslist="nodownload nofullscreen noremoteplayback"></video>
        </div>
        <div class="video-wrapper center">
            <video src="videos/estate1-ls.mp4" muted autoplay loop playsinline disablepictureinpicture
                controlslist="nodownload nofullscreen noremoteplayback"></video>
        </div>
        <div class="video-wrapper right">
            <video src="videos/estate3-ls.mp4" muted autoplay loop playsinline disablepictureinpicture
                controlslist="nodownload nofullscreen noremoteplayback"></video>
        </div>
    </section>

    <!-- PORTRAIT VIDEOS -->
    <!-- <section class="video-showcase portrait-showcase">
        <div class="overlay-text">ZAVIA ESTATES PRESENTS</div>
        <div class="video-wrapper">
            <video src="videos/estate4-pr.mp4" muted autoplay loop playsinline disablepictureinpicture
                controlslist="nodownload nofullscreen noremoteplayback"></video>
        </div>
        <div class="video-wrapper center">
            <video src="videos/estate5-pr.mp4" muted autoplay loop playsinline disablepictureinpicture
                controlslist="nodownload nofullscreen noremoteplayback"></video>
        </div>
        <div class="video-wrapper">
            <video src="videos/estate6-pr.mp4" muted autoplay loop playsinline disablepictureinpicture
                controlslist="nodownload nofullscreen noremoteplayback"></video>
        </div>
    </section> -->

    <div id="contact-panel" class="contact-overlay" style="display: none;">
        <div class="contact-content">
            <span id="close-contact" class="close-btn">&times;</span>

            <div class="left">
                <h3>CONTACT DETAILS</h3>
                <p class="sub-label">ZAVIA ESTATES</p>

                <p><i class="fa fa-phone"></i> <a href="tel:+971506363249" class="hover-underline">+971506363249</a></p>
                <p><i class="fa fa-envelope"></i> <a href="mailto:info@zaviaestates.com"
                        class="hover-underline">info@zaviaestates.com</a></p>
                <div class="sub-head">
                    <h4>DUBAI</h4>
                    <p>The Binary by Omniyat,<br>Business Bay, Dubai<br>United Arab Emirates</p>
                </div>

                <!-- London -->
                <div class="sub-head">
                    <h4>LONDON</h4>
                    <p>2nd Floor,<br>Berkeley Square House,<br>London, W1J 6BD<br>+44 7391162571</p>
                </div>

                <div class="contact-social-icons">
                    <a href="https://www.facebook.com/share/1Ht2MwMb8L/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/zaviaestates" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/company/zavia-estates/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div class="right">
                <h3>SUBMIT A MESSAGE</h3>
                <form method="POST" action="{{ route('contact.store') }}" id="contactForm">
                    @csrf
                    <input type="text" name="name" placeholder="Name" required />
                    <input type="email" name="email" placeholder="Email" required />
                    <input type="text" name="phone" placeholder="Phone" />
                    <textarea name="message" placeholder="Message" rows="4" required></textarea>

                    <div class="form-check">
                        <input type="checkbox" id="agree" required />
                        <label for="agree">
                            By providing your contact information, you agree to our
                            <a href="#" target="_blank">Privacy Policy</a> and consent to receive communications.
                        </label>
                    </div>

                    <button type="submit" class="hover-underline">SUBMIT</button>

                    <div id="contact-message" style="margin-top: 10px; font-size: 14px; color: green; display: none;">
                        @if(session('contact_success'))
                        Your message has been submitted successfully.
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer id="footer" class="footer">
        <div class="foot-con">

            <!-- Row 1: Logo + Newsletter -->
            <div class="row-one">
                <!-- Logo -->
                <div class="foot-logo">
                    <img src="images/logo with slogon.png" alt="Zavia Estates Logo">
                </div>

                <!-- Newsletter -->
                <div class="newsletter">
                    <h4>NEWSLETTER</h4>
                    <p>Subscribe to our Newsletter for the latest news and updates. Stay tuned!</p>
                    <form id="newsletter-form" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Your Name" class="newsletter-input" required>
                        <input type="email" name="email" placeholder="Email Address" class="newsletter-input" required>

                        <div class="newsletter-ckbox">
                            <input type="checkbox" id="newsletter-consent" required>
                            <label for="newsletter-consent" class="newsletter-label">
                                By providing Zavia Estates your contact information, you acknowledge and agree to our
                                <a href="#">Privacy Policy</a> and consent to receiving marketing communications, including
                                through automated calls, texts, and emails, some of which may use artificial or prerecorded
                                voices. This consent is not required to purchase any products or services, and you may opt
                                out at any time. To opt out from texts, you can reply ‘stop’. To opt out from emails, click
                                the unsubscribe link in the email. Message and data rates may apply.
                            </label>
                        </div>

                        <div class="subscribe-btn">
                            <button type="submit" class="subscribe-link hover-underline">SUBSCRIBE</button>
                        </div>
                        <div id="newsletter-message" style="margin-top: 10px; font-size: 14px; color: green; display: none;"></div>
                    </form>
                </div>
            </div>

            <!-- Row 2: Sitemap + Contact + Locations -->
            <div class="row-two">
                <!-- Sitemap -->
                <div class="sub-head">
                    <h4>SITEMAP</h4>
                    <p><a class="hover-underline footer-nav" href="#home"
                            onclick="window.scrollTo(0, 0); location.reload(); return false;">Home</a></p>
                    <p><a class="hover-underline footer-nav" href="#land">Land Acquisition</a></p>
                    <p><a class="hover-underline footer-nav" href="#jv">JV Advisory</a></p>
                    <p><a class="hover-underline footer-nav" href="#offplan">Off-Plan Investment</a></p>
                    <p><a class="hover-underline footer-nav" href="#leadership">Leadership</a></p>
                </div>

                <!-- Contact Info -->
                <div class="sub-head">
                    <h4>CONTACT INFO</h4>
                    <p><a class="hover-underline" href="tel:+971506363249">+971506363249</a></p>
                    <p><a class="hover-underline" href="mailto:info@zaviaestates.com">info@zaviaestates.com</a></p>
                </div>

                <!-- Dubai -->
                <div class="sub-head">
                    <h4>DUBAI</h4>
                    <p>The Binary by Omniyat,<br>Business Bay, Dubai<br>United Arab Emirates</p>
                </div>

                <!-- London -->
                <div class="sub-head">
                    <h4>LONDON</h4>
                    <p>2nd Floor,<br>Berkeley Square House,<br>London, W1J 6BD<br>+44 7391162571</p>
                </div>
            </div>

            <!-- Bottom: Social Icons + Copyright -->
            <div class="footer-bottom">
                <div class="social-icons">
                    <a href="https://www.facebook.com/share/1Ht2MwMb8L/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/zaviaestates" target="_blank"><i
                            class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/company/zavia-estates/" target="_blank"><i
                            class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
                <div class="copyright">
                    <p>&copy; 2025 Zavia Estates. All rights reserved.</p>
                </div>
            </div>

        </div>
    </footer>

    <div id="login-overlay"></div>

    <script src="script.js"></script>

    @if(session('just_logged_in'))
    <script>
        $(document).ready(function() {
            $('#accountSidebar').addClass('active');
        });
    </script>
    @endif

    @if ($errors->has('email'))
    <script>
        $(document).ready(function() {
            // Show register modal again on validation error
            $('#registerFullscreen').addClass('show');
        });
    </script>
    @endif

    @if ($errors->has('login_error'))
    <script>
        $(document).ready(function() {
            $('#loginSidebar').addClass('active');
            $('#login-overlay').css('width', '100%');
        });
    </script>
    @endif

    @if(session('contact_success'))
    <script>
        $(document).ready(function() {
            // Open the contact panel
            $('#contact-panel').fadeIn();

            // Show success message
            $('#contact-message').fadeIn();

            // Hide it after 5 seconds
            setTimeout(function() {
                $('#contact-message').fadeOut();
            }, 5000);
        });
    </script>
    @endif
</body>

</html>