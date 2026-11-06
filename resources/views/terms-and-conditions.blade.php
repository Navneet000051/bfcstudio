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
            <h1 class="bfc-privacy-policy-heading">Terms & Conditions</h1>
            <ul>
                <li>50% of the total booking amount has to be paid at the time of booking request. The remaining 50% must be
                    paid before the recording begins. The recording will commence only after the applicable payment has been
                    received.</li>
                <li>A booking may be cancelled within 7 days of making the booking or up to 7 days before the scheduled
                    shoot date, whichever is earlier.
                </li>
                <li>
                    In case of cancellation within the applicable period, the amount already paid will be refunded to the
                    original mode of payment.

                </li>
                <li>
                    Once the recording date and time are confirmed, the booking can be postponed only once, subject to
                    studio availability.

                </li>
                <li>
                    Once the booking has been postponed and a new date and time have been confirmed, no further postponement
                    will be permitted.

                </li>
                <li>
                    Raw footage can be transferred on the same day after the shoot. Please bring your own hard drive for the
                    transfer.

                </li>
                <li>
                    Guests are requested to arrive half an hour before the scheduled recording time to allow sufficient time
                    for preparation and to ensure that the shoot begins as scheduled.
                </li>
            </ul>

        </div>
    </div>
    
@endsection