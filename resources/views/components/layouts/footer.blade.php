<footer>
    <div class="wrapper max-1650">
        <div class="first">
            <img src="{{
                \Illuminate\Support\Facades\Storage::url(
                    \App\Models\Setting::first()
                        ->load('images')
                        ->getMainLogo())
                    }}" alt="">
            <p>Allow Fantom to empower you in transforming your ideas into captivating digital experiences. Our team provides cutting-edge solutions and unparalleled value in delivering exceptional creative work.</p>
        </div>
        <div class="about">
            <a href="{{ route('about') }}" target="">About us</a>
            <a href="#" target="">Portfolio</a>
        </div>
        <div class="services">
            <a href="#" target="">Services</a>
            <a href="#" target="">Blog</a>
        </div>
        <div class="contact-f">
            <h4>Contact</h4>
            <ul class="cont">
                <li>
                    <a href="tel:++47 94 163 884" class="phone">
                        <img src="{{ asset('img/icons/icon-phone.svg') }}" alt="">
                        <span>+47 94 163 884</span>
                    </a>
                </li>
                <li>
                    <a href="mailto:Hello@fantomstudio.no" class="mail">
                        <img src="{{ asset('img/icons/icon-email.svg') }}" alt="">
                        <span>Hello@fantomstudio.no</span>
                    </a>
                </li>
            </ul>
            <ul class="social">
                <li>
                    <a
                        target="_blank"
                        href="https://www.facebook.com">
                        <img src="{{ asset('img/icons/icon-facebook.svg') }}" alt="">
                    </a>
                </li>
                <li>
                    <a
                        target="_blank"
                        href="https://www.linkedin.com">
                        <img src="{{ asset('img/icons/icon-linkedin.svg') }}" alt="">
                    </a>
                </li>
                <li>
                    <a
                        target="_blank"
                        href="https://www.instagram.com">
                        <img src="{{ asset('img/icons/icon-instagram.svg') }}" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="chat-wrapper">
        <img src="{{ asset('img/icons/icon-chat.svg') }}" alt="chat">
        <div class="bg-cover"></div>
        <div class="whatsapp">
            <a
                target="_blank"
                href="mailto:Hello@fantomstudio.no">
                <img src="{{ asset('img/icons/whatsapp.svg') }}" alt="">
            </a>
        </div>
        <div class="chat-email">
            <a
                target="_blank"
                href="mailto:Hello@fantomstudio.no">
                <img src="{{ asset('img/icons/chat-email.svg') }}" alt="">
            </a>
        </div>
        <div class="chat-calendly">
            <a
                target="_blank"
                href="https://calendly.com/">
                <img src="{{ asset('img/icons/chat-calendly.svg') }}" alt="">
            </a>
        </div>
    </div>
</footer>
