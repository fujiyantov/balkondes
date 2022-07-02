<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductGallery;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Product::latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-primary btn-xs" href="' . route('products.edit', $item->id) . '">
                            <i class="fas fa-edit"></i> &nbsp; Ubah
                        </a>
                        <form action="' . route('products.destroy', $item->id) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini secara permanen dari situs anda?'" . ')">
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
                    $imageLink = Storage::url('/assets/products/images/' . $item->image);
                    if (substr($item->image, 0, 5) == 'https') {
                        $imageLink = $item->image;
                    }
                    return  '<div class="d-flex align-items-center">
                                <img class="img img-thumbnail img-fluid" width="75" src="' . $imageLink . '" />
                            </div>';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['action', 'city', 'price', 'image'])
                ->make();
        }
        return view('pages.admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villages = Village::all();
        return view('pages.admin.product.create', ['villages' => $villages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {

        DB::beginTransaction();
        try {

            $data = $request->only(array_keys($request->rules()));
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('assets/products/images', $data['image']);
            }

            $product = Product::create($data);
            if ($request->hasFile('photo')) {

                foreach ($request->file('photo') as $photo) {

                    $photoName = $photo->getClientOriginalName();
                    $photo->storeAs('assets/products/gallery', $photoName);

                    $gallery = new ProductGallery();
                    $gallery->product_id = $product->id;
                    $gallery->image = $photoName;
                    $gallery->save();
                }
            }

            DB::commit();
            return redirect()->route('products.index')->with('success', 'Create Product has been successfully');
        } catch (\Exception $e) {
            DB::rollback();
            throw log($e);
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
        $products = Product::findOrFail($id);
        return view('pages.admin.product.show', [
            'products' => $products,
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
        $products = Product::findOrFail($id);
        $villages = Village::all();
        return view('pages.admin.product.edit', [
            'villages' => $villages,
            'products' => $products,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        DB::beginTransaction();
        try {

            $product = Product::findOrFail($id);

            $data = $request->only(array_keys($request->rules()));
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('assets/products/images', $data['image']);
            }

            $product->village_id = $data['village_id'];
            $product->name = $data['name'];
            $product->price = $data['price'];
            $product->category = $data['category'];
            $product->image = $data['image'];
            $product->address = $data['address'];
            $product->description = $data['description'];
            $product->addtional_information = $data['addtional_information'];
            $product->seller_name = $data['seller_name'];
            $product->is_published = $data['is_published'];

            $product->save();
            if ($request->hasFile('photo')) {

                ProductGallery::where('product_id', $product->id)->delete();

                foreach ($request->file('photo') as $photo) {

                    $photoName = $photo->getClientOriginalName();
                    $photo->storeAs('assets/products/gallery', $photoName);

                    $gallery = new ProductGallery();
                    $gallery->product_id = $product->id;
                    $gallery->image = $photoName;
                    $gallery->save();
                }
            }

            DB::commit();
            return redirect()->route('products.index')->with('success', 'Update Product has been successfully');
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
        $item = Product::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Delete Product has been successfully');
    }
}
