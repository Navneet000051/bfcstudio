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
            font-size: 15px;
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
            font-size: 16px;
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
            font-size: 19px;
            font-weight: 600;
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
            font-weight: 600;
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
                font-size: 16px;
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

        .bfc-privacy-policy li {
            font-size: 16px;
            padding-bottom: 8px;
        }
    </style>
    <div class="container-fluid bfc-privacy-policy pt-5 ">
        <span class="bfc-blob bfc-blob-purple" style="top: -38px; right: 8%;"></span>
        <div class="container">
            <h1 class="bfc-privacy-policy-heading">Privacy Policy</h1>
            <p class="bfc-privacy-policy-text">
                At BFC Studio, we value your privacy and are committed to protecting the personal information you share with
                us while making a booking or using our services.
            </p>
            <h3 class="bfc-privacy-policy-subheading">Information We Collect</h3>
            <p class="bfc-privacy-policy-text">We may collect basic personal information such as your name, contact number,
                email address, booking details, payment information, and other details required to manage your studio
                booking.
            </p>
            <h3 class="bfc-privacy-policy-subheading">How We Use Your Information
            </h3>
            <p class="bfc-privacy-policy-text">
                The information collected may be used to:
            </p>
            <ul>
                <li>Process and manage studio bookings.</li>
                <li>Communicate booking confirmations, updates, and schedule-related information.
                </li>
                <li>Process payments, cancellations, and refunds.
                </li>
                <li>Provide customer support and improve our services.
                </li>
            </ul>
            <h3 class="bfc-privacy-policy-subheading">Recording, Footage & Content Usage
            </h3>
            <p class="bfc-privacy-policy-text">
                All raw footage and recorded content will be handed over to the client as per the agreed deliverables. Once
                the content has been successfully handed over, BFC Studio will delete its copies and will not retain, use,
                publish, distribute, or share the recordings without the client's prior consent.
            </p>
            <p class="bfc-privacy-policy-text">
                If the client opts for additional services such as video editing or post-production, the relevant footage
                may be retained and accessed for the purpose of delivering those services. Any use of the content for
                promotional, marketing, or other purposes will require separate consent from the client.
            </p>
            <h3 class="bfc-privacy-policy-subheading">Data Protection</h3>

            <p class="bfc-privacy-policy-text"> We are committed to protecting your personal information and handling it
                responsibly in accordance with applicable data protection laws, including the Digital Personal Data
                Protection Act, 2023 (DPDP Act). We take reasonable measures to safeguard your information against
                unauthorised access, misuse, or disclosure. Your personal information is not sold or shared with third
                parties for their independent marketing purposes.
            </p>
            <h3 class="bfc-privacy-policy-subheading">Third-Party Services</h3>

            <p class="bfc-privacy-policy-text"> Certain services, such as payment processing, may involve third-party
                platforms. Their handling of your information is governed by their respective privacy policies.

            </p>



            <h3 class="bfc-privacy-policy-subheading">Policy Updates</h3>
            <p class="bfc-privacy-policy-text">
                BFC Studio reserves the right to update this Privacy Policy from time to time. Any changes will be reflected
                on this page.
            </p>
            <p class="bfc-privacy-policy-text">
                For any privacy-related queries, please contact us through our official communication channels.
            </p>
        </div>
    </div>
@endsection