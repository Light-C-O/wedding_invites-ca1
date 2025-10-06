<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Venue;
use Carbon\Carbon;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $currentTimestamp = Carbon:: now();
                Venue::insert([
            [
                'title' => 'Elegant Garden Hall',
                'location' => 'Dublin, Ireland',
                'price' => 2500.00,
                'capacity' => 150,
                'image' => 'garden_hall.jpg',
                'description' => 'Nestled within lush, manicured gardens, the Elegant Garden Hall offers a stunning blend of natural beauty and timeless sophistication. Sunlight pours through grand windows, illuminating the soaring ceilings and sparkling chandeliers. The spacious interior features tasteful neutral tones with gold accents, creating a perfect backdrop for your wedding vision. Outside, fragrant blooms and winding paths set the scene for a romantic ceremony, while inside, elegant dining and cozy lounge areas welcome guests. With a polished dance floor and enchanting ambiance, this venue transforms your celebration into a magical experience where every moment feels unforgettable and truly special.',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Seaside View',
                'location' => 'Galway, Ireland',
                'price' => 3000.00,
                'capacity' => 200,
                'image' => 'seaside_view.jpg',
                'description' => 'Perched on a stunning coastline, the Seaside View offers breathtaking panoramic ocean vistas that create an unforgettable backdrop for your special day. Gentle sea breezes and the soothing sound of waves set a serene, romantic atmosphere. Whether exchanging vows on a sunlit terrace overlooking the sparkling water or celebrating under an open-air pavilion with floor-to-ceiling windows, every moment is infused with natural beauty. The elegant, coastal-inspired décor blends soft, airy tones with touches of driftwood and seashell accents. This venue promises a dreamy, intimate celebration where the endless horizon symbolizes your boundless love and new beginnings.',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Classic Castle',
                'location' => 'Kilkenny, Ireland',
                'price' => 4500.00,
                'capacity' => 180,
                'image' => 'castle.jpg',
                'description' => 'Step into timeless romance at the Classic Castle wedding venue, where majestic stone walls and towering turrets set the scene for a fairy-tale celebration. Rich history and elegant grandeur blend seamlessly in ornate ballrooms with crystal chandeliers, sweeping staircases, and intricate woodwork. The sprawling gardens and courtyards provide a picturesque backdrop for outdoor ceremonies, framed by ivy-covered arches and blooming florals. Inside, luxurious décor and vintage charm create an intimate yet regal atmosphere. With every corner steeped in enchantment, this venue transforms your wedding day into a captivating storybook moment, promising memories as enduring as the castle itself.',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Modern City Loft',
                'location' => 'Cork, Ireland',
                'price' => 2000.00,
                'capacity' => 120,
                'image' => 'city_loft.jpg',
                'description' => 'The Modern City Loft offers a sleek, stylish space perfect for couples seeking an urban-chic celebration. With soaring ceilings, exposed brick walls, and expansive windows, the loft floods with natural light and stunning cityscape views. Minimalist design meets industrial elegance, featuring polished concrete floors, contemporary lighting, and open layouts that create a versatile atmosphere. Whether hosting an intimate ceremony or a lively reception, the space adapts effortlessly to your vision. The vibrant energy of the city blends with refined sophistication, making this venue ideal for a memorable, modern celebration filled with love, laughter, and unforgettable moments.',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Rustic Barn',
                'location' => 'Limerick, Ireland',
                'price' => 1800.00,
                'capacity' => 100,
                'image' => 'barn.jpg',
                'description' => 'It exudes warm, charming countryside elegance perfect for a heartfelt celebration. Weathered wooden beams and vintage accents create a cozy, inviting atmosphere filled with natural charm. Soft string lights twinkle overhead, casting a magical glow on the open, spacious interior. Surrounded by rolling fields and blooming wildflowers, the barn’s outdoor spaces offer a picturesque setting for ceremonies and photos. Inside, rustic tables, burlap details, and mason jar décor blend seamlessly with modern comforts, creating an enchanting blend of simplicity and style. This venue promises a relaxed yet beautiful celebration, where love and nature come together in perfect harmony.',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Mountain Retreat',
                'location' => 'Wicklow, Ireland',
                'price' => 1800.00,
                'capacity' => 400,
                'image' => 'mountain_retreat.jpg',
                'description' => 'Amidst majestic mountain peaks, the Mountain Retreat venue offers an unforgettable blend of rustic elegance and natural beauty. Surrounded by lush forests and crisp, fresh air, this serene escape creates a peaceful, intimate atmosphere perfect for your special day. The charming lodge features warm wooden beams, stone fireplaces, and expansive windows framing breathtaking panoramic views. Outdoor decks and scenic trails provide stunning backdrops for heartfelt ceremonies and unforgettable photos. Combining cozy comfort with awe-inspiring landscapes, this venue promises a romantic celebration where nature’s grandeur enhances every moment, making your wedding truly magical and timeless.',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
        ]);
    }
}

