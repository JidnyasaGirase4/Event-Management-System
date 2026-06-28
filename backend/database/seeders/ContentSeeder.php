<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $sort = 0;
        foreach ($this->data() as $page => $sections) {
            foreach ($sections as $section => $items) {
                foreach ($items as $key => $def) {
                    Content::updateOrCreate(
                        ['page' => $page, 'section' => $section, 'item_key' => $key],
                        [
                            'label' => $def['label'],
                            'type'  => $def['type'],
                            'value' => $def['value'],
                            'sort'  => $sort++,
                        ]
                    );
                }
            }
        }

        // Remove fixed per-card rows that were replaced by repeaters.
        // (exclude type=repeater so the new 'cards'/'cats'/'steps' rows survive)
        Content::where('type', '!=', 'repeater')->where('page', 'home')->where('section', 'why')->where('item_key', 'like', 'card%')->delete();
        Content::where('type', '!=', 'repeater')->where('page', 'home')->where('section', 'categories')->where('item_key', 'like', 'cat%')->delete();
        Content::where('type', '!=', 'repeater')->where('page', 'about')->where('section', 'values')->where('item_key', 'like', 'card%')->delete();
        Content::where('type', '!=', 'repeater')->where('page', 'services')->where('section', 'process')->where('item_key', 'like', 'step%')->delete();
    }

    private function t($label, $value, $type = 'text'): array
    {
        return ['label' => $label, 'type' => $type, 'value' => $value];
    }

    /** A repeater field whose value is a JSON array of item rows. */
    private function r($label, array $items): array
    {
        return ['label' => $label, 'type' => 'repeater', 'value' => json_encode($items)];
    }

    private function data(): array
    {
        return [
            // ===== GLOBAL (used in nav/footer on every page) =====
            'global' => [
                'brand' => [
                    'name' => $this->t('Brand Name', 'Eventyx'),
                    'icon' => $this->t('Brand Logo Icon (Lucide name)', 'sparkles'),
                ],
                'icons' => [
                    'book'       => $this->t('“Book” Button Icon', 'calendar-check'),
                    'packages'   => $this->t('“View Packages” Button Icon', 'layout-grid'),
                    'call'       => $this->t('Phone / Call Icon', 'phone'),
                    'email'      => $this->t('Email Icon', 'mail'),
                    'address'    => $this->t('Address / Location Icon', 'map-pin'),
                    'message'    => $this->t('Message / Inquiry Icon', 'message-square'),
                    'send'       => $this->t('Send / Submit Icon', 'send'),
                    'breadcrumb' => $this->t('Breadcrumb Separator Icon', 'chevron-right'),
                    'arrow'      => $this->t('Link Arrow Icon', 'arrow-right'),
                    'star'       => $this->t('Rating Star Icon', 'star'),
                    'check'      => $this->t('Checklist / Bullet Icon', 'check'),
                    'bullet'     => $this->t('Feature Bullet Icon (circle)', 'check-circle-2'),
                    'heart'      => $this->t('Heart Icon', 'heart'),
                    'zoom'       => $this->t('Gallery Zoom Icon', 'zoom-in'),
                    'view'       => $this->t('Gallery View Icon', 'eye'),
                    'close'      => $this->t('Lightbox Close Icon', 'x'),
                    'image'      => $this->t('Image Placeholder Icon', 'image'),
                ],
                'footer' => [
                    'about'         => $this->t('Footer About Text', 'Premium event management for weddings, birthdays, and corporate events. We craft experiences that last a lifetime.', 'textarea'),
                    'address'       => $this->t('Address', '123 Celebration Ave, Event City, EC 10001'),
                    'phone'         => $this->t('Phone', '+1 (555) 123-4567'),
                    'email'         => $this->t('Email', 'hello@eventyx.com'),
                    'newsletter_ph' => $this->t('Newsletter Input Placeholder', 'Your email'),
                    'rights'        => $this->t('Copyright Text (after brand name)', 'All rights reserved.'),
                    'made_with'     => $this->t('Tagline (before heart icon)', 'Made with'),
                    'tagline'       => $this->t('Tagline (after heart icon)', 'for unforgettable moments.'),
                ],
                'footer_links' => [
                    'link1' => $this->t('Quick Link 1 Label', 'Home'),
                    'link2' => $this->t('Quick Link 2 Label', 'About Us'),
                    'link3' => $this->t('Quick Link 3 Label', 'Services'),
                    'link4' => $this->t('Quick Link 4 Label', 'Packages'),
                    'link5' => $this->t('Quick Link 5 Label', 'Gallery'),
                    'link6' => $this->t('Quick Link 6 Label', 'Reviews'),
                    'link7' => $this->t('Quick Link 7 Label', 'Contact'),
                    'link8' => $this->t('Quick Link 8 Label', 'Book Event'),
                ],
                'social' => [
                    'facebook'  => $this->t('Facebook URL', '#'),
                    'instagram' => $this->t('Instagram URL', '#'),
                    'x'         => $this->t('X (Twitter) URL', '#'),
                    'linkedin'  => $this->t('LinkedIn URL', '#'),
                ],
            ],

            // ===== HOME PAGE =====
            'home' => [
                'seo' => [
                    'title' => $this->t('Page Title (browser tab / Google)', 'Eventyx — Crafting Unforgettable Events'),
                    'desc'  => $this->t('Meta Description', 'Eventyx is a premium event management company specializing in weddings, birthdays, and corporate events. Plan, celebrate, and create memories that last.', 'textarea'),
                ],
                'hero' => [
                    'icon'           => $this->t('Hero Tag Icon (Lucide name)', 'party-popper'),
                    'eyebrow'        => $this->t('Hero Eyebrow', 'Premium Event Management'),
                    'title_before'   => $this->t('Title (before highlight)', 'Events That'),
                    'title_highlight'=> $this->t('Title Highlight Word', 'Wow'),
                    'title_after'    => $this->t('Title (after highlight)', ', Memories That Last.'),
                    'lead'           => $this->t('Hero Paragraph', 'From dream weddings to milestone birthdays and high-impact corporate events — we design, plan, and deliver experiences your guests will never forget.', 'textarea'),
                    'btn_primary'    => $this->t('Primary Button Text', 'Book Your Event'),
                    'btn_secondary'  => $this->t('Secondary Button Text', 'View Packages'),
                    'image'          => $this->t('Hero Image', 'assets/images/photo-1519225421980.jpg', 'image'),
                    'badge1_icon'    => $this->t('Badge 1 Icon (Lucide name)', 'star'),
                    'badge1_value'   => $this->t('Badge 1 Value', '4.9 / 5.0'),
                    'badge1_label'   => $this->t('Badge 1 Label', 'Client Rating'),
                    'badge2_icon'    => $this->t('Badge 2 Icon (Lucide name)', 'users'),
                    'badge2_value'   => $this->t('Badge 2 Value', '50k+'),
                    'badge2_label'   => $this->t('Badge 2 Label', 'Guests Hosted'),
                    'stat1_num'      => $this->t('Stat 1 Number', '1200'),
                    'stat1_suffix'   => $this->t('Stat 1 Suffix', '+'),
                    'stat1_label'    => $this->t('Stat 1 Label', 'Events Delivered'),
                    'stat2_num'      => $this->t('Stat 2 Number', '98'),
                    'stat2_suffix'   => $this->t('Stat 2 Suffix', '%'),
                    'stat2_label'    => $this->t('Stat 2 Label', 'Happy Clients'),
                    'stat3_num'      => $this->t('Stat 3 Number', '12'),
                    'stat3_suffix'   => $this->t('Stat 3 Suffix', '+'),
                    'stat3_label'    => $this->t('Stat 3 Label', 'Years Experience'),
                ],
                'about' => [
                    'eyebrow'        => $this->t('About Eyebrow', 'Who We Are'),
                    'title_before'   => $this->t('Title (before highlight)', 'We Turn Ordinary Moments Into'),
                    'title_highlight'=> $this->t('Title Highlight', 'Extraordinary'),
                    'title_after'    => $this->t('Title (after highlight)', 'Experiences'),
                    'text'           => $this->t('About Paragraph', 'Eventyx is a full-service event management company driven by creativity, precision, and passion. From the first idea to the final toast, our team handles every detail so you can simply enjoy the moment.', 'textarea'),
                    'bullet1'        => $this->t('Bullet 1', 'End-to-end planning & on-day coordination'),
                    'bullet2'        => $this->t('Bullet 2', 'Bespoke décor, catering & entertainment'),
                    'bullet3'        => $this->t('Bullet 3', 'Dedicated event manager for every client'),
                    'image'          => $this->t('About Image', 'assets/images/photo-1511795409834.jpg', 'image'),
                ],
                'categories' => [
                    'eyebrow'        => $this->t('Eyebrow', 'What We Do'),
                    'title_before'   => $this->t('Title (before)', 'Events We'),
                    'title_highlight'=> $this->t('Highlight', 'Specialize'),
                    'title_after'    => $this->t('Title (after)', 'In'),
                    'subtitle'       => $this->t('Subtitle', 'Whatever the occasion, we bring the vision, the team, and the magic to make it unforgettable.', 'textarea'),
                    'cats'           => $this->r('Cards (add / remove)', [
                        ['image' => 'assets/images/photo-1519741497674.jpg', 'title' => 'Wedding Events',   'text' => 'Venue décor, catering, photography & full wedding planning.'],
                        ['image' => 'assets/images/photo-1530103862676.jpg', 'title' => 'Birthday Parties', 'text' => 'Theme décor, cakes, entertainment & unforgettable fun.'],
                        ['image' => 'assets/images/photo-1505373877841.jpg', 'title' => 'Corporate Events', 'text' => 'Conferences, product launches, seminars & team building.'],
                    ]),
                ],
                'why' => [
                    'eyebrow'        => $this->t('Eyebrow', 'Why Eventyx'),
                    'title_before'   => $this->t('Title (before)', 'Why Clients'),
                    'title_highlight'=> $this->t('Highlight', 'Choose'),
                    'title_after'    => $this->t('Title (after)', 'Us'),
                    'subtitle'       => $this->t('Subtitle', 'A blend of creativity, reliability, and flawless execution — every single time.', 'textarea'),
                    'cards'          => $this->r('Cards (add / remove)', [
                        ['icon' => 'palette', 'title' => 'Creative Design',  'text' => 'Bespoke concepts and décor tailored to your unique story and style.'],
                        ['icon' => 'clock',   'title' => 'On-Time Delivery', 'text' => 'Meticulous planning and timelines that keep your day running smoothly.'],
                        ['icon' => 'wallet',  'title' => 'Flexible Budgets',  'text' => 'Transparent packages and options designed to fit every celebration.'],
                        ['icon' => 'headset', 'title' => 'Dedicated Support', 'text' => 'A personal event manager guiding you from first call to final toast.'],
                    ]),
                ],
                'featured' => [
                    'eyebrow'        => $this->t('Eyebrow', 'Our Packages'),
                    'title_before'   => $this->t('Title (before)', 'Featured'),
                    'title_highlight'=> $this->t('Highlight', 'Packages'),
                    'title_after'    => $this->t('Title (after)', ''),
                    'subtitle'       => $this->t('Subtitle', 'Carefully curated packages for every occasion. Customizable to your needs.', 'textarea'),
                ],
                'gallery' => [
                    'eyebrow'        => $this->t('Eyebrow', 'Our Work'),
                    'title_before'   => $this->t('Title (before)', "A Glimpse Into Our"),
                    'title_highlight'=> $this->t('Highlight', 'Gallery'),
                    'title_after'    => $this->t('Title (after)', ''),
                    'subtitle'       => $this->t('Subtitle', "Real moments from events we've had the honor to create.", 'textarea'),
                ],
                'testimonials' => [
                    'eyebrow'        => $this->t('Eyebrow', 'Testimonials'),
                    'title_before'   => $this->t('Title (before)', 'Loved By'),
                    'title_highlight'=> $this->t('Highlight', 'Happy Clients'),
                    'title_after'    => $this->t('Title (after)', ''),
                    'subtitle'       => $this->t('Subtitle', "Don't just take our word for it — hear from the people we've celebrated with.", 'textarea'),
                ],
                'cta' => [
                    'title'   => $this->t('CTA Title', 'Ready to Plan Your Next Unforgettable Event?'),
                    'text'    => $this->t('CTA Text', 'Tell us your vision and let our team bring it to life. Get a free consultation today.', 'textarea'),
                ],
            ],

            // ===== ABOUT PAGE =====
            'about' => [
                'seo' => [
                    'title' => $this->t('Page Title (browser tab / Google)', 'About Us — Eventyx'),
                    'desc'  => $this->t('Meta Description', 'Learn about Eventyx — our story, mission, vision, and the passionate team behind unforgettable events.', 'textarea'),
                ],
                'hero' => [
                    'eyebrow'        => $this->t('Eyebrow', 'About Eventyx'),
                    'title_before'   => $this->t('Title (before)', 'Crafting Moments,'),
                    'title_highlight'=> $this->t('Highlight', 'Creating Memories'),
                    'subtitle'       => $this->t('Subtitle', "We're a team of creative planners, designers, and dreamers obsessed with making your events extraordinary.", 'textarea'),
                ],
                'story' => [
                    'eyebrow'        => $this->t('Eyebrow', 'Our Story'),
                    'title_before'   => $this->t('Title (before)', 'A Decade of'),
                    'title_highlight'=> $this->t('Highlight', 'Unforgettable'),
                    'title_after'    => $this->t('Title (after)', 'Events'),
                    'text1'          => $this->t('Paragraph 1', 'Founded in 2012, Eventyx began with a simple belief: every celebration deserves to be flawless. What started as a small team planning intimate weddings has grown into a full-service event management company trusted by thousands of clients.', 'textarea'),
                    'text2'          => $this->t('Paragraph 2', 'Today, we design and deliver weddings, birthdays, and corporate events of every scale — combining creativity, technology, and meticulous planning to bring your vision to life.', 'textarea'),
                    'image'          => $this->t('Image', 'assets/images/photo-1492684223066.jpg', 'image'),
                    'stat1_num'      => $this->t('Stat 1 Number', '1200'),
                    'stat1_suffix'   => $this->t('Stat 1 Suffix', '+'),
                    'stat1_label'    => $this->t('Stat 1 Label', 'Events'),
                    'stat2_num'      => $this->t('Stat 2 Number', '50'),
                    'stat2_suffix'   => $this->t('Stat 2 Suffix', 'k+'),
                    'stat2_label'    => $this->t('Stat 2 Label', 'Guests'),
                    'stat3_num'      => $this->t('Stat 3 Number', '40'),
                    'stat3_suffix'   => $this->t('Stat 3 Suffix', '+'),
                    'stat3_label'    => $this->t('Stat 3 Label', 'Team Members'),
                ],
                'purpose' => [
                    'eyebrow'        => $this->t('Eyebrow', 'Our Purpose'),
                    'title_before'   => $this->t('Title (before)', 'Driven By'),
                    'title_highlight'=> $this->t('Highlight', 'Purpose'),
                    'subtitle'       => $this->t('Subtitle', 'The promise and the dream that guide everything we create.', 'textarea'),
                    'mission_icon'   => $this->t('Mission Icon (Lucide name)', 'target'),
                    'mission_title'  => $this->t('Mission Title', 'Our Mission'),
                    'mission_text'   => $this->t('Mission Text', 'To transform our clients\' visions into seamless, memorable experiences through creativity, precision, and heartfelt service — making every event stress-free and spectacular.', 'textarea'),
                    'vision_icon'    => $this->t('Vision Icon (Lucide name)', 'eye'),
                    'vision_title'   => $this->t('Vision Title', 'Our Vision'),
                    'vision_text'    => $this->t('Vision Text', 'To be the most trusted and innovative event management company, setting the standard for excellence and turning every celebration into a story worth telling.', 'textarea'),
                ],
                'values' => [
                    'eyebrow'        => $this->t('Eyebrow', 'What Drives Us'),
                    'title_before'   => $this->t('Title (before)', 'Our Core'),
                    'title_highlight'=> $this->t('Highlight', 'Values'),
                    'cards'          => $this->r('Values (add / remove)', [
                        ['icon' => 'lightbulb',       'title' => 'Creativity',  'text' => 'Fresh ideas and bold designs for every event.'],
                        ['icon' => 'shield-check',    'title' => 'Reliability', 'text' => 'We deliver on every promise, every time.'],
                        ['icon' => 'heart-handshake', 'title' => 'Passion',     'text' => 'We pour our hearts into every celebration.'],
                        ['icon' => 'gem',             'title' => 'Excellence',  'text' => 'Flawless execution down to the finest detail.'],
                    ]),
                ],
                'team' => [
                    'eyebrow'        => $this->t('Eyebrow', 'Meet The Team'),
                    'title_before'   => $this->t('Title (before)', 'The People Behind The'),
                    'title_highlight'=> $this->t('Highlight', 'Magic'),
                    'subtitle'       => $this->t('Subtitle', 'A passionate crew of planners, designers, and coordinators ready to make your event shine.', 'textarea'),
                    'm1_name'        => $this->t('Member 1 Name', 'Sophia Lane'),
                    'm1_role'        => $this->t('Member 1 Role', 'Founder & CEO'),
                    'm1_image'       => $this->t('Member 1 Photo', 'assets/images/avatar-15.jpg', 'image'),
                    'm2_name'        => $this->t('Member 2 Name', 'Marcus Reed'),
                    'm2_role'        => $this->t('Member 2 Role', 'Creative Director'),
                    'm2_image'       => $this->t('Member 2 Photo', 'assets/images/avatar-33.jpg', 'image'),
                    'm3_name'        => $this->t('Member 3 Name', 'Aisha Khan'),
                    'm3_role'        => $this->t('Member 3 Role', 'Lead Event Planner'),
                    'm3_image'       => $this->t('Member 3 Photo', 'assets/images/avatar-45.jpg', 'image'),
                    'm4_name'        => $this->t('Member 4 Name', 'Leo Martinez'),
                    'm4_role'        => $this->t('Member 4 Role', 'Operations Manager'),
                    'm4_image'       => $this->t('Member 4 Photo', 'assets/images/avatar-52.jpg', 'image'),
                ],
                'cta' => [
                    'title' => $this->t('CTA Title', "Let's Create Something Unforgettable Together"),
                    'text'  => $this->t('CTA Text', 'Ready to start planning? Our team is just one click away.', 'textarea'),
                ],
            ],

            // ===== SERVICES PAGE =====
            'services' => [
                'seo' => [
                    'title' => $this->t('Page Title (browser tab / Google)', 'Services — Eventyx'),
                    'desc'  => $this->t('Meta Description', 'Explore Eventyx services: wedding events, birthday parties, and corporate events — décor, catering, photography, entertainment and more.', 'textarea'),
                ],
                'hero' => [
                    'eyebrow'        => $this->t('Eyebrow', 'Our Services'),
                    'title_before'   => $this->t('Title (before)', 'Everything Your'),
                    'title_highlight'=> $this->t('Highlight', 'Event'),
                    'title_after'    => $this->t('Title (after)', 'Needs'),
                    'subtitle'       => $this->t('Subtitle', 'From intimate gatherings to grand celebrations — we handle every detail across three signature event categories.', 'textarea'),
                ],
                'wedding' => [
                    'icon'           => $this->t('Tag Icon (Lucide name)', 'heart'),
                    'title_before'   => $this->t('Title (before)', 'Wedding'),
                    'title_highlight'=> $this->t('Highlight', 'Events'),
                    'text'           => $this->t('Text', 'Your love story deserves a perfect celebration. We handle every element so you can be fully present on your big day.', 'textarea'),
                    'features'       => $this->t('Features (one per line)', "Venue Decoration\nCatering Services\nPhotography & Videography\nEntertainment\nWedding Planning", 'textarea'),
                    'image'          => $this->t('Image', 'assets/images/photo-1519741497674.jpg', 'image'),
                ],
                'birthday' => [
                    'icon'           => $this->t('Tag Icon (Lucide name)', 'cake'),
                    'title_before'   => $this->t('Title (before)', 'Birthday'),
                    'title_highlight'=> $this->t('Highlight', 'Parties'),
                    'text'           => $this->t('Text', 'Big or small, every birthday is worth celebrating in style. We bring the themes, the cake, and all the fun.', 'textarea'),
                    'features'       => $this->t('Features (one per line)', "Theme Decorations\nCake Arrangements\nCatering Services\nPhotography\nEntertainment Activities", 'textarea'),
                    'image'          => $this->t('Image', 'assets/images/photo-1530103862676.jpg', 'image'),
                ],
                'corporate' => [
                    'icon'           => $this->t('Tag Icon (Lucide name)', 'briefcase'),
                    'title_before'   => $this->t('Title (before)', 'Corporate'),
                    'title_highlight'=> $this->t('Highlight', 'Events'),
                    'text'           => $this->t('Text', 'Professional, polished, and impactful. We deliver corporate experiences that impress clients and inspire teams.', 'textarea'),
                    'features'       => $this->t('Features (one per line)', "Conferences\nProduct Launches\nSeminars\nTeam Building Events\nCorporate Gatherings", 'textarea'),
                    'image'          => $this->t('Image', 'assets/images/photo-1505373877841.jpg', 'image'),
                ],
                'process' => [
                    'eyebrow'        => $this->t('Eyebrow', 'How It Works'),
                    'title_before'   => $this->t('Title (before)', 'Our Simple'),
                    'title_highlight'=> $this->t('Highlight', '4-Step'),
                    'title_after'    => $this->t('Title (after)', 'Process'),
                    'steps'          => $this->r('Steps (add / remove)', [
                        ['icon' => 'message-circle', 'title' => '1. Consult',    'text' => 'We listen to your vision, needs, and budget.'],
                        ['icon' => 'pencil-ruler',   'title' => '2. Design',     'text' => 'We craft a custom plan and creative concept.'],
                        ['icon' => 'settings',       'title' => '3. Coordinate', 'text' => 'We manage vendors, logistics, and timelines.'],
                        ['icon' => 'party-popper',   'title' => '4. Celebrate',  'text' => 'You enjoy a flawless, stress-free event.'],
                    ]),
                ],
                'cta' => [
                    'title' => $this->t('CTA Title', 'Find the Perfect Package for Your Event'),
                    'text'  => $this->t('CTA Text', 'Browse our curated packages or request a custom quote tailored to you.', 'textarea'),
                ],
            ],

            // ===== PACKAGES PAGE =====
            'packages' => [
                'seo' => [
                    'title' => $this->t('Page Title (browser tab / Google)', 'Packages — Eventyx'),
                    'desc'  => $this->t('Meta Description', 'Explore Eventyx event packages for weddings, birthdays, and corporate events. Transparent pricing, customizable options.', 'textarea'),
                ],
                'hero' => [
                    'eyebrow'        => $this->t('Eyebrow', 'Our Packages'),
                    'title_before'   => $this->t('Title (before)', 'Packages For Every'),
                    'title_highlight'=> $this->t('Highlight', 'Celebration'),
                    'subtitle'       => $this->t('Subtitle', 'Transparent pricing, premium service. Pick a package or contact us for a fully custom quote.', 'textarea'),
                ],
                'custom' => [
                    'eyebrow'        => $this->t('Eyebrow', 'Need Something Custom?'),
                    'title_before'   => $this->t('Title (before)', 'Build Your'),
                    'title_highlight'=> $this->t('Highlight', 'Own Package'),
                    'text'           => $this->t('Text', "Every event is unique. Tell us what you're dreaming of and we'll craft a tailored package and quote just for you.", 'textarea'),
                ],
            ],

            // ===== GALLERY PAGE =====
            'gallery' => [
                'seo' => [
                    'title' => $this->t('Page Title (browser tab / Google)', 'Gallery — Eventyx'),
                    'desc'  => $this->t('Meta Description', "Browse the Eventyx gallery — real photos from weddings, birthdays, and corporate events we've created.", 'textarea'),
                ],
                'hero' => [
                    'eyebrow'        => $this->t('Eyebrow', 'Our Gallery'),
                    'title_before'   => $this->t('Title (before)', "Moments We've"),
                    'title_highlight'=> $this->t('Highlight', 'Created'),
                    'subtitle'       => $this->t('Subtitle', 'A collection of real events — every photo tells a story of celebration and joy.', 'textarea'),
                ],
            ],

            // ===== TESTIMONIALS PAGE =====
            'reviews' => [
                'seo' => [
                    'title' => $this->t('Page Title (browser tab / Google)', 'Reviews — Eventyx'),
                    'desc'  => $this->t('Meta Description', 'Read what our happy clients say about Eventyx — real reviews and ratings from weddings, birthdays, and corporate events.', 'textarea'),
                ],
                'hero' => [
                    'eyebrow'        => $this->t('Eyebrow', 'Testimonials'),
                    'title_before'   => $this->t('Title (before)', 'What Our'),
                    'title_highlight'=> $this->t('Highlight', 'Clients'),
                    'title_after'    => $this->t('Title (after)', 'Say'),
                    'subtitle'       => $this->t('Subtitle', "Real stories from the people we've celebrated with. Your happiness is our greatest reward.", 'textarea'),
                ],
                'summary' => [
                    'stat1_num'   => $this->t('Stat 1 Value', '4.9'),
                    'stat1_label' => $this->t('Stat 1 Label', 'Average Rating'),
                    'stat2_num'   => $this->t('Stat 2 Value', '1200'),
                    'stat2_suffix'=> $this->t('Stat 2 Suffix', '+'),
                    'stat2_label' => $this->t('Stat 2 Label', 'Reviews'),
                    'stat3_num'   => $this->t('Stat 3 Value', '98'),
                    'stat3_suffix'=> $this->t('Stat 3 Suffix', '%'),
                    'stat3_label' => $this->t('Stat 3 Label', 'Would Recommend'),
                    'stat4_num'   => $this->t('Stat 4 Value', '50'),
                    'stat4_suffix'=> $this->t('Stat 4 Suffix', 'k+'),
                    'stat4_label' => $this->t('Stat 4 Label', 'Happy Guests'),
                ],
                'cta' => [
                    'title' => $this->t('CTA Title', 'Join Hundreds of Happy Clients'),
                    'text'  => $this->t('CTA Text', "Let's create your unforgettable event story next.", 'textarea'),
                ],
            ],

            // ===== CONTACT PAGE =====
            'contact' => [
                'seo' => [
                    'title' => $this->t('Page Title (browser tab / Google)', 'Contact — Eventyx'),
                    'desc'  => $this->t('Meta Description', 'Get in touch with Eventyx. Send us a message and our event experts will get back to you within 24 hours.', 'textarea'),
                ],
                'hero' => [
                    'eyebrow'        => $this->t('Eyebrow', 'Contact Us'),
                    'title_before'   => $this->t('Title (before)', "Let's"),
                    'title_highlight'=> $this->t('Highlight', 'Talk'),
                    'subtitle'       => $this->t('Subtitle', "Have a question or ready to plan? Send us a message and we'll reply within 24 hours.", 'textarea'),
                ],
                'info' => [
                    'heading'    => $this->t('Panel Heading', 'Get In Touch'),
                    'lead'       => $this->t('Panel Lead', "We'd love to hear about your event. Reach out through any of the options below and we'll respond within 24 hours.", 'textarea'),
                    'visit_icon' => $this->t('Visit Icon (Lucide name)', 'map-pin'),
                    'call_icon'  => $this->t('Call Icon (Lucide name)', 'phone'),
                    'email_icon' => $this->t('Email Icon (Lucide name)', 'mail'),
                    'hours_icon' => $this->t('Hours Icon (Lucide name)', 'clock'),
                    'hours'      => $this->t('Working Hours', 'Mon – Sat: 9:00 AM – 7:00 PM'),
                ],
            ],

            // ===== BOOK PAGE =====
            'book' => [
                'seo' => [
                    'title' => $this->t('Page Title (browser tab / Google)', 'Book Your Event — Eventyx'),
                    'desc'  => $this->t('Meta Description', 'Book your event with Eventyx. Fill in the details and our team will confirm your booking within 24 hours.', 'textarea'),
                ],
                'hero' => [
                    'eyebrow'        => $this->t('Eyebrow', 'Book Your Event'),
                    'title_before'   => $this->t('Title (before)', "Let's Plan Your"),
                    'title_highlight'=> $this->t('Highlight', 'Big Day'),
                    'subtitle'       => $this->t('Subtitle', 'Fill in the details below and our event experts will confirm your booking within 24 hours.', 'textarea'),
                ],
                'aside' => [
                    'title'    => $this->t('Aside Title', 'Why Book With Us?'),
                    'benefits' => $this->t('Benefits (one per line)', "Free consultation & custom quote\nDedicated event manager\nTransparent, flexible pricing\n1200+ events successfully delivered\n24-hour booking confirmation", 'textarea'),
                ],
            ],
        ];
    }
}
