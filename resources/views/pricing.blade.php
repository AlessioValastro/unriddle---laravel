<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/vector4.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pricing.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script defer src="{{ asset('js/app.js') }}"></script>
    <title>Prising | Unriddle</title>
</head>

<body>
    @include('components.navbar')
    <main>
        <section class="pricing__hero">
            <header>
                <h1>
                    The intelligent library for <br> researchers and students
                </h1>
                <p>
                    Unlimited access. Cancel anytime.
                </p>
                <div class="pricing__hero--switch-period">
                    <label for="Monthly">Monthly</label>
                    <label class="switch">
                        <input type="checkbox" id="togglePeriod">
                        <span class="slider"></span>
                    </label>
                    <label for="Yearly">Yearly</label>
                </div>
                <span>Save 40% on yearly plans</span>
            </header>
        </section>
        <section class="pricing__plans">
            <div class="pricing__plans--card">
                <h3>Free</h3>
                <p>For those just getting started with <br> Unriddle.</p>
                <div class="pricing__card--price">
                    <span class="price">$0</span>
                    <p>no money, <br> no problem</p>
                </div>
                <a href="/signup"><button>Choose Free</button></a>
                <div class="pricing__card--description">
                    <ul>
                        <li><img src="{{ asset('images/pricing/vector.svg') }}" alt="">15 AI text generations /
                            month</li>
                        <li><img src="{{ asset('images/pricing/vector.svg') }}" alt="">5 uploads / month</li>
                        <li><img src="{{ asset('images/pricing/vector.svg') }}" alt="">20 pages / 20 MB per
                            upload</li>
                        <li><img src="{{ asset('images/pricing/vector.svg') }}" alt="">Inactive notes and
                            documents deleted after 60 days</li>
                    </ul>
                </div>
            </div>
            <div class="pricing__plans--card">
                <h3>Pro</h3>
                <p>For quick synthesis to supercharge research and work faster.</p>
                <div class="pricing__card--price">
                    <span class="price">$20</span>
                    <p>per month <br> billed yearly</p>
                </div>
                <a href="checkout/Pro"><button>Choose Pro</button></a>
                <div class="pricing__card--description">
                    <ul>
                        <li><img src="{{ asset('images/pricing/vector.svg') }}" alt="">Unlimited AI text
                            generations</li>
                        <li><img src="{{ asset('images/pricing/vector.svg') }}" alt="">Unlimited uploads</li>
                        <li><img src="{{ asset('images/pricing/vector.svg') }}" alt="">2000 pages / 50MB per
                            upload</li>
                    </ul>
                </div>
            </div>
            <div class="pricing__plans--card">
                <h3>Premium</h3>
                <p>For deeper insights and reasoning from Unriddle’s most advanced AI models.</p>
                <div class="pricing__card--price">
                    <span class="price">$30</span>
                    <p>per month <br> billed yearly</p>
                </div>
                <a href="checkout/Premium"><button>Choose Premium</button></a>
                <div class="pricing__card--description">
                    <ul>
                        <li><img src="{{ asset('images/pricing/vector.svg') }}" alt="">Access to our premium
                            models built on GPT-4o and Claude-3.5-Sonnet.</li>
                        <li><img src="{{ asset('images/pricing/vector.svg') }}" alt="">10,000 pages / 150MB per
                            upload</li>
                        <li><img src="{{ asset('images/pricing/vector.svg') }}" alt="">Early access to new
                            features</li>
                        <li><img src="{{ asset('images/pricing/vector.svg') }}" alt="">Priority customer
                            support</li>
                    </ul>
                </div>
            </div>
            <div class="pricing__plans--card">
                <h3>Team</h3>
                <p>For fast-moving research teams integrating AI into their workflows.</p>
                <div class="pricing__card--price">
                    <span class="price">$150</span>
                    <p>per month <br> billed yearly</p>
                </div>
                <a href="checkout/Team"><button>Choose Team</button></a>
                <div class="pricing__card--description">
                    <ul>
                        <li><img src="{{ asset('images/pricing/vector.svg') }}" alt="">Invite team members</li>
                        <li><img src="{{ asset('images/pricing/vector.svg') }}" alt="">Real-time collaboration
                        </li>
                        <li><img src="{{ asset('images/pricing/vector.svg') }}" alt="">Manage and revoke access
                        </li>
                        <li><img src="{{ asset('images/pricing/vector.svg') }}" alt="">Dedicated account
                            manager</li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="faq">
            <h2>Frequently asked questions</h2>
            <div class="faq__container">
                <div class="faq__container--row">
                    <h3 class="faq__row--question">
                        What is Unriddle?
                        <img src="{{ asset('images/vector.svg') }}" alt="">
                    </h3>
                    <p class="faq__row--answer">
                        Unriddle is an AI research assistant that helps you quickly find insights in scientific
                        literature so you can write papers faster. Join hundreds of thousands of researchers using
                        Unriddle to collate and understand papers, find connections between them, elaborate on ideas
                        with the help of AI and collaborate with colleagues in a shared workspace.
                    </p>
                </div>
                <div class="faq__container--row">
                    <h3 class="faq__row--question">
                        Is there a free trial?
                        <img src="{{ asset('images/vector.svg') }}" alt="">
                    </h3>
                    <p class="faq__row--answer">
                        While we don't offer a free trial, we provide a 7-day grace period from the date of your first
                        payment. If you're unsatisfied, you can request a full refund within this period.</p>
                </div>
                <div class="faq__container--row">
                    <h3 class="faq__row--question">
                        Can I trust Unriddle to give me accurate information?
                        <img src="{{ asset('images/vector.svg') }}" alt="">
                    </h3>
                    <p class="faq__row--answer">
                        Absolutely. We designed Unriddle to work with your own data sources, answering questions based
                        on the information you provide. If an answer can't be found, the system will let you know.</p>
                </div>
                <div class="faq__container--row">
                    <h3 class="faq__row--question">
                        What is your refund policy?<img src="{{ asset('images/vector.svg') }}" alt="">
                    </h3>
                    <p class="faq__row--answer">
                        We offer a 7-day grace period from the date of your first payment. To request a refund, send us
                        a message by clicking on "Support" → "Live chat" when inside the app.</p>
                </div>
                <div class="faq__container--row">
                    <h3 class="faq__row--question">
                        Can I cancel my subscription?<img src="{{ asset('images/vector.svg') }}" alt="">
                    </h3>
                    <p class="faq__row--answer">
                        Yes, you can cancel your subscription anytime without any cancellation fee. Go to Settings,
                        click on the cog icon, select "More settings," then "Billing," and choose the cancellation
                        option. You'll retain access to paid features until the end of your billing cycle.</p>
                </div>
                <div class="faq__container--row">
                    <h3 class="faq__row--question">
                        What payment methods do you accept?<img src="{{ asset('images/vector.svg') }}"
                            alt="">
                    </h3>
                    <p class="faq__row--answer">
                        We accept most major credit and debit cards through our secure payment processor, Stripe.</p>
                </div>
                <div class="faq__container--row">
                    <h3 class="faq__row--question">
                        Is my data secure and confidential?<img src="{{ asset('images/vector.svg') }}"
                            alt="">
                    </h3>
                    <p class="faq__row--answer">
                        All data is stored in secure, GDPR-compliant cloud storage. When you delete something, it's
                        permanently removed from our system.</p>
                </div>
                <div class="faq__container--row">
                    <h3 class="faq__row--question">
                        Does Unriddle work with any PDF?<img src="{{ asset('images/vector.svg') }}" alt="">
                    </h3>
                    <p class="faq__row--answer">
                        Yes, Unriddle is designed to work with any PDF document you provide.</p>
                </div>
                <div class="faq__container--row">
                    <h3 class="faq__row--question">
                        Is Unriddle available in languages other than English?<img
                            src="{{ asset('images/vector.svg') }}" alt="">
                    </h3>
                    <p class="faq__row--answer">
                        Our interface is in English, but the AI can understand and respond in over 90 languages. Feel
                        free to ask questions in your preferred language.</p>
                </div>
            </div>
        </section>

        @include('components.footer')
    </main>

</body>

</html>
