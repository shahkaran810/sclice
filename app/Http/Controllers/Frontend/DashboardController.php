<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function dashboard()
    // {

    //     // $user = auth()->user();
    //     $user = Auth::user();
        
    //     $transactions = Transaction::where('user_id', $user->id);

    //     // dd($transactions);

    //     $recentTransactions = $transactions->latest()->take(5)->get();

    //     $referral = $user->getReferrals()->first();

    //     $dataCount = [
    //         'total_transaction' => $transactions->count(),
    //         'total_deposit' => $user->totalDeposit(),
    //         'total_investment' => $user->totalInvestment(),
    //         'total_profit' => $user->totalProfit(),
    //         'total_withdraw' => $user->totalWithdraw(),
    //         'total_transfer' => $user->totalTransfer(),
    //         'total_referral_profit' => $user->totalReferralProfit(),
    //         'total_referral' => $referral->relationships()->count(),

    //         'deposit_bonus' => $user->totalDepositBonus(),
    //         'investment_bonus' => $user->totalInvestBonus(),
    //         'rank_achieved' => $user->rankAchieved(),
    //         'total_ticket' => $user->ticket->count(),
    //     ];

    //     // dd($dataCount);

    //     return view('frontend.user.dashboard', compact('dataCount', 'recentTransactions', 'referral'));
    // }

    public function dashboard()
    {
        // Get the authenticated user
        // $user = Auth::user();
        $user = auth()->user();
        // Retrieve transactions for the authenticated user
        // $transactions = Transaction::where('user_id', $user->id)->get();

        // Retrieve the recent transactions (latest 5)
        // $recentTransactions = $transactions->latest()->take(5)->get();
        $recentTransactions = Transaction::where('user_id', $user->id)->latest()->take(5)->get();


        // Retrieve the first referral of the user
        // $referral = $user->getReferrals()->first();
        $referral = $user->getReferrals()->first();

        // Calculate various counts and totals for the user
        $dataCount = [
            'total_transaction' => $transactions->count(),
            'total_deposit' => $user->totalDeposit(),
            'total_investment' => $user->totalInvestment(),
            'total_profit' => $user->totalProfit(),
            'total_withdraw' => $user->totalWithdraw(),
            'total_transfer' => $user->totalTransfer(),
            'total_referral_profit' => $user->totalReferralProfit(),
            // 'total_referral' => $referral ? $referral->relationships()->count() : 0, // Check if referral exists before accessing relationships
            'deposit_bonus' => $user->totalDepositBonus(),
            'investment_bonus' => $user->totalInvestBonus(),
            'rank_achieved' => $user->rankAchieved(),
            'total_ticket' => $user->ticket->count(),
        ];

        // Return the dashboard view with the data
        return view('frontend.user.dashboard', compact('dataCount', 'recentTransactions', 'referral'));
    }
}
