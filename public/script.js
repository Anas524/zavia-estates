let images = [];
let currentIndex = 0;

$(document).ready(function () {
    // Scroll logic for Header
    let lastScrollTop = 0;

    $(window).on('scroll', function () {
        const currentScroll = $(this).scrollTop();

        // Header background toggle
        if (currentScroll > 10) {
            $('#main-header').addClass('scrolled');
        } else {
            $('#main-header').removeClass('scrolled');
        }

        // Logo resize on scroll direction
        if (currentScroll > lastScrollTop) {
            // Scrolling down
            $('.logo img').css('height', '50px');
        } else {
            // Scrolling up
            $('.logo img').css('height', '80px');
        }

        lastScrollTop = currentScroll;
    });

    // Intro animation logic
    setTimeout(function () {
        $('#intro-screen').addClass('animate-logo');
    }, 1000); // wait 1s, then start moving

    setTimeout(function () {
        $('#intro-screen').addClass('hidden');
        $('.hero-text').addClass('reveal');
    }, 2000); // wait total 2s, then fade out


    // main screen image transform and zoom animation
    let current = 0;
    const slides = $('.slide');
    const total = slides.length;

    function showNextSlide() {
        slides.removeClass('active');
        current = (current + 1) % total;
        slides.eq(current).addClass('active');
    }

    // Start with the first slide active
    slides.eq(current).addClass('active');

    // Change slide every 6 seconds
    setInterval(showNextSlide, 6000);


    // MENU open sequence
    $('.menu-toggle').on('click', function () {
        $('#menu-overlay').css('width', '100%'); // First show overlay

        setTimeout(function () {
            $('#side-menu').css('right', '0'); // Then slide menu
        }, 400); // Delay menu until overlay is mostly in
    });

    // MENU close
    $('#close-menu').on('click', function () {
        $('#side-menu').css('right', '-400px'); // Hide menu first

        setTimeout(function () {
            $('#menu-overlay').css('width', '0%'); // Then hide overlay
        }, 300);
    });

    //section 2    
    $(window).on('scroll', function () {
        revealFromRight();
    });

    revealFromRight();

    //when click home 
    $('a[href="#home"]').on('click', function (e) {
        e.preventDefault();
        $('#leadership, #leader-detail').hide();
        $('header, #hero, #main, #about, footer').fadeIn();

        // Reset header
        $('body').removeClass('leadership-active');
    });

    // leadership section 
    $('a[href="#leadership"]').on('click', function (e) {
        e.preventDefault();

        // Show the gold overlay animation
        $('#menu-overlay').css({
            width: '100%',
            transition: 'width 0.5s ease'
        });

        // After animation, reveal leadership section
        setTimeout(function () {
            // Hide other sections
            $('#hero, #about, #main, #services, #projects, #leader-detail').hide();
            $('#leadership, footer').fadeIn();

            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });

            $('body').addClass('leadership-active');

            // Hide the overlay after it's done
            $('#menu-overlay').css({
                width: '0',
                transition: 'width 0.5s ease'
            });
            $('#side-menu').css('right', '-400px');
        }, 500);
    });

    $('.leader-card').on('click', function () {
        const leader = $(this).data('leader');

        const leaders = {
            'fawad': {
                img: 'images/CEO_Fawad Khan new with bw copy 2.png',
                name: 'Fawad Khan',
                role: 'CEO',
                phone: '+971506363249',
                email: 'fawad@zaviaestates.com',
                license: '1503080',
                location: 'The Binary by Omniyat, Business Bay, Dubai, UAE',
                bio1: 'Fawad Khan is a high-performance leader with over 14 years of cross-industry experience spanning Real Estate, BPOs, top-tier global banks, and financial institutions. His strategic vision is rooted in deep market insight and a relentless focus on client success. Over the course of his career, Fawad has closed real estate and financial transactions exceeding USD 200 million, showcasing a consistent ability to drive results at scale.',
                bio2: 'Prior to founding Zavia Estates, Fawad held a senior position at HSBC, where he advised a distinguished portfolio of UHNWIs and engineered tailored financial, investment & mortgage solutions that routinely outperformed the market. His commercial instinct, paired with a refined approach to relationship management, earned him recognition across the industry.',
                bio3: 'Since launching Zavia Estates, he has cultivated strong alliances with leading developers and UHNWIs, positioning the firm as a trusted force in Dubai’s high-value real estate market. Today, Fawad leads Zavia with a bold vision: to evolve the firm into a full-spectrum development powerhouse that reshapes the landscape of real estate in the region'
            },
            'ashiq': {
                img: 'images/COO_Ashiq Ali copy.png',
                name: 'Ashiq Ali',
                role: 'COO',
                phone: '+971542009563',
                email: 'ashiq@zaviaestates.com',
                license: '',
                location: 'The Binary by Omniyat, Business Bay, Dubai, UAE',
                bio1: 'Ashiq Ali is a highly accomplished sales and real estate professional with over 20 years of progressive leadership experience in sales strategy, business development, and investment advisory across international markets, including the UAE, Pakistan, and China. He holds a Master of Science in Financial Investments & Securities (Real Estate Investments) from Shanghai University and a Bachelor’s degree in Business Administration (Sales & Marketing) from COMSATS University.',
                bio2: 'Throughout his career, Ashiq has consistently delivered outstanding results, including generating over $480 million in real estate sales at EIGHTEEN and over $30 million in off-plan sales at MODA Real Estate Brokers LLC, where he served as Chief Commercial Officer. His expertise span strategic planning, revenue management, market intelligence, and the development of high-performing sales teams. He has a strong track record of establishing international sales networks, executing successful marketing campaigns, and leading cross-functional initiatives.',
                bio3: 'Known for his analytical approach, strong leadership, and commitment to excellence, Ashiq has received multiple awards for top performance and service excellence.'
            },
            'zubair': {
                img: 'images/CEO_Zubair khan new copy.png',
                name: 'Zubair Khan',
                role: 'CFO',
                phone: '00447391162571',
                email: 'zubair@zaviaestates.com',
                license: '',
                location: '2nd Floor, Berkeley Square House, London, UK',
                bio1: 'Zubair Khan is a qualified accountant who began his career as an auditor with a Big 4 firm in London, specializing in the Asset Management sector — including hedge funds, private equity firms, and major PLCs such as British Petroleum and GlaxoSmithKline. This robust financial foundation, built through auditing elite investment entities, provided him with a unique edge when he transitioned into real estate over 15 years ago.',
                bio2: 'Since then, Zubair has advised clients on prime residential and investment properties across some of London’s most prestigious neighborhoods. Now based between Dubai and London, he brings the same analytical rigor and client-focused mindset to Zavia Estates — operating within a fast-paced and international real estate landscape.',
                bio3: 'Whether navigating home acquisitions or complex portfolio investments, Zubair offers deep insight, seasoned experience, and a straightforward, value-driven approach tailored to high-net-worth individuals, family offices, and global investors.'
            }
        };

        const l = leaders[leader];
        $('#profile-img').attr('src', l.img);
        $('#profile-name').text(l.name);
        $('#profile-role').text(l.role);
        $('#profile-phone').text(l.phone).attr('href', `tel:${l.phone.replace(/\s+/g, '')}`);
        $('#profile-email').text(l.email).attr('href', `mailto:${l.email}`);
        if (l.license) {
            $('#profile-license').text(l.license).parent().show();
        } else {
            $('#profile-license').parent().hide();
        }
        $('#profile-location').text(l.location);
        $('#profile-bio1').text(l.bio1);
        $('#profile-bio2').text(l.bio2);
        $('#profile-bio3').text(l.bio3);

        $('#hero, #about, #main, #services, #projects, #leader-detail, #leadership').hide();
        $('#leader-detail, footer').fadeIn();

        $('body').addClass('leadership-active');

        $('#more-bios').hide();
        $('#read-more-btn').show();
        $('#read-less-btn').hide();

    });

    $('#read-more-btn').on('click', function (e) {
        e.preventDefault();
        $('#more-bios').slideDown();
        $('#read-more-btn').hide();
        $('#read-less-btn').show();

        window.scrollBy({
            top: 100,
            behavior: 'smooth'
        });
    });

    $('#read-less-btn').on('click', function (e) {
        e.preventDefault();
        $('#more-bios').slideUp();
        $('#read-less-btn').hide();
        $('#read-more-btn').show();

        const sectionTop = document.querySelector('#leader-detail').offsetTop;

        window.scrollTo({
            top: sectionTop - 20, // small offset from top
            behavior: 'smooth'
        });
    });

    $('#back-to-leadership').on('click', function (e) {
        e.preventDefault();
        $('#leader-detail').hide();
        $('#leadership').fadeIn();

        $('body').addClass('leadership-active');

        const sectionTop = document.querySelector('#leadership').offsetTop;

        window.scrollTo({
            top: sectionTop - 20, // small offset from top
            behavior: 'smooth'
        });
    });

    $('.inquire-btn').on('click', function (e) {
        e.preventDefault();

        const project = $(this).closest('.project-card').data('project');

        // Show gold overlay animation
        $('#menu-overlay').css({ width: '100%' });

        setTimeout(function () {
            // Hide everything except header and footer
            $('#hero, #about, #main, #services, #projects, #leadership, #leader-detail, #projects').hide();
            $('#project-detail, footer').fadeIn(); // #project-detail must be a new section

            // Load specific project images/text
            loadProjectDetails(project);

            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });

            // Hide overlay after animation
            $('#menu-overlay').css({ width: '0' });
        }, 500);
    });

    $('#back-to-projects').on('click', function (e) {
        e.preventDefault();

        $('#project-detail').hide();
        $('#projects, footer').fadeIn();

        window.scrollTo({ top: $('#projects').offset().top - 60, behavior: 'smooth' });
    });

    // Projects Slideshow
    $(document).on('click', '#project-gallery img', function () {
        images = $('#project-gallery img').map(function () {
            return $(this).attr('src');
        }).get();

        currentIndex = images.indexOf($(this).attr('src'));

        // Remove previous main image before appending new one
        $('.slideshow-stage .main-img').remove();

        // Create new main image and append
        const newImg = $('<img>')
            .attr('src', images[currentIndex])
            .addClass('main-img')
            .css({ position: 'absolute' });

        $('.slideshow-stage').append(newImg);

        // Show overlay
        $('#slideshow-overlay').fadeIn();

        // Update side images
        updateSlideshow();
    });

    $('#close-slideshow').on('click', function () {
        $('#slideshow-overlay').fadeOut(function () {
            // Remove dynamic main image completely
            $('.slideshow-stage .main-img').remove();

            // Optional: reset prev/next
            $('#prev-img').attr('src', '');
            $('#next-img').attr('src', '');
        });
    });

    $('#prev-slide').on('click', function () {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateSlideshow('prev');
    });

    $('#next-slide').on('click', function () {
        currentIndex = (currentIndex + 1) % images.length;
        updateSlideshow('next');
    });

    function revealFromBottom() {
        $('.reveal-bottom').each(function () {
            const windowHeight = $(window).height();
            const elementTop = $(this).offset().top;
            const scrollTop = $(window).scrollTop();

            if (elementTop < scrollTop + windowHeight * 0.9) {
                $(this).addClass('active');
            }
        });
    }

    // Run once on page load
    revealFromBottom();

    // Run on scroll
    $(window).on('scroll', revealFromBottom);

    $('.menu-items a').on('click', function (e) {
        e.preventDefault();

        const target = $(this).attr('href'); // #land, #jv, etc.

        // Close side menu
        $('#side-menu').css('right', '-400px');

        // After delay, close overlay + show content + scroll
        setTimeout(function () {
            $('#menu-overlay').css('width', '0%');

            // Show all default sections
            $('#hero, #about, #main, #services, #projects, footer').fadeIn();

            // Hide leadership sections if visible
            $('#leadership, #leader-detail').hide();

            // Remove leadership styling
            $('body').removeClass('leadership-active');

            // Smooth scroll to the target section
            if (target && target !== '#') {
                const scrollTarget = $(target);
                if (scrollTarget.length) {
                    $('html, body').animate({
                        scrollTop: scrollTarget.offset().top
                    }, 600);
                }
            }
        }, 400);
    });

    $('.footer-nav').on('click', function (e) {
        e.preventDefault();

        const target = $(this).attr('href');

        // Show default sections
        $('#hero, #about, #main, #services, #projects, footer').fadeIn();

        // Hide leadership sections if visible
        $('#leadership, #leader-detail').hide();

        $('body').removeClass('leadership-active');

        // Smooth scroll
        const scrollTarget = $(target);
        if (scrollTarget.length) {
            $('html, body').animate({
                scrollTop: scrollTarget.offset().top
            }, 600);
        }
    });

    // Section 5
    $('.contact-btn').on('click', function () {
        $('#contact-panel').fadeIn();
    });

    $('#close-contact').on('click', function () {
        $('#contact-panel').fadeOut();
    });

    // Backend 

    $('#newsletter-form').on('submit', function (e) {
        e.preventDefault();

        const form = $(this);
        const formData = new FormData(this);

        $.ajax({
            url: '/subscribe-newsletter',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#newsletter-message')
                    .text(response.message)
                    .css('color', 'green')
                    .fadeIn()
                    .delay(4000)
                    .fadeOut();
                form[0].reset();
            },
            error: function (xhr) {
                let errorMsg = "Subscription failed. Please try again.";
                if (xhr.responseJSON?.errors) {
                    const errors = xhr.responseJSON.errors;
                    errorMsg = Object.values(errors).flat().join(' ');
                }
                $('#newsletter-message')
                    .text(errorMsg)
                    .css('color', 'red')
                    .fadeIn()
                    .delay(4000)
                    .fadeOut();
            }
        });
    });

    // Open Login Sidebar
    $('#login-link').on('click', function (e) {
        e.preventDefault();
        $('#loginSidebar').addClass('active');
        $('#login-overlay').css('width', '100%');
    });

    $('#closeLoginSidebar, #login-overlay').click(function () {
        $('#loginSidebar').removeClass('active');
        $('#login-overlay').css('width', '0%'); // Hide login overlay
    });

    // Toggle password visibility
    $('.toggle-password').click(function () {
        const target = $(this).data('target');
        const input = $(target);
        const type = input.attr('type') === 'password' ? 'text' : 'password';
        input.attr('type', type);
        $(this).toggleClass('fa-eye fa-eye-slash');
    });

    // Open Register from Login Sidebar
    $('#openRegister').click(function (e) {
        e.preventDefault();
        $('#loginSidebar').removeClass('active');
        $('#login-overlay').css('width', '0%');
        $('#registerFullscreen').addClass('show');
    });

    // Close Register
    $('#closeRegisterFullscreen').click(function () {
        $('#registerFullscreen').removeClass('show');
    });

    // Open Login from Register
    $('#openLoginFromRegister').click(function (e) {
        e.preventDefault();
        $('#registerFullscreen').removeClass('show');
        $('#loginSidebar').addClass('active');
        $('#login-overlay').css('width', '100%');
    });

    // Open Account Sidebar
    $('#openAccountSidebar').click(function (e) {
        e.preventDefault();
        $('#accountSidebar').addClass('active');
        $('#login-overlay').css('width', '100%'); // reuse the overlay
    });

    // Close Account Sidebar
    $('#closeAccountSidebar, #login-overlay').click(function () {
        $('#accountSidebar').removeClass('active');
        $('#login-overlay').css('width', '0%');
    });

});

//section 2  
function revealFromRight() {
    $('.reveal-right').each(function () {
        const windowHeight = $(window).height();
        const elementTop = $(this).offset().top;
        const scrollTop = $(window).scrollTop();

        // Trigger when element is within 80% of the viewport
        if (elementTop < scrollTop + windowHeight * 0.9) {
            $(this).addClass('active');
        }
    });
}

function loadProjectDetails(project) {
    const $title = $('#project-title');
    const $gallery = $('#project-gallery');
    $gallery.empty();

    if (project === 'isolana') {
        $title.html('<h2>ISOLANA</h2>');
        for (let i = 1; i <= 37; i++) {
            const padded = i.toString().padStart(3, '0');
            const imgSrc = `images/isolana/Isolana-Residences-Brochure_${padded}.jpg`;
            $gallery.append(`<img src="${imgSrc}" alt="ISOLANA ${i}" loading="lazy" />`);
        }
    } else if (project === 'mak') {
        $title.html('<h2>MAK - ISO Bella</h2>');
        for (let i = 1; i <= 30; i++) {
            const padded = i.toString().padStart(3, '0');
            const imgSrc = `images/mak/MAK-ISola-Bella-Amenities-Brochure-compressed_${padded}.jpg`;
            $gallery.append(`<img src="${imgSrc}" alt="MAK ${i}" loading="lazy" />`);
        }
    }
}

function updateSlideshow(direction = 'next') {
    const main = $('#slideshow-img');

    const total = images.length;
    const prevIndex = (currentIndex - 1 + total) % total;
    const nextIndex = (currentIndex + 1) % total;

    $('#prev-img').attr('src', images[prevIndex]);
    $('#next-img').attr('src', images[nextIndex]);

    // Create new image
    const newImg = $('<img>')
        .attr('src', images[currentIndex])
        .addClass('main-img')
        .css({ position: 'absolute' });

    // Apply animation based on direction
    if (direction === 'next') {
        main.addClass('slide-out-left');
        newImg.addClass('slide-in-right');
    } else {
        main.addClass('slide-out-right');
        newImg.addClass('slide-in-left');
    }

    // After old image animates out
    setTimeout(() => {
        main.remove();
        $('.slideshow-stage').append(newImg);

        setTimeout(() => {
            newImg.removeClass('slide-in-right slide-in-left');
        }, 600);
    }, 600);
}
