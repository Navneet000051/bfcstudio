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
                'name'  => 'Stage & Setup View',
                'image' => 'images/one-studio/stage-setup.webp',
                'desc'  => 'A glimpse of the full setup with lights, cameras, and more, highlighting the production environment.',
            ],
            [
                'name'  => 'Yellow Sofa & Panel Wall',
                'image' => 'images/one-studio/yellow-sofa.webp',
                'desc'  => 'A vibrant and youthful lounge suited for lively debates, creative brainstorming, or expressive storytelling.',
            ],
            [
                'name'  => 'Green Screen (Chroma)',
                'image' => 'images/one-studio/green-screen-chroma.webp',
                'desc'  => 'A flexible green-screen chroma setup for virtual backgrounds and any look your content needs.',
            ],
            [
                'name'  => 'Interactive Screen',
                'image' => 'images/one-studio/interactive-screen.webp',
                'desc'  => 'A focused display area for webinars, live streams, or presentations that call for dynamic visuals and real-time engagement.',
            ],
            [
                'name'  => 'Brick Wall & Wooden Chairs',
                'image' => 'images/one-studio/brick-wall-wooden-chairs.webp',
                'desc'  => 'A casual, cafe-style setup with warm tones, perfect for candid conversations, interviews, or lighthearted discussions.',
            ],
            [
                'name'  => 'Wicker Chairs & Wooden Partition',
                'image' => 'images/one-studio/wicker-chairs-wooden-partition.webp',
                'desc'  => 'An earthy, intimate nook with woven seating and dark carved panels, ideal for deep reflections, cultural talks, or meaningful exchanges.',
            ],
            [
                'name'  => 'Art Wall & Wicker Chairs',
                'image' => 'images/one-studio/art-wall-wicker-chairs.webp',
                'desc'  => 'A vibrant backdrop of books and art with cozy wicker seating, ideal for creative chats or book discussions.',
            ],
            [
                'name'  => 'Bamboo Weave & Cane Chairs',
                'image' => 'images/one-studio/bamboo-weave-cane-chairs.webp',
                'desc'  => 'A rustic, natural backdrop with woven textures, great for nostalgic conversations, folk stories, or culture-inspired chats.',
            ],
            [
                'name'  => 'Stage & Interactive Screen',
                'image' => 'images/one-studio/stage-interactive-screen.webp',
                'desc'  => 'A focused display area for webinars, live streams, or presentations that call for dynamic visuals and real-time engagement.',
            ],
            [
                'name'  => 'Velvet Curtains & Modern Chairs',
                'image' => 'images/one-studio/velvet-curtains-modern-chairs.webp',
                'desc'  => 'A minimalist setup with rich red drapes and modern chairs, great for crisp interviews, thought-provoking debates, or casual coffee talks.',
            ],
            [
                'name'  => 'Wood & Carved Panel Set',
                'image' => 'images/one-studio/wood-carved-panel-set.webp',
                'desc'  => 'A warm, earthy corner with carved wooden panels and soft lighting, perfect for intimate one-on-one conversations or reflective storytelling sessions.',
            ],
            [
                'name'  => 'Green Room',
                'image' => 'images/one-studio/green-room.webp',
                'desc'  => 'A relaxed backstage space designed for touch-ups and last-minute prep before the cameras roll.',
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
                'name'     => 'Package 1',
                'price'    => '4,000',
                'featured' => false,
                'features' => ['1 Mic', '1 Camera', '2 Lights', 'Location Rental'],
            ],
            [
                'name'     => 'Package 2',
                'price'    => '6,000',
                'featured' => true,
                'features' => ['2 Mic', '2 Camera', '2 Lights', 'Location Rental'],
            ],
            [
                'name'     => 'Package 3',
                'price'    => '7,500',
                'featured' => false,
                'features' => ['2 Mic', '3 Camera', '2 Lights', 'Location Rental'],
            ],
        ];
    }

    public function home()
    {
        $stats = [
            ['value' => '4K',   'label' => 'Professional Cameras'],
            ['value' => '4.5',  'label' => 'Rated By Visits'],
            ['value' => '3+',   'label' => 'Years of Experience'],
            ['value' => '500+', 'label' => 'Professional Shoots'],
        ];

        $facilities = [
            ['title' => 'Professional Camera Setup',    'desc' => '3 full-frame professional cameras for a cinematic, high-quality production.'],
            ['title' => 'Acoustic Setup',               'desc' => 'A dedicated acoustic setup for clearer sound, better audio quality, and reduced outside noise.'],
            ['title' => 'On-Site Production Support',    'desc' => 'A cameraperson and production assistance to help keep your shoot running smoothly.'],
            ['title' => 'Green Room',                    'desc' => 'A dedicated space to relax and prepare before you go on camera.'],
            ['title' => 'Professional Audio Equipment',  'desc' => 'Choose from 2 Shure Dynamic Podcast Microphones, DJI Mic 3—the latest wireless microphone system—and Dijitek wireless microphones.'],
            ['title' => 'Post-Production Support',       'desc' => 'Need help after the shoot? Professional video editing services are available at an additional cost.'],
            ['title' => 'Blackout Setup',               'desc' => 'Full control over natural light, giving you complete flexibility with studio lighting.'],
            ['title' => 'Same-Day Raw Footage Transfer', 'desc' => 'Raw footage can be collected on the same day. Kindly bring your own hard drive for the transfer.'],
            ['title' => 'Professional Lighting Setup',   'desc' => 'A complete lighting setup including 2 Godox lights, 2 soft lights, and 2 C-stand lights to create the right look for your shoot.'],
            ['title' => 'Other Facilities',             'desc' => 'From a fully air-conditioned space and Wi-Fi access to drinking water, clean washrooms, a lift for elderly guests, and convenient parking, the studio is equipped with everything you need for a comfortable and hassle-free experience.'],
        ];

        $testimonials = [
            [
                'name' => 'Riya Kapoor',
                'image' => 'images/testimonial/2.png',
                'role' => 'Host, weekly interview show',
                'quote' => 'We booked a slot the night before and walked in to a fully lit set. Our editor had raw footage by evening.',
            ],
            [
                'name' => 'Aman Verma',
                'image' => 'images/testimonial/1.jpg',
                'role' => 'Solo explainer channel',
                'quote' => 'The green screen setup saved us from building our own backdrop for every episode. It just works.',
            ],
            [
                'name' => 'Sana Iqbal',
                'image' => 'images/testimonial/4.jpg',
                'role' => 'Producer, panel discussions',
                'quote' => 'Booking five guests for a panel used to be the hard part. The slot picker made it a two-minute job.',
            ],
            [
                'name' => 'Riya Kapoor',
                'image' => 'images/testimonial/3.jpg',
                'role' => 'Host, weekly interview show',
                'quote' => 'We booked a slot the night before and walked in to a fully lit set. Our editor had raw footage by evening.',
            ],
        ];

        $homeFaqs = [
            [
                'question' => 'How do I book a slot at the studio?',
                'answer' => "You can book a slot by filling out the form on BFC Studio's website and sharing your preferred date, time, and requirements. Once you submit your booking details, our team will get in touch with you to confirm your booking and discuss the next steps.",
            ],
            [
                'question' => 'Can I choose my set/wall theme before booking, or only after?',
                'answer' => 'You can choose your set and wall theme while booking, and discuss any custom needs with our team beforehand.',
            ],
            [
                'question' => 'Is there a cancellation or rescheduling fee?',
                'answer' => 'Cancellations and reschedules within the applicable window carry no extra fee, and any amount paid is refunded to the original payment method.',
            ],
        ];

        return view('home', [
            'sets'         => $this->studioSets(),
            'packages'     => $this->packages(),
            'stats'        => $stats,
            'facilities'   => $facilities,
            'testimonials' => $testimonials,
            'homeFaqs'     => $homeFaqs,
        ]);
    }

    public function bookStudio()
    {
        return view('book-studio', [
            'sets'     => $this->studioSets(),
            'packages' => $this->packages(),
            'terms'    => [
                "You can book a slot by filling out the form on BFC Studio's website and sharing your preferred date, time, and requirements. Once you submit your booking details, our team will get in touch with you to confirm your booking and discuss the next steps.",
                'A booking may be cancelled within 7 days of making the booking or up to 7 days before the scheduled shoot date, whichever is earlier.',
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
                    ['q' => 'How do I book a slot at the studio?', 'a' => "Fill out the booking form with your preferred date, time and requirements. Our team will confirm your slot and walk you through the next steps."],
                    ['q' => 'Can I choose my set/wall theme before booking, or only after?', 'a' => 'You can choose your set and wall theme while booking, and discuss any custom needs with our team beforehand.'],
                    ['q' => 'Is there a cancellation or rescheduling fee?', 'a' => 'Cancellations and reschedules within the applicable window carry no extra fee, and any amount paid is refunded to the original payment method.'],
                    ['q' => 'Do you offer same-day or last-minute bookings?', 'a' => 'Same-day and last-minute bookings may be accommodated on request, subject to studio availability.'],
                    ['q' => 'How long is each recording slot?', 'a' => 'Slots are booked per hour, and you can reserve as many consecutive hours as you need for your shoot.'],
                    ['q' => 'Can I extend my slot if my recording runs longer than planned?', 'a' => 'Yes, slots can be extended on the day if the studio is free afterwards. Just let the on-site team know.'],
                ],
            ],
            [
                'title' => 'Sets & Themes',
                'items' => [
                    ['q' => 'What wall themes/sets are available at the studio?', 'a' => 'We offer a range of sets including yellow sofa & panel wall, brick wall, green screen, velvet curtains, cane chairs and more.'],
                    ['q' => 'Can I customise or request a specific set design?', 'a' => 'Absolutely — share your vision with our team and we will do our best to arrange a custom set for your shoot.'],
                    ['q' => 'What is the studio size/layout like?', 'a' => 'The studio is a spacious, air-conditioned space laid out to fit multiple guests, cameras and lighting comfortably.'],
                    ['q' => 'Do you provide props or backdrops beyond the standard themes?', 'a' => 'Yes, additional props and backdrops can be arranged on request to match the look you are going for.'],
                ],
            ],
            [
                'title' => "What's Included",
                'items' => [
                    ['q' => 'What equipment is included in the booking?', 'a' => 'Each package includes professional cameras, microphones, lighting and location rental as listed in the plan.'],
                    ['q' => 'Do you provide a technician/crew during the session, or is it self-operated?', 'a' => 'A member of our production team is on hand throughout your session to help things run smoothly.'],
                    ['q' => 'Is makeup, styling, or a green room available?', 'a' => 'A green room is available to relax and prepare. Makeup and styling can be arranged on request.'],
                    ['q' => 'Do you provide raw footage, or only edited output?', 'a' => 'You receive your raw footage, and professional editing is available as an optional add-on.'],
                    ['q' => 'Is there a limit to the number of revisions I can request?', 'a' => 'Revision limits depend on the editing package chosen — our team will confirm the details for your plan.'],
                ],
            ],
            [
                'title' => 'Packages & Pricing',
                'items' => [
                    ['q' => 'What packages do you offer?', 'a' => 'We offer tiered podcast shoot packages (Package 1, 2 and 3) along with standard editing packages.'],
                    ['q' => 'What payment methods do you accept, and is advance payment required?', 'a' => '50% of the booking amount is payable at the time of booking and the remaining 50% before recording begins.'],
                    ['q' => 'Do you offer packages for multiple video projects?', 'a' => 'Yes, we can put together tailored packages for multiple projects or recurring shoots — just ask our team.'],
                ],
            ],
            [
                'title' => 'Studio Rental',
                'items' => [
                    ['q' => 'Can I rent the studio without your recording package (just the space)?', 'a' => 'Yes, the space can be rented on its own. Share your requirements and we will share rental-only pricing.'],
                    ['q' => 'What are your rental rates — hourly, half-day, or full-day?', 'a' => 'Rentals are available hourly, half-day and full-day. Contact us for the current rate card.'],
                    ['q' => 'Is there a limit on the number of people allowed during a rental session?', 'a' => 'The studio comfortably fits a full panel and crew. Let us know your headcount so we can plan the setup.'],
                    ['q' => 'Do you offer package deals for multiple rental days (weekly/monthly)?', 'a' => 'Yes, discounted deals are available for multi-day, weekly and monthly rentals.'],
                ],
            ],
            [
                'title' => 'General Queries',
                'items' => [
                    ['q' => 'Where is the studio located?', 'a' => 'BFC Studio is located at CP-61, Viraj Khand, Gomti Nagar, Lucknow, Uttar Pradesh 226010.'],
                    ['q' => "What are your studio's working hours?", 'a' => 'The studio is open from 9:30 AM to 6:30 PM, Monday to Saturday. Sundays and the 2nd and 4th Saturdays are generally off.'],
                    ['q' => 'Can I visit the studio before booking to check it out?', 'a' => 'Yes, you are welcome to visit before booking. Get in touch to schedule a walk-through.'],
                    ['q' => 'Do you have a minimum number of episodes/sessions I need to book?', 'a' => 'There is no minimum — book a single session or as many as you need.'],
                    ['q' => 'Do you offer any support with content/distribution after recording (e.g., posting to platforms)?', 'a' => 'Post-production support is available, and our team can advise on preparing your content for different platforms.'],
                    ['q' => "What happens if I'm running late for my slot?", 'a' => 'Please inform us as early as possible. We will do our best to accommodate, subject to the following bookings.'],
                    ['q' => 'Can I see examples of previous podcasts recorded at the studio?', 'a' => 'Yes, we are happy to share samples of past work — just ask and we will send some examples over.'],
                    ['q' => 'What if there is a technical issue (equipment failure) during my session?', 'a' => 'Our on-site team handles any technical issues immediately, and we will make sure your shoot stays on track.'],
                ],
            ],
        ];

        return view('faq', ['categories' => $categories]);
    }
}
