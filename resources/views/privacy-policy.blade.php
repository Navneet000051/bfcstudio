@extends('layouts.app')
@section('content')

    <style>
        .privacy-policy-section {
            background: #f7f8fc;
            font-family: Arial, sans-serif;
        }

        .privacy-policy-header {
            max-width: 750px;
            margin: 0 auto;
        }

        .privacy-badge {
            display: inline-block;
            padding: 8px 18px;
            background: #e9ebff;
            color: #263192;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .privacy-title {
            font-size: clamp(32px, 4vw, 48px);
            font-weight: 700;
            color: #263192;
        }

        .privacy-subtitle {
            color: #647084;
            font-size: 16px;
            line-height: 1.8;
        }

        .privacy-updated {
            color: #888;
            font-size: 13px;
        }

        .privacy-sidebar {
            position: sticky;
            top: 25px;
            background: #fff;
            padding: 25px 20px;
            border-radius: 14px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.04);
        }

        .privacy-sidebar h5 {
            color: #263192;
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .privacy-sidebar a {
            display: block;
            color: #626b7b;
            text-decoration: none;
            font-size: 13px;
            padding: 10px 12px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .privacy-sidebar a:hover {
            color: #263192;
            background: #f0f1ff;
        }

        .privacy-content {
            background: #fff;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.04);
        }

        .privacy-block {
            padding-bottom: 28px;
            margin-bottom: 28px;
            border-bottom: 1px solid #edf0f5;
            scroll-margin-top: 30px;
        }

        .privacy-block:last-child {
            border-bottom: 0;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .privacy-block h2 {
            color: #263192;
            font-size: 21px;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .privacy-block p,
        .privacy-block li {
            color: #626b7b;
            font-size: 14px;
            line-height: 1.9;
        }

        .privacy-block ul {
            padding-left: 22px;
        }

        .privacy-block li {
            margin-bottom: 8px;
        }

        .privacy-contact-card {
            background: #f5f6ff;
            border-left: 4px solid #263192;
            padding: 22px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .privacy-contact-card h5 {
            color: #263192;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .privacy-contact-card p {
            margin-bottom: 8px;
        }

        @media (max-width: 991px) {
            .privacy-sidebar {
                position: static;
            }
        }

        @media (max-width: 575px) {
            .privacy-content {
                padding: 22px 18px;
            }

            .privacy-block h2 {
                font-size: 18px;
            }

            .privacy-sidebar {
                padding: 20px 15px;
            }
        }
    </style>
     <style>
        .bfc-footer {
            padding: 80px 0px 0px 0px;
        }
    </style>
    <div class="container-fluid bfc-privacy-policy pt-5 ">
         <span class="bfc-blob bfc-blob-purple" style="top: -38px; right: 8%;"></span>
        <div class="container">
            <h1 class="bfc-privacy-policy-heading">Privacy Policy</h1>
            <p class="bfc-privacy-policy-text">At BFC Studio, we value your privacy and are committed to protecting your
                personal information. This Privacy Policy outlines how we collect, use, and safeguard the data you provide
                when using our website and services.</p>
            <h3 class="bfc-privacy-policy-subheading">Information We Collect</h3>
            <p class="bfc-privacy-policy-text">We may collect personal information such as your name, email address, phone
                number, and payment details when you book our studio or subscribe to our newsletter. Additionally, we may
                collect non-personal information such as your IP address, browser type, and browsing behavior on our
                website.</p>
            <h3 class="bfc-privacy-policy-subheading">How We Use Your Information</h3>
            <p class="bfc-privacy-policy-text">The information we collect is used to provide and improve our services,
                process bookings, communicate with you regarding your reservations, and send promotional materials if you
                have opted in. We do not sell or share your personal information with third parties for marketing purposes.
            </p>
            <h3 class="bfc-privacy-policy-subheading">Data Security</h3>
            <p class="bfc-privacy-policy-text">We implement appropriate security measures to protect your personal
                information from unauthorized access, alteration, disclosure, or destruction. However, please note that no
                method of transmission over the internet or electronic storage is 100% secure.</p>
            <h3 class="bfc-privacy-policy-subheading">Your Rights</h3>
            <p class="bfc-privacy-policy-text">You have the right to access, update, or delete your personal information. If
                you wish to exercise any of these rights or have any questions regarding our Privacy Policy, please contact
                us at <a href="mailto:enquiry@bfcstudio.com">enquiry@bfcstudio.com</a>.</p>
        </div>
    </div>
@endsection