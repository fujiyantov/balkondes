<?php

namespace App\Http\Controllers\Admin;

use App\Models\Trip;
use App\Models\Village;
use App\Models\TripGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateTripRequest;
use App\Http\Requests\UpdateTripRequest;
use Yajra\DataTables\Facades\DataTables;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Trip::latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-primary btn-xs" href="' . route('trips.edit', $item->id) . '">
                            <i class="fas fa-edit"></i> &nbsp; Ubah
                        </a>
                        <form action="' . route('trips.destroy', $item->id) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini secara permanen dari situs anda?'" . ')">
                            ' . method_field('delete') . csrf_field() . '
                            <button class="btn btn-danger btn-xs">
                                <i class="far fa-trash-alt"></i> &nbsp; Hapus
                            </button>
                        </form>
                    ';
                })
                ->editColumn('city', function ($item) {
                    return ucwords($item->village->name);
                })
                ->editColumn('price', function ($item) {
                    return 'Rp ' . number_format($item->price);
                })
                ->editColumn('image', function ($item) {
                    $imageLink = Storage::url('/assets/trips/images/' . $item->image);
                    if (substr($item->image, 0, 5) == 'https') {
                        $imageLink = $item->image;
                    }
                    return '<div class="d-flex align-items-center">
                                <img class="img img-thumbnail img-fluid" width="75" src="' . $imageLink . '" />
                            </div>';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['action', 'city', 'price', 'image'])
                ->make();
        }
        return view('pages.admin.trip.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villages = Village::all();
        return view('pages.admin.trip.create', ['villages' => $villages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTripRequest $request)
    {
        DB::beginTransaction();
        // try {

        $data = $request->only(array_keys($request->rules()));

        if ($request->hasFile('image')) {

            $data['image'] = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('assets/trips/images', $data['image']);
        }

        $trip = Trip::create($data);
        if ($request->hasFile('photo')) {

            foreach ($request->file('photo') as $photo) {

                $photoName = $photo->getClientOriginalName();
                $photo->storeAs('assets/trips/gallery', $photoName);

                $gallery = new TripGallery();
                $gallery->trip_id = $trip->id;
                $gallery->image = $photoName;
                $gallery->save();
            }
        }

        DB::commit();
        return redirect()->route('trips.index')->with('success', 'Create Trip has been successfully');
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     throw log($e);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trips = Trip::findOrFail($id);
        return view('pages.admin.trip.show', [
            'trips' => $trips,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trips = Trip::findOrFail($id);
        $villages = Village::all();
        return view('pages.admin.trip.edit', [
            'villages' => $villages,
            'trips' => $trips,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTripRequest $request, $id)
    {
        DB::beginTransaction();
        try {

            $trip = Trip::findOrFail($id);

            $data = $request->only(array_keys($request->rules()));
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('assets/trips/images', $data['image']);
                $trip->image = $data['image'];
            }

            $trip->village_id = $data['village_id'];
            $trip->name = $data['name'];
            $trip->price = $data['price'];
            $trip->category = $data['category'];
            $trip->address = $data['address'];
            $trip->description = $data['description'];
            $trip->additional_information = $data['additional_information'];
            $trip->seller_name = $data['seller_name'];
            $trip->video_id = $data['video_id'];
            $trip->lat = $data['lat'];
            $trip->long = $data['long'];

            if (isset($data['is_published'])) {
                $trip->is_published = $data['is_published'];
            }

            $trip->save();
            if ($request->hasFile('photo')) {

                TripGallery::where('trip_id', $trip->id)->delete();

                foreach ($request->file('photo') as $photo) {

                    $photoName = $photo->getClientOriginalName();
                    $photo->storeAs('assets/trips/gallery', $photoName);

                    $gallery = new TripGallery();
                    $gallery->trip_id = $trip->id;
                    $gallery->image = $photoName;
                    $gallery->save();
                }
            }

            DB::commit();
            return redirect()->route('trips.index')->with('success', 'Update Trip has been successfully');
        } catch (\Exception $e) {
            DB::rollback();
            throw log($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Trip::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Delete Trip has been successfully');
    }
}
