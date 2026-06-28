<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class LabelsSeeder extends Seeder
{
    public function run(): void
    {
        $sort = 1000;
        foreach ($this->data() as $page => $items) {
            foreach ($items as $key => $value) {
                Content::updateOrCreate(
                    ['page' => $page, 'section' => 'labels', 'item_key' => $key],
                    ['label' => ucwords(str_replace('_', ' ', $key)), 'type' => 'text', 'value' => $value, 'sort' => $sort++]
                );
            }
        }
    }

    private function data(): array
    {
        return [
            'global' => [
                'home_crumb'       => 'Home',
                'book_now'         => 'Book Now',
                'footer_links'     => 'Quick Links',
                'footer_company'   => 'Company',
                'footer_contact'   => 'Get In Touch',
                'filter_all'       => 'All',
                'filter_wedding'   => 'Wedding',
                'filter_birthday'  => 'Birthday',
                'filter_corporate' => 'Corporate',
                'select_event'     => 'Select event type',
                'select_package'   => 'Select a package',
                'custom_pkg'       => 'Custom / Not sure yet',
                // nav menu words
                'nav_home'         => 'Home',
                'nav_about'        => 'About',
                'nav_services'     => 'Services',
                'nav_packages'     => 'Packages',
                'nav_gallery'      => 'Gallery',
                'nav_reviews'      => 'Reviews',
                'nav_contact'      => 'Contact',
            ],
            'home' => [
                'about_btn'     => 'Learn More About Us',
                'explore'       => 'Explore',
                'featured_view' => 'View All Packages',
                'gallery_view'  => 'View Full Gallery',
                'cta_btn1'      => 'Book Your Event',
                'cta_btn2'      => 'Contact Us',
            ],
            'about' => [
                'crumb'    => 'About',
                'cta_btn1' => 'Book Your Event',
                'cta_btn2' => 'Contact Us',
            ],
            'services' => [
                'crumb'         => 'Services',
                'cat1_tag'      => 'Category 01',
                'cat2_tag'      => 'Category 02',
                'cat3_tag'      => 'Category 03',
                'wedding_btn'   => 'Plan My Wedding',
                'birthday_btn'  => 'Plan My Party',
                'corporate_btn' => 'Plan Corporate Event',
                'cta_btn1'      => 'View Packages',
                'cta_btn2'      => 'Book Now',
            ],
            'packages' => [
                'crumb'      => 'Packages',
                'custom_btn' => 'Request Custom Quote',
            ],
            'gallery' => [
                'crumb' => 'Gallery',
            ],
            'reviews' => [
                'crumb'   => 'Reviews',
                'cta_btn' => 'Book Your Event',
            ],
            'contact' => [
                'crumb'       => 'Contact',
                'visit_label' => 'Visit Us',
                'call_label'  => 'Call Us',
                'email_label' => 'Email Us',
                'hours_label' => 'Working Hours',
                'submit'      => 'Send Message',
                'f_name'      => 'Full Name',
                'f_email'     => 'Email',
                'f_phone'     => 'Phone Number',
                'f_event'     => 'Event Type',
                'f_message'   => 'Message',
                'ph_name'     => 'John Doe',
                'ph_email'    => 'john@email.com',
                'ph_phone'    => '+1 555 123 4567',
                'ph_message'  => 'Tell us about your event...',
                'map'         => 'https://www.openstreetmap.org/export/embed.html?bbox=-74.02%2C40.70%2C-73.97%2C40.73&layer=mapnik',
            ],
            'book' => [
                'crumb'       => 'Book Event',
                'submit'      => 'Confirm Booking',
                'talk'        => 'Prefer to talk first?',
                'f_name'      => 'Full Name',
                'f_email'     => 'Email',
                'f_phone'     => 'Phone Number',
                'f_event'     => 'Event Type',
                'f_date'      => 'Event Date',
                'f_guests'    => 'Number of Guests',
                'f_package'   => 'Package Selection',
                'f_location'  => 'Event Location',
                'f_req'       => 'Additional Requirements',
                'ph_name'     => 'John Doe',
                'ph_email'    => 'john@email.com',
                'ph_phone'    => '+1 555 123 4567',
                'ph_guests'   => 'e.g. 150',
                'ph_location' => 'City / venue',
                'ph_req'      => "Tell us anything special you'd like for your event...",
            ],
        ];
    }
}
