<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionRequest;
use App\Transaction;
use Illuminate\Support\Str;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metaTitle = 'Halaman Transaksi';
        $transaction = Transaction::with([
            'details', 'travel_package', 'user' // function pada model transaction
        ])->get();

        return view('pages.admin.transaction.index', 
        [
            'metaTitle' => $metaTitle,
            'transaction' => $transaction,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        Transaction::create($data);
        return redirect()->route('transaction.index');
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $metaTitle = 'Halaman Transaksi';
        $transaction = Transaction::with([
            'details', 'travel_package', 'user' // function pada model transaction
        ])->findOrFail($id);

        return view('pages.admin.transaction.detail', 
        [
            'metaTitle' => $metaTitle,
            'transaction' => $transaction,
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
        $metaTitle = 'Halaman Edit Transaksi';
        $transaction = Transaction::findOrFail($id);

        return view('pages.admin.transaction.edit', 
        [
            'metaTitle' => $metaTitle,
            'transaction' => $transaction,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $transaction = Transaction::findOrFail($id);
        $transaction->update($data);

        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transaction.index');
    }
}
