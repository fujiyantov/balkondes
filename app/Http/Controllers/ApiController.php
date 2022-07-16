<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Trip;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    public function index()
    {
        // Intrp
        $intro = [
            "intro" => [
                "id" => "intro",
                "next" => "culture",
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

        $villages = [];
        $products = [];
        $trips = [];
        $opening = array_merge($intro, $map, $villages, $products, $trips);

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
                    "video"
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
                "next" => "cave-spring-video",
                "prev" => "history-horseback",
                "type" => "video",
                "level" => 2,
                "json" => "14_water_offering.json",
                "parent" => "culture",
                "url" => "culture/cave-spring",
                "content" => [
                    "name" => $item->name,
                    "number" => 1 . '.' . $i,
                    "description" => $item->description,
                    "icons" => ["vrvideo"],
                    // "image" => $imageLink,
                    "image" => 'https://dm.fujiyantov.id/storage/assets/villages/images/WhatsApp%20Image%202022-07-12%20at%2010.42.05%20(3).jpeg',
                    "videoId" => $item->video_id,
                    "no-auto-next-button" => !0,
                    "powered-by-earch" => !0,
                    "mapCoord" => [
                        "lat" => $item->lat,
                        "lng" => $item->long
                    ],
                    "mapIcon" => "cave_spring.svg",
                    "titlecard" => [
                        "narrators" => [
                            [
                                "name" => "Octavius",
                                "image" => "octavius_seowtewa.jpg"
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
                    "next" => "cave-spring-video",
                    "prev" => "history-horseback",
                    "type" => "video",
                    "level" => 2,
                    "json" => "14_water_offering.json",
                    "parent" => "culture",
                    "url" => "culture/cave-spring",
                    "content" => [
                        "name" => $val->name,
                        "number" => 1 . '.' . $i . '.' . $j++,
                        "description" => $val->description,
                        "icons" => ["vrvideo"],
                        "image" => $imageLink,
                        "videoId" => $val->video_id,
                        "no-auto-next-button" => !0,
                        "powered-by-earch" => !0,
                        "mapCoord" => [
                            "lat" => $val->lat,
                            "lng" => $val->long
                        ],
                        "mapIcon" => "cave_spring.svg",
                        "titlecard" => [
                            "narrators" => [
                                [
                                    "name" => "Octavius",
                                    "image" => "octavius_seowtewa.jpg"
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
                    "video"
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
                "next" => "cave-spring-video",
                "prev" => "history-horseback",
                "type" => "video",
                "level" => 2,
                "json" => "14_water_offering.json",
                "parent" => "culture",
                "url" => "culture/cave-spring",
                "content" => [
                    "name" => $item->name,
                    "number" => 2 . '.' . $p,
                    "description" => $item->description,
                    "icons" => ["vrvideo"],
                    "image" => $imageLink,
                    "videoId" => $item->video_id,
                    "no-auto-next-button" => !0,
                    "powered-by-earch" => !0,
                    "mapCoord" => [
                        "lat" => $item->lat,
                        "lng" => $item->long
                    ],
                    "mapIcon" => "cave_spring.svg",
                    "titlecard" => [
                        "narrators" => [
                            [
                                "name" => "Octavius",
                                "image" => "octavius_seowtewa.jpg"
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
                    "video"
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
                "next" => "cave-spring-video",
                "prev" => "history-horseback",
                "type" => "video",
                "level" => 2,
                "json" => "14_water_offering.json",
                "parent" => "culture",
                "url" => "culture/cave-spring",
                "content" => [
                    "name" => $item->name,
                    "number" => 3 . '.' . $t,
                    "description" => $item->description,
                    "icons" => ["vrvideo"],
                    "image" => $imageLink,
                    "videoId" => $item->video_id,
                    "no-auto-next-button" => !0,
                    "powered-by-earch" => !0,
                    "mapCoord" => [
                        "lat" => $item->lat,
                        "lng" => $item->long
                    ],
                    "mapIcon" => "cave_spring.svg",
                    "titlecard" => [
                        "narrators" => [
                            [
                                "name" => "Octavius",
                                "image" => "octavius_seowtewa.jpg"
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
}
