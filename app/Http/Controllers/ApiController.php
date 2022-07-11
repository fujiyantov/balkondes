<?php

namespace App\Http\Controllers;

use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    public function index()
    {
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
        $opening = array_merge($intro, $map, $villages);

        $i = 1;
        $items = Village::all();

        foreach ($items as $item) {

            $imageLink = Storage::url('/assets/villages/images/' . $item->image);
            if (substr($item->image, 0, 5) == 'https') {
                $imageLink = $item->image;
            }

            $villages = [
                "type" => "video",
                "level" => 1,
                // "json" => "01_culture.json",
                "url" => "/",
                // "parent" => "culture",
                "content" => [
                    "name" => $item->name,
                    "number" => $i,
                    "icons" => [
                        "video"
                    ],
                    "description" => $item->description,
                    "image" => $imageLink,
                    "videoId" => $item->video_id,
                    "showNextCard" => 1,
                    "mapIcon" => "escaping_places.svg",
                    // "video-show-skip" => 0,
                ],
            ];

            array_push($opening, $villages);

            $j = 1;
            foreach ($item->culture as $val) {
                
                $imageLinkCulture = Storage::url('/assets/villages/images/' . $val->image);
                if (substr($val->image, 0, 5) == 'https') {
                    $imageLinkCulture = $val->image;
                }

                $culture = [
                    /* "next" => "escaping-places-video",
                    "prev" => "culture", */
                    "type" => "video",
                    "level" => 2,
                    "json" => "11_escaping_places.json",
                    "parent" => "culture",
                    "url" => "culture/escaping-places",
                    "content" => [
                        "name" => $val->name,
                        "number" => $i.'.'.$j++,
                        "icons" => [
                            "vrvideo"
                        ],
                        "image" => $imageLinkCulture,
                        "description" => $val->description,
                        "videoId" => $val->video_id,
                        "no-auto-next-button" => 0,
                        "powered-by-earch" => 0,
                        "mapCoord" => [
                            "lat" => $val->lat,
                            "lng" => $val->long
                        ],
                        "mapIcon" => "escaping_places.svg",
                        /* "titlecard" => [
                            "narrators" => [
                                [
                                    "name" => "Willie",
                                    "image" => "willie_grayeyes.jpg"
                                ],
                                [
                                    "name" => "Jason",
                                    "image" => "jason_nez.jpg"
                                ]
                            ]
                        ], */
                        "showNextCard" => 1
                    ]
                ];

                array_push($opening, $culture);
            }

            $i++;
        }

        return $opening;

        return response()->json($opening);
    }
}
