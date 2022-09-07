<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Trip;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function index()
    {
        // Intrp
        $intro = [
            "intro" => [
                "id" => "intro",
                "next" => "/",
                "type" => "intro",
                "level" => 0,
                "content" => [
                    "name" => "Welcome to Borobudur",
                    "number" => "01",
                    "videoId" => "nGfKZRvlPkM",
                    "mobileVideoId" => "nGfKZRvlPkM",
                    "no-auto-next-button" => true
                ],
                "titles" => [
                    [
                        "id" => "1",
                        "start" => "4",
                        "end" => "7.5"
                    ],
                    [
                        "id" => "0",
                        "start" => "2",
                        "end" => "7.5"
                    ],
                    /* [
                        "id" => "2",
                        "start" => "84.5",
                        "end" => "300"
                    ] */
                ]
            ],
        ];

        // Map
        $map = [
            "map" => [
                "id" => "map",
                "type" => "map",
                "level" => 4,
                "url" => "map",
                "content" => [
                    "name" => "Map",
                    "state-labels" => [
                        [
                            "icon" => "utah.svg",
                            "size" => [
                                "x" => 44.1,
                                "y" => 16
                            ],
                            "anchor" => [
                                "x" => 44.1,
                                "y" => 16
                            ],
                            "position" => [
                                "lat" => 37.02,
                                "lng" => -109.07
                            ]
                        ],
                        [
                            "icon" => "arizona.svg",
                            "size" => [
                                "x" => 77.8,
                                "y" => 16
                            ],
                            "anchor" => [
                                "x" => 77.8,
                                "y" => 0
                            ],
                            "position" => [
                                "lat" => 36.987,
                                "lng" => -109.07
                            ]
                        ],
                        [
                            "icon" => "colorado.svg",
                            "size" => [
                                "x" => 88.5,
                                "y" => 16
                            ],
                            "anchor" => [
                                "x" => 0,
                                "y" => 16
                            ],
                            "position" => [
                                "lat" => 37.02,
                                "lng" => -109.02
                            ]
                        ],
                        [
                            "icon" => "newmexico.svg",
                            "size" => [
                                "x" => 126.5,
                                "y" => 16
                            ],
                            "anchor" => [
                                "x" => 0,
                                "y" => 0
                            ],
                            "position" => [
                                "lat" => 36.987,
                                "lng" => -109.02
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $videos = Storage::url('/assets/videos/borobudur.mp4');
        // Exp
        $exp = [
            "experience" => [
                "next" => "/",
                "prev" => "/",
                "type" => "video",
                "level" => 4,
                "url" => "experience",
                "content" => [
                    "name" => "Experience VR",
                    "description" => "If you're using Google Cardboard or a VR headset, lay your phone in place, and hit the \"I'm ready\" button.",

                    /* "videoId" => "vZwgTdPqIbo",
                    "videoVR" => "./assets/videos/experienceVR.mp4",
                    "videoVRCDN" => "https://storage.googleapis.com/patagonia-bearsears.appspot.com/videos/experienceVR.mp4", */

                    "videoId" => "UK9BtMoFnEc",
                    // "videoVR" => "./assets/videos/borobudur.mp4",
                    // "videoVRCDN" => $videos,

                    "experienceVR" => !0,
                    "showNextCard" => !1
                ]
            ]
        ];

        $villages = [];
        $products = [];
        $trips = [];
        $pano = [
            "street" => [
                "next" => "/",
                "prev" => "/",
                "type" => "pano",
                "level" => 2,
                "json" => "12_living_museum.json",
                "parent" => "culture",
                "url" => "culture/wolfman-panel",
                "content" => [
                    "name" => "Wolfman Panel",
                    "number" => "1.3",
                    "description" => "Study unique rock-art panels.",
                    "image" => "122_wolfman_panel.jpg",
                    "icons" => ["streetview"],
                    "videoId" => "",
                    "mapCoord" => [
                        "lat" => 37.2743,
                        "lng" => -109.64654
                    ],
                    "audio" => "wolfman",
                    "thumbnail" => "wolfman-pano/pano-thumb.jpg",
                    "tile-folder" => "wolfman-pano/",
                    "bound" => [
                        "sw" => [
                            "lat" => -37.71,
                            "lng" => -142.8
                        ],
                        "ne" => [
                            "lat" => 37.71,
                            "lng" => 142.8
                        ]
                    ],
                    "markers" => [[
                        "mapCoord" => [
                            "lat" => 3,
                            "lng" => -101
                        ],
                        "type" => "info",
                        "text" => "Yucca stalk in full bloom",
                        "detail" => "Ancestral Puebloans used yucca primarily for its fiber which was woven into sandals, baskets, blankets, and rope. The fleshy fruit and sweet flowers were both eaten raw, and the roots were ground to a pulp then mixed with water to be used as soap or shampoo."
                    ], [
                        "mapCoord" => [
                            "lat" => 6.5,
                            "lng" => 12
                        ],
                        "type" => "info",
                        "text" => "Flute player",
                        "detail" => "These characters often symbolize tricksters or traitors, and occasionally have sexual connotations. They first appeared in this style of rock art somewhere between AD 500 and 750. Flutes—like staffs, bows, arrows and atlatls—are often thought to be male gendered tools of fertility."
                    ], [
                        "mapCoord" => [
                            "lat" => 15,
                            "lng" => 80
                        ],
                        "type" => "info",
                        "text" => "Anthropomorphic figure",
                        "detail" => "Depictions of anthropomorphic figures, or figures with any sort of musculature, are incredibly rare in rock art from this period."
                    ]],
                    "mapIcon" => "living_museum_wolfman.svg",
                    "narrators" => [[
                        "name" => "Lyle Balenquah",
                        "image" => "lyle_balenquah.jpg",
                        "times" => [
                            [0, 67]
                        ]
                    ]],
                    "showNextCard" => !0,
                    "titlecard" => [
                        "narrators" => [[
                            "name" => "Lyle",
                            "image" => "lyle_balenquah.jpg"
                        ]]
                    ]
                ]
            ]
        ];
        $opening = array_merge($intro, $map, $exp, $villages, $products, $trips);

        $i = 1;
        $items = Village::all();

        $menu1 = [
            "type" => "video",
            "level" => 1,
            "url" => "/",
            "content" => [
                "name" => 'Culture',
                "number" => 01,
                "icons" => [
                    "culture"
                ],
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam fugit labore ullam",
                "image" => 'https://images.pexels.com/photos/2583854/pexels-photo-2583854.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                "videoId" => 'Lv_GojoT1v4',
                "showNextCard" => 1,
                "mapCoord" => [
                    "lat" => -7.5931303,
                    "lng" => 109.8720057
                ],
                "mapIcon" => "escaping_places.svg",
            ],
        ];

        array_push($opening, $menu1);

        foreach ($items as $item) {

            $imageLink = Storage::url('/assets/villages/images/' . $item->image);
            if (substr($item->image, 0, 5) == 'https') {
                $imageLink = $item->image;
            }

            $villages = [
                "next" => "/",
                "prev" => "/",
                "type" => "video",
                "level" => 2,
                "json" => "14_water_offering.json",
                "parent" => "culture",
                "url" => "/",
                "content" => [
                    // "storyID" => $item->id,
                    // "urlTarget" => "http://story.fujiyantov.id/" . $item->id . "/" . Str::slug($item->name),
                    "name" => $item->name,
                    "number" => 1 . '.' . $i,
                    "description" => $item->description,
                    "icons" => ["culture"],
                    "image" => $imageLink,
                    "videoId" => $item->video_id,
                    "no-auto-next-button" => false,
                    "powered-by-earch" => !0,
                    "mapCoord" => [
                        "lat" => (double)$item->lat,
                        "lng" => (double)$item->long
                    ],
                    "mapIcon" => "map-world.png",
                    "titlecard" => [
                        "narrators" => [
                            [
                                "name" => "KBKM",
                                "image" => "logo-kbkm-profile.png"
                            ]
                        ]
                    ],
                    "showNextCard" => !1
                ]
            ];

            array_push($opening, $villages);

            $j = 1;
            foreach ($item->culture as $val) {

                $imageLinkCulture = Storage::url('/assets/villages/images/' . $val->image);
                if (substr($val->image, 0, 5) == 'https') {
                    $imageLinkCulture = $val->image;
                }

                $culture = [
                    "next" => "/",
                    "prev" => "/",
                    "type" => $val->type,
                    "level" => 2,
                    "json" => "14_water_offering.json",
                    "parent" => "culture",
                    "url" => "culture/cave-spring",
                    "content" => [
                        "storyID" => $val->id,
                        "urlTarget" => "http://story.borobudurside.com/" . $val->id . "/" . Str::slug($val->name),
                        "name" => $val->name,
                        "number" => 1 . '.' . $i . '.' . $j++,
                        "description" => $val->description,
                        "icons" => ["culture"],
                        "image" => $imageLinkCulture,
                        "videoId" => $val->video_id,
                        "no-auto-next-button" => false,
                        "powered-by-earch" => !0,
                        "mapCoord" => [
                            "lat" => (double)$val->lat,
                            "lng" => (double)$val->long
                        ],
                        "mapIcon" => "map-world.png",
                        "titlecard" => [
                            "narrators" => [
                                [
                                    "name" => "KBKM",
                                    "image" => "logo-kbkm-profile.png"
                                ]
                            ]
                        ],
                        "showNextCard" => !1
                    ],
                ];

                array_push($opening, $culture);
            }

            $i++;
        }

        $p = 1;
        $itemProducts = Product::all();

        $menu2 = [
            "type" => "video",
            "level" => 1,
            "url" => "/",
            "content" => [
                "name" => 'Product',
                "number" => 02,
                "icons" => [
                    "product"
                ],
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam fugit labore ullam",
                "image" => 'https://images.pexels.com/photos/758742/pexels-photo-758742.jpeg?auto=compress&cs=tinysrgb&w=1600',
                "videoId" => 'Lv_GojoT1v4',
                "showNextCard" => 1,
                "mapCoord" => [
                    "lat" => -7.3609099,
                    "lng" => 109.8967681
                ],
                "mapIcon" => "escaping_places.svg",
            ],
        ];

        array_push($opening, $menu2);

        foreach ($itemProducts as $item) {

            $imageLink = Storage::url('/assets/products/images/' . $item->image);
            if (substr($item->image, 0, 5) == 'https') {
                $imageLink = $item->image;
            }

            $products = [
                "next" => "/",
                "prev" => "/",
                "type" => "video",
                "level" => 2,
                "json" => "14_water_offering.json",
                "parent" => "culture",
                "url" => "culture/cave-spring",
                "content" => [
                    "name" => $item->name,
                    "number" => 2 . '.' . $p,
                    "description" => $item->description,
                    "icons" => ["product"],
                    "image" => $imageLink,
                    "videoId" => $item->video_id,
                    "no-auto-next-button" => false,
                    "powered-by-earch" => !0,
                    "mapCoord" => [
                        "lat" => (double)$item->lat,
                        "lng" => (double)$item->long
                    ],
                    "mapIcon" => "map-world.png",
                    "titlecard" => [
                        "narrators" => [
                            [
                                "name" => "KBKM",
                                "image" => "logo-kbkm-profile.png"
                            ]
                        ]
                    ],
                    "showNextCard" => !1
                ]
            ];

            array_push($opening, $products);

            $p++;
        }

        $t = 1;
        $itemTrips = Trip::all();

        $menu3 = [
            "type" => "video",
            "level" => 1,
            "url" => "/",
            "content" => [
                "name" => 'Travel',
                "number" => 03,
                "icons" => [
                    "travel"
                ],
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam fugit labore ullam",
                "image" => 'https://images.pexels.com/photos/2166559/pexels-photo-2166559.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
                "videoId" => 'Lv_GojoT1v4',
                "showNextCard" => 1,
                "mapCoord" => [
                    "lat" => -7.3186046,
                    "lng" => 110.1597488
                ],
                "mapIcon" => "escaping_places.svg",
            ],
        ];

        array_push($opening, $menu3);

        foreach ($itemTrips as $item) {

            $imageLink = Storage::url('/assets/trips/images/' . $item->image);
            if (substr($item->image, 0, 5) == 'https') {
                $imageLink = $item->image;
            }

            $trips = [
                "next" => "/",
                "prev" => "/",
                "type" => "video",
                "level" => 2,
                "json" => "14_water_offering.json",
                "parent" => "culture",
                "url" => "culture/cave-spring",
                "content" => [
                    "name" => $item->name,
                    "number" => 3 . '.' . $t,
                    "description" => $item->description,
                    "icons" => ["travel"],
                    "image" => $imageLink,
                    "videoId" => $item->video_id,
                    "no-auto-next-button" => false,
                    "powered-by-earch" => !0,
                    "mapCoord" => [
                        "lat" => (double)$item->lat,
                        "lng" => (double)$item->long
                    ],
                    "mapIcon" => "map-world.png",
                    "titlecard" => [
                        "narrators" => [
                            [
                                "name" => "KBKM",
                                "image" => "logo-kbkm-profile.png"
                            ]
                        ]
                    ],
                    "showNextCard" => !1
                ],
            ];

            array_push($opening, $trips);

            $t++;
        }

        return response()->json($opening);
    }

    public function v2()
    {
        // Intrp
        $intro = [
            "intro" => [
                "id" => "intro",
                "next" => "/",
                "type" => "intro",
                "level" => 0,
                "content" => [
                    "name" => "Welcome to Borobudur",
                    "number" => "01",
                    "videoId" => "Lv_GojoT1v4",
                    "mobileVideoId" => "Lv_GojoT1v4",
                    "no-auto-next-button" => true
                ],
                "titles" => [
                    [
                        "id" => "1",
                        "start" => "4",
                        "end" => "7.5"
                    ],
                    [
                        "id" => "0",
                        "start" => "2",
                        "end" => "7.5"
                    ],
                    [
                        "id" => "2",
                        "start" => "84.5",
                        "end" => "300"
                    ]
                ]
            ],
        ];

        // Map
        $map = [
            "map" => [
                "id" => "map",
                "type" => "map",
                "level" => 4,
                "url" => "map",
                "content" => [
                    "name" => "Map",
                    "state-labels" => [
                        [
                            "icon" => "utah.svg",
                            "size" => [
                                "x" => 44.1,
                                "y" => 16
                            ],
                            "anchor" => [
                                "x" => 44.1,
                                "y" => 16
                            ],
                            "position" => [
                                "lat" => 37.02,
                                "lng" => -109.07
                            ]
                        ],
                        [
                            "icon" => "arizona.svg",
                            "size" => [
                                "x" => 77.8,
                                "y" => 16
                            ],
                            "anchor" => [
                                "x" => 77.8,
                                "y" => 0
                            ],
                            "position" => [
                                "lat" => 36.987,
                                "lng" => -109.07
                            ]
                        ],
                        [
                            "icon" => "colorado.svg",
                            "size" => [
                                "x" => 88.5,
                                "y" => 16
                            ],
                            "anchor" => [
                                "x" => 0,
                                "y" => 16
                            ],
                            "position" => [
                                "lat" => 37.02,
                                "lng" => -109.02
                            ]
                        ],
                        [
                            "icon" => "newmexico.svg",
                            "size" => [
                                "x" => 126.5,
                                "y" => 16
                            ],
                            "anchor" => [
                                "x" => 0,
                                "y" => 0
                            ],
                            "position" => [
                                "lat" => 36.987,
                                "lng" => -109.02
                            ]
                        ]
                    ]
                ]
            ]
        ];

        //takeaction
        /* $act = [
            "take-action" => [
                "prev" => "indian-creek",
                "type" => "takeaction",
                "level" => 1,
                "url" => "take-action",
                "parent" => "take-action",
                "content" => [
                    "name" => "Take Action",
                    "cta" => "Defend",
                    "number" => "03",
                    "image" => "03_action.jpg",
                    "description" => "Keep public lands in public hands. Protect Bears Ears.",
                    "videoId" => "Bc-Ypj7zttU",
                    "showNextCard" => !1
                ]
            ],
        ]; */

        /* $exp = [
            "experience" => [
                "next" => "/",
                "prev" => "/",
                "type" => "video",
                "level" => 4,
                "url" => "experience",
                "content" => [
                    "name" => "Experience VR",
                    "description" => "If you're using Google Cardboard or a VR headset, lay your phone in place, and hit the \"I'm ready\" button.",
                    "videoId" => "UK9BtMoFnEc",
                    // "videoVR" => "./assets/videos/experienceVR.mp4",
                    // "videoVRCDN" => "https://storage.googleapis.com/patagonia-bearsears.appspot.com/videos/experienceVR.mp4",
                    "experienceVR" => !0,
                    "showNextCard" => !1
                ]
            ]
        ]; */

        $villages = [];
        $products = [];
        $trips = [];

        $opening = array_merge($intro, $map, $villages, $products, $trips);

        $i = 1;
        $items = Village::all();
        foreach ($items as $item) {

            $imageLink = Storage::url('/assets/villages/images/' . $item->image);
            if (substr($item->image, 0, 5) == 'https') {
                $imageLink = $item->image;
            }

            $villages = [
                "next" => "/",
                "prev" => "/",
                "type" => "video",
                "level" => 1,
                "json" => "14_water_offering.json",
                "parent" => "culture",
                "url" => "/",
                "content" => [
                    "name" => $item->name,
                    "number" => $i,
                    "description" => $item->description,
                    "icons" => ["culture"],
                    "image" => $imageLink,
                    "videoId" => $item->video_id,
                    "no-auto-next-button" => false,
                    "powered-by-earch" => !0,
                    "mapCoord" => [
                        "lat" => (double)$item->lat,
                        "lng" => (double)$item->long
                    ],
                    "mapIcon" => "map-world.png",
                    "titlecard" => [
                        "narrators" => [
                            [
                                "name" => "KBKM",
                                "image" => "logo-kbkm-profile.png"
                            ]
                        ]
                    ],
                    "showNextCard" => !1
                ]
            ];

            array_push($opening, $villages);

            $j = 1;
            foreach ($item->culture as $val) {

                $imageLinkCulture = Storage::url('/assets/villages/images/' . $val->image);
                if (substr($val->image, 0, 5) == 'https') {
                    $imageLinkCulture = $val->image;
                }

                $culture = [
                    "next" => "/",
                    "prev" => "/",
                    // "type" => "video",
                    "type" => $val->type,
                    "level" => 2,
                    "json" => "14_water_offering.json",
                    "parent" => "culture",
                    "url" => "/",
                    "content" => [
                        "storyID" => $val->id,
                        "urlTarget" => $val->type == 'story' ? "http://story.borobudurside.com/" . $val->id . "/" . Str::slug($val->name) : $val->id,
                        "name" => $val->name,
                        "number" => $i . '.' . $j++,
                        "description" => $val->description,
                        "icons" => ["culture"],
                        "image" => $imageLinkCulture,
                        "videoId" => $val->video_id,
                        "no-auto-next-button" => false,
                        "powered-by-earch" => !0,
                        "mapCoord" => [
                            "lat" => (double)$val->lat,
                            "lng" => (double)$val->long
                        ],
                        "mapIcon" => "map-world.png",
                        "titlecard" => [
                            "narrators" => [
                                [
                                    "name" => "KBKM",
                                    "image" => "logo-kbkm-profile.png"
                                ]
                            ]
                        ],
                        "showNextCard" => !1
                    ],
                ];

                array_push($opening, $culture);
            }

            $i++;
        }

        /* $narasi = [
            "next" => "/",
            "prev" => "/",
            "type" => "narasi",
            "level" => 2,
            "json" => "14_water_offering.json",
            "parent" => "culture",
            "url" => "/",
            "content" => [
                "name" => "ini narasi",
                "number" => "1000",
                "description" => "narasi banget",
                "icons" => ["culture"],
                "image" => "https://dm.fujiyantov.id/storage/assets/villages/images/1657983079.jpeg",
                "videoId" => "kDoyrTT5eqw",
                "no-auto-next-button" => false,
                "powered-by-earch" => !0,
                "mapCoord" => [
                    "lat" => -7.6378263,
                    "lng" => 110.1849323
                ],
                "mapIcon" => "map-world.png",
                "titlecard" => [
                    "narrators" => [
                        [
                            "name" => "KBKM",
                            "image" => "logo-kbkm-profile.png"
                        ]
                    ]
                ],
                "showNextCard" => !1
            ],
        ];

        array_push($opening, $narasi); */

        return response()->json($opening);
    }
}
