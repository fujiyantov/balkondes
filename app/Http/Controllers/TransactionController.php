<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\UpdateTransactionRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Transaction::latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    if ($item->status == 0) {
                        return '<a class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#updateModal' . $item->id . '">
                            <i class="fas fa-edit"></i> &nbsp; Update
                        </a>';
                    } else {
                        return '-';
                    }
                })
                ->addColumn('created_at', function ($item) {
                    return Carbon::parse($item->created_at)->toDateTimeString();
                })
                ->addColumn('name', function ($item) {
                    return ucwords($item->name);
                })
                ->addColumn('grand_total', function ($item) {
                    return 'Rp ' . number_format($item->grand_total);
                })
                ->addColumn('product', function ($item) {
                    $name = '';

                    if ($item->type == 'produk') {
                        $name = $item->product->name;
                    }

                    if ($item->type == 'travel') {
                        $name = $item->trip->name;
                    }

                    return $name;
                })

                ->addColumn('status', function ($item) {
                    $label = 'pending';
                    $status = 'warning';
                    $style = 'text-dark';
                    if ($item->status == 1) {
                        $label = 'complete';
                        $status = 'success';
                        $style = '';
                    }

                    $bedge = '<span class="badge bg-' . $status . ' ' . $style . ' "><strong>' . ucwords($label) . '</strong></span>';

                    return $bedge;
                })
                ->addColumn('file', function ($item) {

                    $imageLink = Storage::url('/assets/transactions/images/' . $item->file);
                    if (substr($item->file, 0, 5) == 'https') {
                        $imageLink = $item->file;
                    }

                    if ($item->file != NULL) {

                        return '
                        <a class="btn btn-primary btn-xs" target="_blank" href="' . $imageLink . '" ">
                            <i class="fa fa-eye"></i> &nbsp; Lihat
                        </a>
                    ';
                    } else {
                        return '-';
                    }
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['action', 'name', 'product', 'status', 'created_at', 'grand_total', 'file'])
                ->make();
        }

        $collections = Transaction::latest()->get();

        foreach ($collections as $val) {
            $val->is_read = 1;
            $val->save();
        }

        return view('pages.admin.transaction.index', [
            'collections' => $collections
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, $id)
    {
        $data = $request->only(array_keys($request->rules()));

        $item = Transaction::findOrFail($id);

        if ($request->hasFile('file')) {
            $data['file'] = time() . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->storeAs('assets/transactions/images/', $data['file']);
        }

        if ($request->hasFile('file')) {
            $item->file = $data['file'];
        }

        $item->status = $request->input('status');
        $item->updated_by = Auth::user()->id;
        $item->complete_date = date('Y-m-d H:i:s');
        $item->save();

        return redirect()->route('transactions.index')->with('success', 'Update Transactions has been successfully');
    }
}
