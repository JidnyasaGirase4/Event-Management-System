<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    public function run(): void
    {
        $cats = [
            ['name' => 'Wedding Events',   'slug' => 'wedding',   'description' => 'Venue décor, catering, photography & full wedding planning.'],
            ['name' => 'Birthday Parties', 'slug' => 'birthday',  'description' => 'Theme décor, cakes, entertainment & unforgettable fun.'],
            ['name' => 'Corporate Events', 'slug' => 'corporate', 'description' => 'Conferences, product launches, seminars & team building.'],
        ];
        foreach ($cats as $i => $c) {
            Category::updateOrCreate(['slug' => $c['slug']], $c + ['sort' => $i]);
        }

        $packages = [
            ['name' => 'Royal Wedding', 'event_type' => 'wedding', 'price' => 'Rs 4,999', 'image' => 'assets/images/photo-1464366400600.jpg', 'features' => "Premium venue décor\nCatering for 300 guests\nPhoto & videography\nLive entertainment"],
            ['name' => 'Classic Wedding', 'event_type' => 'wedding', 'price' => 'Rs 2,999', 'image' => 'assets/images/photo-1606800052052.jpg', 'features' => "Elegant venue décor\nCatering for 150 guests\nPhotography\nWedding coordination"],
            ['name' => 'Ultimate Birthday Bash', 'event_type' => 'birthday', 'price' => 'Rs 1,499', 'badge' => 'Popular', 'is_featured' => true, 'image' => 'assets/images/photo-1492684223066.jpg', 'features' => "Custom theme décor\nCake & catering\nEntertainment & DJ\nPhotography"],
            ['name' => 'Kids Party Fun', 'event_type' => 'birthday', 'price' => 'Rs 799', 'image' => 'assets/images/photo-1464349095431.jpg', 'features' => "Fun theme décor\nCake & snacks\nGames & activities\nMascot & host"],
            ['name' => 'Corporate Pro', 'event_type' => 'corporate', 'price' => 'Rs 3,299', 'image' => 'assets/images/photo-1540575467063.jpg', 'features' => "Conference setup & AV\nBranding & stage design\nCatering & hospitality\nEvent coordination"],
            ['name' => 'Seminar Starter', 'event_type' => 'corporate', 'price' => 'Rs 1,799', 'image' => 'assets/images/photo-1511578314322.jpg', 'features' => "Seminar hall setup\nProjector & sound\nRefreshments\nRegistration desk"],
        ];
        foreach ($packages as $i => $p) {
            Package::updateOrCreate(['name' => $p['name']], $p + ['sort' => $i]);
        }

        $testimonials = [
            ['name' => 'Priya & Arjun', 'role' => 'Newlyweds', 'event_type' => 'wedding', 'rating' => 5, 'avatar' => 'assets/images/avatar-47.jpg', 'review' => 'Eventyx made our wedding absolutely magical. Every detail was perfect and completely stress-free. We couldn\'t have asked for more!'],
            ['name' => 'Daniel R.', 'role' => 'Marketing Director', 'event_type' => 'corporate', 'rating' => 5, 'avatar' => 'assets/images/avatar-12.jpg', 'review' => 'Our product launch was flawless. The team handled everything professionally and the stage design was absolutely stunning.'],
            ['name' => 'Meera S.', 'role' => 'Mom of two', 'event_type' => 'birthday', 'rating' => 5, 'avatar' => 'assets/images/avatar-32.jpg', 'review' => 'Best birthday party ever! The theme décor blew everyone away and the kids had the time of their lives. Highly recommend!'],
            ['name' => 'James & Lily', 'role' => 'Wedding', 'event_type' => 'wedding', 'rating' => 5, 'avatar' => 'assets/images/avatar-20.jpg', 'review' => 'From the décor to the catering, everything exceeded our expectations. Our guests are still talking about it months later!'],
            ['name' => 'Sara T.', 'role' => 'HR Lead', 'event_type' => 'corporate', 'rating' => 4, 'avatar' => 'assets/images/avatar-8.jpg', 'review' => 'Professional, punctual, and creative. Our annual conference ran like clockwork thanks to the Eventyx team. Will book again.'],
            ['name' => 'Robert M.', 'role' => 'Birthday', 'event_type' => 'birthday', 'rating' => 5, 'avatar' => 'assets/images/avatar-60.jpg', 'review' => 'They turned my 50th into a night to remember. Beautiful setup, amazing food, and a team that truly cares. Thank you!'],
        ];
        foreach ($testimonials as $i => $t) {
            Testimonial::updateOrCreate(['name' => $t['name']], $t + ['sort' => $i]);
        }

        $gallery = [
            ['wedding', 'photo-1519741497674'], ['birthday', 'photo-1530103862676'], ['corporate', 'photo-1505373877841'],
            ['wedding', 'photo-1464366400600'], ['birthday', 'photo-1492684223066'], ['corporate', 'photo-1540575467063'],
            ['wedding', 'photo-1606800052052'], ['birthday', 'photo-1464349095431'], ['corporate', 'photo-1511578314322'],
            ['wedding', 'photo-1469371670807'], ['birthday', 'photo-1511285560929'], ['corporate', 'photo-1530023367847'],
        ];
        foreach ($gallery as $i => $g) {
            Gallery::updateOrCreate(
                ['image' => "assets/images/{$g[1]}.jpg"],
                ['category' => $g[0], 'sort' => $i]
            );
        }
    }
}
