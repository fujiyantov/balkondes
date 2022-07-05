<?php

namespace App\Http\Controllers\Admin;

use App\Models\VillageHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateVillageHistoryRequest;
use App\Http\Requests\UpdateVillageHistoryRequest;
use App\Models\Village;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class VillageHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = VillageHistory::latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-primary btn-xs" href="' . route('culture-histories.edit', $item->id) . '">
                            <i class="fas fa-edit"></i> &nbsp; Ubah
                        </a>
                        <form action="' . route('culture-histories.destroy', $item->id) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini secara permanen dari situs anda?'" . ')">
                            ' . method_field('delete') . csrf_field() . '
                            <button class="btn btn-danger btn-xs">
                                <i class="far fa-trash-alt"></i> &nbsp; Hapus
                            </button>
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
        return view('pages.admin.village.history.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villages = Village::all();
        return view('pages.admin.village.history.create', [
            'villages' => $villages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVillageHistoryRequest $request)
    {
        try {
            $data = $request->only(array_keys($request->rules()));

            if ($request->hasFile('image')) {

                $data['image'] = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('assets/villages/images', $data['image']);
            }

            $test = VillageHistory::create($data);

            return redirect()->route('culture-histories.index')->with('success', 'Create Culture History has been successfully');
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
        $villages = VillageHistory::findOrFail($id);
        return view('pages.admin.village.history.show', [
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
        $villages = VillageHistory::findOrFail($id);
        $collections = Village::all();
        return view('pages.admin.village.history.edit', [
            'villages' => $villages,
            'collections' => $collections,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVillageHistoryRequest $request, $id)
    {
        $data = $request->only(array_keys($request->rules()));

        $village = VillageHistory::findOrFail($id);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('assets/villages/images', $data['image']);
        }

        $village->name = $data['name'];
        $village->description = $data['description'];

        if ($request->hasFile('image')) {
            $village->image = $data['image'];
        }

        $village->video_id = $data['video_id'];
        $village->video_vr = $data['video_vr'];
        $village->video_etc = $data['video_etc'];

        if (isset($data['is_published'])) {
            $village->is_published = $data['is_published'];
        }

        $village->save();

        return redirect()->route('culture-histories.index')->with('success', 'Update Culture History has been successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = VillageHistory::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Delete Culture History has been successfully');
    }
}
