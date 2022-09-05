<?php

namespace App\Http\Controllers\Admin;

use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\CreateVillageRequest;
use App\Http\Requests\UpdateVillageRequest;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Village::latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-primary btn-xs" href="' . route('villages.edit', $item->id) . '">
                            <i class="fas fa-edit"></i> &nbsp; Ubah
                        </a>
                        <form action="' . route('villages.destroy', $item->id) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini secara permanen dari situs anda?'" . ')">
                            ' . method_field('delete') . csrf_field() . '
                            <a class="btn btn-danger btn-xs">
                                <i class="far fa-trash-alt"></i> &nbsp; Hapus
                            </a>
                        </form>
                    ';
                })
                ->editColumn('name', function ($item) {
                    return ucwords($item->name);
                })
                ->editColumn('image', function ($item) {

                    $imageLink = Storage::url('/assets/villages/images/' . $item->image);
                    if (substr($item->image, 0, 5) == 'https') {
                        $imageLink = $item->image;
                    }

                    return '<div class="d-flex align-items-center">
                                <img class="img img-thumbnail img-fluid" width="75" src="' . $imageLink . '" />
                            </div>';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['action', 'name', 'image'])
                ->make();
        }
        return view('pages.admin.village.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.village.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVillageRequest $request)
    {
        try {
            $data = $request->only(array_keys($request->rules()));

            if ($request->hasFile('image')) {

                $data['image'] = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('assets/villages/images', $data['image']);
            }

            $test = Village::create($data);

            return redirect()->route('villages.index')->with('success', 'Create Village has been successfully');
        } catch (\Exception $e) {
            throw log($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $villages = Village::findOrFail($id);
        return view('pages.admin.village.show', [
            'villages' => $villages,
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
        $villages = Village::findOrFail($id);
        return view('pages.admin.village.edit', [
            'villages' => $villages,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVillageRequest $request, $id)
    {
        $data = $request->only(array_keys($request->rules()));

        $village = Village::findOrFail($id);

        if ($request->hasFile('image')) {
            $data['image'] = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('assets/villages/images/', $data['image']);
        }

        $village->name = $data['name'];
        $village->description = $data['description'];

        if ($request->hasFile('image')) {
            $village->image = $data['image'];
        }

        $village->video_vr = $data['video_vr'] ?? null;
        $village->video_id = $data['video_id'] ?? null;
        $village->lat = $data['lat'];
        $village->long = $data['long'];

        if (isset($data['is_published'])) {
            $village->is_published = $data['is_published'];
        }

        $village->save();

        return redirect()->route('villages.index')->with('success', 'Update Village has been successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Village::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Delete Village has been successfully');
    }
}
