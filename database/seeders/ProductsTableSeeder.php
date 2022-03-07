<?php

namespace Database\Seeders;

use App\Models\OnSale;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate();
        ProductImage::truncate();
        OnSale::truncate();
        DB::table('product_property')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = [
            [
                'name' => 'Bio Chamomile Tea',
                'description' => 'True to the origins of its name, Chamomile has gentle notes of apple, and there is a mellow, honey-like sweetness in the cup. It has a silky mouthfeel and yet remains a clean, delicately floral herbal tea, and even from the very first sip it feels wonderfully soothing.',
                'category_id' => '8',
                'type' => 1,
                'price' => 14.50,
                'vat_id' => 2,
                'unit_amount' => 500,
                'unit_id' => 1,
                'on_sale' => 12.50,
                'image_filenames'=> ['biocamille1.jpg', 'biocamille2.jpg', 'biocamille3'],
            ],
            [
                'name' => 'Ceremonial Matcha - Hug the tea',
                'description' => 'Ceremonial Matcha Organic Green Tea has a complex flavor profile with mellow vegetal grassy notes, natural sweet nuttiness, a touch of bitterness with a pleasant savory ending. The pleasant savory taste is called umami which makes drinking matcha irresistible.',
                'category_id' => 6,
                'type' => 1,
                'price' => 21.90,
                'vat_id' => 2,
                'unit_amount' => 50,
                'unit_id' => 1,
                'on_sale' => false,
                'image_filenames'=> ['ceremonialmatcha1.png', 'ceremonialmatcha2.jpg', 'ceremonialmatcha3.jpg'],
            ],
            [
                'name' => 'Loose Mango Bergamot - Whittard',
                'description' => 'High-quality green tea leaves form the base of the blend, picked in early spring and steamed and rolled to maintain their verdant colour and herby taste. Scattered with rose, sunflower and blue cornflower petals, our aromatic loose leaf Mango & Bergamot is as beautiful as it is delicious – perfect for adding a twist of summer exoticism to an afternoon spread.',
                'category_id' => 1,
                'type' => 1,
                'price' => 13.95,
                'vat_id' => 2,
                'unit_amount' => 100,
                'unit_id' => 1,
                'on_sale' => false,
                'image_filenames'=> ['Whittard_Loose_Mango_Bergamot_in_blikje_100g.jpg'],
            ],
            [
                'name' => 'KoRo - blacktea',
                'description' => "Black tea has a distinctly dark and malty flavor, a bit like a very light beer without the alcohol or acidity. It's a very oxidized tea, so it will produce a dark red/orange looking brew.",
                'category_id' => 2,
                'type' => 1,
                'price' => 8.95,
                'vat_id' => 2,
                'unit_amount' => 500,
                'unit_id' => 1,
                'on_sale' => false,
                'image_filenames'=> ['koroblacktea1.jpg','koroblacktea2.jpg'],
            ],
            [
                'name' => 'KoRo - pepermint tea',
                'description' => 'Our organic peppermint will convince you with its peppery and minty taste. It also has a pleasant refreshingness to it. The peppermint leaves are harvest in France. Pure peppermint for a pure taste!Peppermint is a very versatile plant. Enjoy the leaves for example as a classic fresh brewed mint tea or combine it for a cold dring with water, syrup and fresh lemon.',
                'category_id' => 8,
                'type' => 1,
                'price' => 15.50,
                'vat_id' => 2,
                'unit_amount' => 500,
                'unit_id' => 1,
                'on_sale' => 14.00,
                'image_filenames'=> ['koropepermint1.jpg','koropepermint2.jpg', 'koropepermint3.jpg'],
            ],
            [
                'name' => 'KoRo - pepermint tea',
                'description' => 'Our organic peppermint will convince you with its peppery and minty taste. It also has a pleasant refreshingness to it. The peppermint leaves are harvest in France. Pure peppermint for a pure taste!Peppermint is a very versatile plant. Enjoy the leaves for example as a classic fresh brewed mint tea or combine it for a cold dring with water, syrup and fresh lemon.',
                'category_id' => 8,
                'type' => 1,
                'price' => 15.50,
                'vat_id' => 2,
                'unit_amount' => 500,
                'unit_id' => 1,
                'on_sale' => false,
                'image_filenames'=> ['koropepermint1.jpg','koropepermint2.jpg','koropepermint3.jpg'],
            ],
            [
                'name' => 'Or Tea - Qeen Berry',
                'description' => 'After discovering the great taste of dried fruits, the empress dowager even traded her precious jewellery on her phoenix crown, including the legendary glowing pearl, into some of her personally selected berries. Try it and you will understand why she did this.',
                'category_id' => 8,
                'type' => 2,
                'price' => 6.50,
                'vat_id' => 2,
                'unit_amount' => 10,
                'unit_id' => 3,
                'on_sale' => 5.50,
                'image_filenames'=> ['qeenberryfruit1.jpg','qeenberryfruit2.jpg'],
            ],
            [
                'name' => 'Or Tea - Dragon Pearl Jasmine (green tea)',
                'description' => 'The choicest leaves are harvested during mid-Summer and many stringent steps are then applied to ensure the refreshing floral fragrance is fully infused into the tea. This is a tea so precious, even the dragons have given up chasing the good old flaming pearl.',
                'category_id' => 1,
                'type' => 2,
                'price' => 6.50,
                'vat_id' => 2,
                'unit_amount' => 10,
                'unit_id' => 3,
                'on_sale' => false,
                'image_filenames'=> ['orteajasmine1.jpg','orteajasmine2.jpg'],
            ],
            [
                'name' => 'Or Tea - Ginseng  Beauty (green tea)',
                'description' => 'Back in the Ming Dynasty, Ginseng Green Tea is the tea served to the imperial family. Premium Green Tea infused with Ginseng root, brings the best of both worlds in a cup. Ginseng Beauty will make you beautiful inside and out.',
                'category_id' => 1,
                'type' => 2,
                'price' => 6.50,
                'vat_id' => 2,
                'unit_amount' => 10,
                'unit_id' => 3,
                'on_sale' => false,
                'image_filenames'=> ['orteabeauty1.jpg','orteabeauty2.jpg'],
            ],
            [
                'name' => 'Tea leaf tumbler',
                'description' => 'Sip your favorite tea sustainably with our vacuum insulated stainless steel Tea Leaf Tumbler. This MiiR 16-oz Tumbler is easy to travel with and fits like a glove in your cupholder. Keep your favorite Art of Tea blend hot or cold with this travel tumbler. ',
                'category_id' => 10,
                'type' => 3,
                'price' => 19.90,
                'vat_id' => 1,
                'unit_amount' => 1,
                'unit_id' => 4,
                'on_sale' => false,
                'image_filenames'=> ['TEA_LEAF_TUMBLER.jpg'],
            ],
            [
                'name' => 'Perfect Tea Spoon',
                'description' => 'The Perfect Tea Spoon is a great way to measure your serving amounts and add consistency to your tea brewing experience.',
                'category_id' => 10,
                'type' => 3,
                'price' => 5,
                'vat_id' => 1,
                'unit_amount' => 1,
                'unit_id' => 4,
                'on_sale' => false,
                'image_filenames'=> ['teaspoon.jpg'],
            ],
            [
                'name' => 'Gift Box',
                'description' => 'Our brand new Candle, Matches, Earl Grey Crème Retail Tin & Journal Gift Box Set comes beautifully packaged in our stunning wood gift box. Our new custom Earl Grey Crème candle is made with a unique coconut wax offering the cleanest burn on the market. Our candle is paraben-free, non-toxic, non-GMO, and never animal tested. We partnered with American-made brand Appointed for our brand new branded Journals. Appointed goods are designed to inspire productivity and creativity. Our journal features a book cloth cover and is brass coil bound with perforated sheets. Made with recycled paper and renewable energy, this lined notebook is absolutely stunning.',
                'category_id' => 9,
                'type' => 3,
                'price' => 50,
                'vat_id' => 1,
                'unit_amount' => 1,
                'unit_id' => 4,
                'on_sale' => false,
                'image_filenames'=> ['giftbox1.jpg','giftbox2.jpg'],
            ],
            [
                'name' => 'Loose Leaf Tea Gift Set',
                'description' => 'Give the tea lover in your life four essential teas with the Loose Leaf Tea Gift Set. Packed with English Breakfast, Earl Grey Crème, Jasmine Pearls, and Egyptian Chamomile*, the Loose Leaf Tea Gift Set is a must for any tea enthusiast.',
                'category_id' => 9,
                'type' => 3,
                'price' => 50,
                'vat_id' => 1,
                'unit_amount' => 1,
                'unit_id' => 4,
                'on_sale' => false,
                'image_filenames'=> ['giftset1.jpg','giftset2.jpg'],
            ],
            [
                'name' => 'Katsumi Lovely Night (rooibos) ',
                'description' => "Night time teas are making a comeback! Whether you're hosting guests overnight or a Netflix evening with friends, cozy up your evenings with a touch of Lovely Night Fever thanks to our irresistible organic herbal tea",
                'category_id' => 7,
                'type' => 1,
                'price' => 10.90,
                'vat_id' => 2,
                'unit_amount' => 20,
                'unit_id' => 3,
                'on_sale' => false,
                'image_filenames'=> ['katsumitearoibos1.png'],
            ],
            [
                'name' => 'Katsumi White Bellini (white tea) ',
                'description' => "Night time teas are making a comeback! Whether you're hosting guests overnight or a Netflix evening with friends, cozy up your evenings with a touch of Lovely Night Fever thanks to our irresistible organic herbal tea",
                'category_id' => 3,
                'type' => 1,
                'price' => 10.90,
                'vat_id' => 2,
                'unit_amount' => 20,
                'unit_id' => 3,
                'on_sale' => false,
                'image_filenames'=> ['katsumiwhitetea1.png'],
            ],
            [
                'name' => 'Puffin Cup ',
                'description' => '',
                'category_id' => 10,
                'type' => 3,
                'price' => 15.90,
                'vat_id' => 1,
                'unit_amount' => 1,
                'unit_id' => 4,
                'on_sale' => false,
                'image_filenames'=> ['puffincup1.png','puffincup2.jpg'],
            ],
            [
                'name' => 'Ginger Lemongrass - Teacultures',
                'description' => 'Ginger and lemongrass are a fantastic combination! Ginger gives a spicy, powerful and herbal taste and the lemongrass complements this deep taste with a soft, delicate and fresh taste. These herbs heat body and soul. A delicious cup of tea which can be drunk all day long because ginger and lemongrass both not contain caffeine.',
                'category_id' => 8,
                'type' => 2,
                'price' => 4.50,
                'vat_id' => 2,
                'unit_amount' => 20,
                'unit_id' => 3,
                'on_sale' => false,
                'image_filenames'=> ['teaculturesginger1.jpg','teaculturesginger2.jpg'],
            ],
            [
                'name' => 'Finest Jasmine - Teacultures',
                'description' => 'This Chinese green tea with jasmine goes perfectly together and gives the tea a soft, delicate taste and a floral scent. Making jasmine tea is a special process and takes a very long time. After the green tea is picked and processed in the spring, this green tea is stored until the jasmine blossom is ready to be picked. After the jasmine blossom is picked, it is mixed with the green tea. To intensify the taste of jasmine in the tea, the mixture is turned several times. This turning process is also called perfuming and can take more than a month. To make 1 kilo of jasmine tea sometimes more than 7 kilos of jasmine blossom is needed.',
                'category_id' => 8,
                'type' => 2,
                'price' => 4.50,
                'vat_id' => 2,
                'unit_amount' => 20,
                'unit_id' => 3,
                'on_sale' => false,
                'image_filenames'=> ['finestjasminetea1.jpg','finestjasminetea2.jpg'],
            ],
            [
                'name' => 'Oolong tea - Renefeldt',
                'description' => 'Semi-fermented Oolong tea from China with a slightly tart taste to begin with followed by its characteristic nutty sweetness to finish.',
                'category_id' => 4,
                'type' => 1,
                'price' => 5,
                'vat_id' => 2,
                'unit_amount' => 100,
                'unit_id' => 1,
                'on_sale' => false,
                'image_filenames'=> ['oolongtea1.jpg', 'oolongtea2.jpg'],
            ],
            [
                'name' => 'Honey Orchid - Good and Proper (Oolong)',
                'description' => "Our Honey Orchid loose leaf oolong tea is a dark infusion bursting with orange-blossom and apricot, with a toasted, honey-sweet finish. The most popular of the Phoenix Mountain oolongs, this tea is named after its particular cultivar, Mi Lan Xiang, meaning 'honey orchid fragrance'. The toasty notes are thanks to the multiple roasts it undergoes in the making.",
                'category_id' => 4,
                'type' => 1,
                'price' => 10,
                'vat_id' => 2,
                'unit_amount' => 25,
                'unit_id' => 1,
                'on_sale' => false,
                'image_filenames'=> ['goodandproperoolong1.jpg','goodandproperoolong2.jpg'],
            ],
            [
                'name' => 'Oolong tea - Renefeldt',
                'description' => "Our award-winning Jade Tips, or Mao Jian, loose leaf green tea has a clean vegetal flavour and lingering almond sweetness. Grown in the Bai Yun or 'White Cloud' mountains, these dark, wiry leaves produce a bright, pale green liquor - a deliciously refreshing, everyday green tea. ",
                'category_id' => 1,
                'type' => 1,
                'price' => 6,
                'vat_id' => 2,
                'unit_amount' => 75,
                'unit_id' => 1,
                'on_sale' => 4.95,
                'image_filenames'=> ['jadetips1.jpg','jadetips2.jpg'],
            ]
        ];

        foreach ($data as $array)
        {
            $product = Product::create([
                'name' => $array['name'],
                'description' => $array['description'],
                'category_id' => $array['category_id'],
                'type' => $array['type'],
                'price' => $array['price'],
                'vat_id' => $array['vat_id'],
                'unit_amount' => $array['unit_amount'],
                'unit_id' => $array['unit_id'],
            ]);

            $product->properties()->attach(Property::all()->random(2));

            if ($array['on_sale'] !== false) 
            {
                OnSale::create([
                    'product_id' => $product->id,
                    'price' => $array['on_sale'],
                    'date_from' => date('Y-m-d', strtotime(now() . rand(-10, 10) . 'day')),
                ]);
            }

            if ($array['image_filenames'])
            {  
                foreach ($array['image_filenames'] as $key => $filename)
                ProductImage::create([
                    'filename' => $filename,
                    'product_id' => $product->id,
                    'order_sequence' => $key + 1
                ]);
            }
        }
    }
}

