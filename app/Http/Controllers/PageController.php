<?php

namespace App\Http\Controllers;

/**
 * Serves the static marketing/booking pages for the BFC Studio site.
 *
 * Page content (sets, packages, FAQs, …) is kept here as plain arrays so the
 * Blade templates stay focused on markup. No database or backend logic is
 * touched — these are presentational pages built from the Figma design.
 */
class PageController extends Controller
{
    /**
     * The studio sets shown in the "One Studio, Different Vibes" slider and the
     * Book Studio set picker. Images live in public/images.
     */
    private function studioSets(): array
    {
        return [
            [
                'name' => 'Stage & Setup View',
                'image' => 'assets/images/one-studio/stage-setup.webp',
                'desc' => 'A glimpse of the full setup with lights, cameras, and more, highlighting the production environment.',
            ],
            [
                'name' => 'Yellow Sofa & Panel Wall',
                'image' => 'assets/images/one-studio/yellow-sofa.webp',
                'desc' => 'A vibrant and youthful lounge suited for lively debates, creative brainstorming, or expressive storytelling.',
            ],
            [
                'name' => 'Green Screen (Chroma)',
                'image' => 'assets/images/one-studio/green-screen-chroma.webp',
                'desc' => 'A flexible green screen (chroma) setup for solo explainers, or any show that needs custom digital backdrops.',
            ],
            [
                'name' => 'Interactive Screen',
                'image' => 'assets/images/one-studio/interactive-screen.webp',
                'desc' => 'A focused display area for webinars, live streams, or presentations that call for dynamic visuals and real-time engagement.',
            ],
            [
                'name' => 'Brick Wall & Wooden Chairs',
                'image' => 'assets/images/one-studio/brick-wall-wooden-chairs.webp',
                'desc' => 'A casual, cafe-style setup with warm tones, perfect for candid conversations, interviews, or lighthearted discussions.',
            ],
            [
                'name' => 'Wicker Chairs & Wooden Partition',
                'image' => 'assets/images/one-studio/wicker-chairs-wooden-partition.webp',
                'desc' => 'An earthy, intimate nook with woven seating and dark carved panels, ideal for deep reflections, cultural talks, or meaningful exchanges.',
            ],
            [
                'name' => 'Art Wall & Wicker Chairs',
                'image' => 'assets/images/one-studio/art-wall-wicker-chairs.webp',
                'desc' => 'A vibrant backdrop of books and art with cozy wicker seating, ideal for creative chats or book discussions.',
            ],
            [
                'name' => 'Bamboo Weave & Cane Chairs',
                'image' => 'assets/images/one-studio/bamboo-weave-cane-chairs.webp',
                'desc' => 'A rustic, natural backdrop with woven textures, great for nostalgic conversations, folk stories, or culture-inspired chats.',
            ],
            [
                'name' => 'Stage & Interactive Screen',
                'image' => 'assets/images/one-studio/stage-interactive-screen.webp',
                'desc' => 'A sleek platform with a large interactive screen, suited for panel discussions, product demos, or visually supported presentations.
',
            ],
            [
                'name' => 'Velvet Curtains & Modern Chairs',
                'image' => 'assets/images/one-studio/velvet-curtains-modern-chairs.webp',
                'desc' => 'A minimalist setup with rich red drapes and modern chairs, great for crisp interviews, thought-provoking debates, or casual coffee talks.',
            ],
            [
                'name' => 'Wood & Carved Panel Set',
                'image' => 'assets/images/one-studio/wood-carved-panel-set.webp',
                'desc' => 'A warm, earthy corner with carved wooden panels and soft lighting, perfect for intimate one-on-one conversations or reflective storytelling sessions.',
            ],
            [
                'name' => 'Green Room',
                'image' => 'assets/images/one-studio/green-room.webp',
                'desc' => 'A relaxed backstage space designed for touch-ups and last-minute prep before the cameras roll.',
            ],
        ];
    }

    /**
     * Pricing packages for the "Plans & Pricing" section.
     */
    private function packages(): array
    {
        return [
            [
                'name' => 'Package 1',
                'price' => '4,000',
                'featured' => false,
                'features' => ['1 Mic', '1 Camera', '2 Lights', 'Location Rental'],
            ],
            [
                'name' => 'Package 2',
                'price' => '6,000',
                'featured' => true,
                'features' => ['2 Mic', '2 Camera', '2 Lights', 'Location Rental'],
            ],
            [
                'name' => 'Package 3',
                'price' => '7,500',
                'featured' => false,
                'features' => ['2 Mic', '3 Camera', '2 Lights', 'Location Rental'],
            ],
        ];
    }

    public function home()
    {
        $stats = [
            ['value' => '4K', 'label' => 'Professional Cameras'],
            ['value' => '4.5', 'label' => 'Rated By Visitors'],
            ['value' => '3+', 'label' => 'Years of Experience'],
            ['value' => '500+', 'label' => 'Professional Shoots'],
        ];

        $facilities = [
            [
                'title' => 'Professional Camera Setup',
                'desc' => '3 full-frame professional cameras for a cinematic, high-quality production.'
            ],
            [
                'title' => 'On-Site Production Support',
                'desc' => 'A cameraperson and production assistance to help keep your shoot running smoothly.'
            ],
            [
                'title' => 'Professional Audio Equipment',
                'desc' => 'Choose from 2 Shure Dynamic Podcast Microphones, DJI Mic 3—the latest wireless microphone system—and Dijitek wireless microphones.'
            ],
            [
                'title' => 'Blackout Setup',
                'desc' => 'Full control over natural light, giving you complete flexibility with studio lighting.'
            ],
            [
                'title' => 'Professional Lighting Setup',
                'desc' => 'A complete lighting setup including 2 Godox lights, 2 soft lights, and 2 C-stand lights to create the right look for your shoot.'
            ],
            [
                'title' => 'Acoustic Setup',
                'desc' => 'A dedicated acoustic setup for clearer sound, better audio quality, and reduced outside noise.'
            ],
            [
                'title' => 'Green Room',
                'desc' => 'A dedicated space to relax and prepare before you go on camera.'
            ],
            [
                'title' => 'Post-Production Support',
                'desc' => 'Need help after the shoot? Professional video editing services are available at an additional cost.'
            ],
            [
                'title' => 'Same-Day Raw Footage Transfer',
                'desc' => 'Raw footage can be collected on the same day. Kindly bring your own hard drive for the transfer.'
            ],
            [
                'title' => 'Other Facilities',
                'desc' => 'From a fully air-conditioned space and Wi-Fi access to drinking water, clean washrooms, a lift for elderly guests, and convenient parking, the studio is equipped with everything you need for a comfortable and hassle-free experience.'
            ],
        ];

        $testimonials = [
            [
                'name' => 'Anurag Agarwal',
                'image' => 'assets/images/testimonial/anurag-agarwal.webp',
                'role' => 'Strategic Business Head',
                'quote' => 'I shot a podcast at BFC Studio, and it was a really pleasant experience. The team was welcoming, the setup was great, and everything was well-organised. The entire process felt smooth and comfortable. Would definitely love to come back!',
            ],
            [
                'name' => 'Dr Jitendra Singh',
                'image' => 'assets/images/testimonial/dr-jitendra-singh.webp',
                'role' => 'General Physician',
                'quote' => 'I was genuinely impressed with the final output of my recording at BFC Studio. The video quality, camera angles, lighting, and overall production were spot on. It\'s great to find a studio that pays attention to these little details!',
            ],
            [
                'name' => 'Gaurav Prakash',
                'image' => 'assets/images/testimonial/gaurav-prakash.webp',
                'role' => 'Partner, Universal Booksellers',
                'quote' => 'I have recorded multiple times at BFC Studio, and every visit has been great. The variety of sets that they have is quite impressive. The team is always supportive and makes sure everything runs smoothly. It\'s become one of my preferred places to record!',
            ],
            [
                'name' => 'Tanya Sahni',
                'image' => 'assets/images/testimonial/tanya-sahni.webp',
                'role' => 'Nutritionist',
                'quote' => 'The podcast was seamlessly conducted, making the entire interaction and experience both engaging and enriching. Kudos to BFC Studio for creating such a welcoming and professional platform. Truly enjoyed being a part of it!',
            ],
        ];

        $homeFaqs = [
            [
                'question' => 'How do I book a slot at the studio?',
                'answer' => "You can book a slot by filling out the form on BFC Studio's website and sharing your preferred date, time, and requirements. Once you submit your booking details, our team will get in touch with you to confirm your booking and discuss the next steps.",
            ],
            [
                'question' => 'Can I choose my set/wall theme before booking, or only after?',
                'answer' => 'Yes, you can select your preferred set or wall theme before booking. You can also get the set customised by sharing your preferences while booking the slot. Our team will get back to you to discuss your requirements and the available customisation options.',
            ],
            [
                'question' => 'Is there a cancellation or rescheduling fee?',
                'answer' => 'Yes, cancellation and rescheduling are subject to our studio booking terms and conditions. Please check the applicable terms before confirming your booking.',
            ],
        ];

        return view('home', [
            'sets' => $this->studioSets(),
            'packages' => $this->packages(),
            'stats' => $stats,
            'facilities' => $facilities,
            'testimonials' => $testimonials,
            'homeFaqs' => $homeFaqs,
        ]);
    }

    public function bookStudio()
    {
        return view('book-studio', [
            'sets' => $this->studioSets(),
            'packages' => $this->packages(),
            'terms' => [
                "You can book a slot by filling out the form on BFC Studio's website and sharing your preferred date, time, and requirements. Once you submit your booking details, our team will get in touch with you to confirm your booking and discuss the next steps.",

                'A booking may be cancelled within 7 days of making the booking or up to 7 days before the scheduled shoot date, whichever is earlier. ',

                'In case of cancellation within the applicable period, the amount already paid will be refunded to the original mode of payment.',

                'Once the recording date and time are confirmed, the booking can be postponed only once, subject to studio availability.',

                'Once the booking has been postponed and a new date and time have been confirmed, no further postponement will be permitted.',

                'Raw footage can be transferred on the same day after the shoot. Please bring your own hard drive for the transfer.',

                'Guests are requested to arrive half an hour before the scheduled recording time to allow sufficient time for preparation and to ensure that the shoot begins as scheduled.',
            ],
        ]);
    }

    public function faq()
    {
        $categories = [
            [
                'title' => 'Booking Process',
                'items' => [
                    [
                        'q' => 'How do I book a slot at the studio?',
                        'a' => "You can book a slot by filling out the form on BFC Studio’s website and sharing your preferred date, time, and requirements. Once you submit your booking details, our team will get in touch with you to confirm your booking and discuss the next steps."
                    ],
                    [
                        'q' => 'Can I choose my set/wall theme before booking, or only after?',
                        'a' => 'Yes, you can select your preferred set or wall theme before booking. You can also get the set customised by sharing your preferences while booking the slot. Our team will get back to you to discuss your requirements and the available customisation options.'
                    ],
                    [
                        'q' => 'Is there a cancellation or rescheduling fee?',
                        'a' => 'Yes, cancellation and rescheduling are subject to our studio booking terms and conditions. Please check the applicable terms before confirming your booking.'
                    ],
                    [
                        'q' => 'Do you offer same-day or last-minute bookings?',
                        'a' => 'Same-day or last-minute bookings may be possible depending on studio availability. We recommend booking in advance to secure your preferred time and slot.'
                    ],
                    [
                        'q' => 'How long is each recording slot?',
                        'a' => 'Recording slots can be booked based on your requirements. You can select your preferred slot duration while booking, with the minimum booking duration being 1 hour.'
                    ],
                    [
                        'q' => 'Can I extend my slot if my recording runs longer than planned?',
                        'a' => 'Slot extensions may be possible depending on studio availability. Additional charges may apply for extended sessions.'
                    ],
                ],
            ],
            [
                'title' => 'Sets & Themes',
                'items' => [
                    [
                        'q' => 'What wall themes/sets are available at the studio?',
                        'a' => 'We have multiple sets and wall themes available for different types of shoots. You can explore the available options while planning your shoot. You can also get the set customised by sharing your preferences while booking the slot. Our team will get back to you to discuss your requirements and the available customisation options.'
                    ],
                    [
                        'q' => 'Can I customise or request a specific set design?',
                        'a' => 'Yes. You can share your requirements with our team, and we’ll discuss the available customisation options and how we can adapt the set for your shoot.'
                    ],
                    [
                        'q' => 'What is the studio size/layout like?',
                        'a' => 'The studio is designed to accommodate different types of shoots and setups. Our team can help you plan the layout based on your shoot. Please note that only one shoot can be conducted at a time.'
                    ],
                    [
                        'q' => 'Do you provide props or backdrops beyond the standard themes?',
                        'a' => 'Props and additional backdrops are not included as standard. However, you can discuss your specific requirements with our team in advance.'
                    ],
                ],
            ],
            [
                'title' => "What's Included",
                'items' => [
                    [
                        'q' => 'What equipment is included in the booking?',
                        'a' => 'Depending on the package you choose, the studio can provide professional cameras, podcast microphones, lighting equipment, and other production essentials. The exact equipment included will depend on your selected package.'
                    ],
                    [
                        'q' => 'Do you provide a technician/crew during the session, or is it self-operated?',
                        'a' => 'Our recording packages include on-site production support. But if you only want to rent out the studio space and are bringing in your own equipment and crew, the session will be self-operated.'
                    ],
                    [
                        'q' => 'Is makeup, styling, or a green room available?',
                        'a' => 'A green room is available at the studio. Makeup and styling services are not included as standard, but you may bring your own makeup artist or stylist.'
                    ],
                    [
                        'q' => 'Do you provide raw footage, or only edited output?',
                        'a' => 'Raw footage can be provided after the shoot. You will need to bring your own hard drive for the transfer. If you require editing, post-production can be added separately depending on your requirements at an additional cost.'
                    ],
                    [
                        'q' => 'Is there a limit to the number of revisions I can request?',
                        'a' => 'The number of revisions depends on the editing package selected. Please discuss your requirements with our team before finalising the package.'
                    ],
                ],
            ],
            [
                'title' => 'Packages & Pricing',
                'items' => [
                    [
                        'q' => 'What packages do you offer?',
                        'a' => 'We offer different studio and recording packages based on the number of cameras, microphones, lighting setup, recording duration, and other requirements. Our team can help you choose the package that fits your shoot.'
                    ],
                    [
                        'q' => 'Do you offer packages for multiple video projects?',
                        'a' => 'Yes, we can discuss customised packages for multiple recording or video projects based on your requirements.'
                    ],
                    [
                        'q' => 'What payment methods do you accept, and is advance payment required?',
                        'a' => '50% advance payment is required to confirm your booking, with the remaining 50% payable before the recording begins. Our team will share the applicable payment details and terms when you book your slot. If you want to cancel the booking, you can do it within 7 days of making the booking or up to 7 days before the scheduled shoot date, whichever is earlier.'
                    ],
                ],
            ],
            [
                'title' => 'Studio Rental',
                'items' => [
                    [
                        'q' => 'Can I rent the studio without your recording package (just the space)?',
                        'a' => 'Yes. You can rent the studio space without booking a recording package, subject to availability and the applicable rental terms. Pricing may vary depending on your requirements.'
                    ],
                    [
                        'q' => 'What are your rental rates — hourly, half-day, or full-day?',
                        'a' => 'We offer different rental packages based on the duration of your booking and the equipment or facilities required. You can choose a package that suits your requirements, and our team can share the applicable rates.'
                    ],
                    [
                        'q' => 'Is there a limit on the number of people allowed during a rental session?',
                        'a' => 'The number of people allowed depends on the type of shoot and the studio setup. Please share your requirements with us in advance so we can advise accordingly.'
                    ],
                    [
                        'q' => 'Do you offer package deals for multiple rental days (weekly/monthly)?',
                        'a' => 'Yes. For recurring or long-term requirements, you can get in touch with our team to discuss a customised rental arrangement.'
                    ],
                ],
            ],
            [
                'title' => 'General Queries',
                'items' => [
                    [
                        'q' => 'Where is the studio located?',
                        'a' => 'BFC Studio is located at CP-61, Viraj Khand 4, Gomti Nagar, Lucknow, 226010.'
                    ],
                    [
                        'q' => "What are your studio’s working hours?",
                        'a' => 'The studio is open from 9:30 AM to 6:30 PM, Monday to Saturday. Sundays and the 2nd and 4th Saturdays are generally off, but bookings may be accommodated on request, subject to availability.'
                    ],
                    [
                        'q' => 'Can I visit the studio before booking to check it out?',
                        'a' => 'Yes, you can get in touch with our team to check whether a studio visit can be arranged before your booking.'
                    ],
                    [
                        'q' => 'Do you have a minimum number of episodes/sessions I need to book?',
                        'a' => 'No. You can book the studio based on your individual requirements. There is no minimum number of episodes or sessions unless applicable to a specific package.'
                    ],
                    [
                        'q' => 'Do you offer any support with content/distribution after recording (e.g., posting to platforms)?',
                        'a' => 'We offer post-production services such as editing and reels, depending on your requirements. Content distribution or platform posting can be discussed separately based on the project.'
                    ],
                    [
                        'q' => "What happens if I’m running late for my slot?",
                        'a' => 'Your booking slot remains subject to the scheduled time. If you expect to be late, please inform our team as soon as possible. Any extension will depend on studio availability and may incur additional charges.'
                    ],
                    [
                        'q' => 'Can I see examples of previous podcasts recorded at the studio?',
                        'a' => 'Yes. You can explore our previous work and recordings to get an idea of the studio setup, production quality, and available sets.'
                    ],
                    [
                        'q' => 'What if there’s a technical issue (equipment failure) during my session?',
                        'a' => 'Our team takes the necessary steps to ensure the equipment is set up and tested before recording. If a technical issue occurs during the session, our on-site team will assist in resolving it.'
                    ],
                ],
            ],
        ];

        return view('faq', ['categories' => $categories]);
    }

    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    public function cancellationrefundpolicy()
    {
        return view('cancellation-refund-policy');
    }
    public function termsandconditions()
    {
        return view('terms-and-conditions');
    }
}
