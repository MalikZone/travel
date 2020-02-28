<?php

namespace App\Http\Controllers;
use App\Transaction;
use App\TransactionDetail;
use App\TravelPackage;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $transaction = Transaction::with([
            'details', 'travel_package', 'user'
        ])->findOrFail($id);

        return view('pages.checkout',
        [
            'transaction' => $transaction,
        ]);
    }

    public function process(Request $request, $id){
        $travel_package = TravelPackage::findOrFail($id);
  
        $transaction = Transaction::create([
          'travel_package_id' => $id,
          'users_id' => Auth::user()->id,
          'additional_visa' => 0,
          'transaction_total' => $travel_package->price,
          'transaction_status' => 'IN_CHART'
        ]);
  
        TransactionDetail::create([
          'transactions_id' => $transaction->id,
          'username' => Auth::user()->username,
          'nationality' => 'ID',
          'is_visa' => false,
          'doe_passport' => Carbon::now()->addYears(5)
        ]);
        return redirect()->route('checkout', $transaction->id);
      }

    public function remove(Request $request, $detail_id)
    {
        $transactionDetail = TransactionDetail::findOrFail($detail_id);
        
        $transaction = Transaction::with(['details', 'travel_package'])->findOrFail($transactionDetail->transactions_id);

        if ($transactionDetail->is_visa) {
            $transaction->transaction_total -= 190;
            $transaction->additional_visa -= 190;
        }

        $transaction->transaction_total -= $transaction->travel_package->price;

        $transaction->save();
        $transactionDetail->delete();

        return redirect()->route('checkout', $transactionDetail->transactions_id);
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            // 'username' => 'required|string|exists:users,username',
            'username' => 'string',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required',
        ]);

        $data = $request->all();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);
        
        $transaction = Transaction::with(['travel_package'])->find($id);

        if ($request->is_visa) {
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }
        
        $transaction->transaction_total += $transaction->travel_package->price;
        
        $transaction->save();
        return redirect()->route('checkout', $id);
    }


    public function success(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = 'PENDING';
        $transaction->save();

        return view ('pages.success');
    }
}
