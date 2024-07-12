<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use App\Models\SelectedBet;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class BetController extends Controller
{
    public function saveBets(Request $request)
    {
        $request->validate([
            'selectedBets' => 'required|array',
        ]);


        $userId = auth()->id();

        if (!$userId) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }


        // Decode the JSON string into an associative array
        $betsArray = $request->input('selectedBets');

        // Example of processing each bet and calculating total amount
        $totalAmount = 0;
        foreach ($betsArray as $key => $value) {
            $totalAmount += $value; // Assuming $value is the amount to deduct
        }

        // Fetch the user's wallet
        $wallet = Wallet::where('user_id', $userId)->first();

        // Check if user has a wallet record
        if (!$wallet) {
            return response()->json(['message' => 'Wallet not found for this user'], 404);
        }

        // Check if the wallet balance is 0
        if ($wallet->balance == 0) {
            return response()->json(['message' => 'Please add funds to your wallet'], 400);
        }

        // Check if user has sufficient balance
        if ($wallet->balance < $totalAmount) {
            return response()->json(['message' => 'Insufficient balance'], 400);
        }

        // Deduct the amount from the user's wallet balance
        $wallet->balance -= $totalAmount;
        $wallet->save();
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $betsData = $request->selectedBets;

        if (!$betsData) {
            return response()->json(['message' => 'No selected bets found for this user'], 404);
        }

        $numericKeysArray = [];
        foreach ($betsData as $key => $value) {
            $numericKeysArray[(int)$key] = $value;
        }

        $randomNumbers = Collection::times(6, function () {
            return rand(1, 6); // Generates random number between 1 and 6
        })->toArray();

        // Initialize count arrays for each key in $numericKeysArray
        $matchedCounts = [];

        foreach ($numericKeysArray as $key => $value) {
            $matchedCounts[$key] = 0;
        }

        // Count how many random numbers match each key in $numericKeysArray
        foreach ($randomNumbers as $number) {
            if (array_key_exists($number, $numericKeysArray)) {
                $matchedCounts[$number]++;
            }
        }

        // Calculate results for each matched count
        $results = [];
        foreach ($matchedCounts as $key => $count) {
            $results[$key] = $count * $numericKeysArray[$key];
        }

        // Calculate the total of the results
        $totalWinnings = array_sum($results);

        // Add total winnings to the user's wallet balance
        $wallet->balance += $totalWinnings;
        $wallet->save();

        SelectedBet::create([
            'user_id' => $userId,
            'bets' => $request->selectedBets, // Store as JSON
        ]);

        // Return response with results and random numbers
        return response()->json([
            'random_numbers' => $randomNumbers,
            'matched_counts' => $matchedCounts,
            'results' => $results,
            'total_winnings' => $totalWinnings
        ]);

        // Return success response
        // return response()->json(['message' => 'Bets Saved Successfully and amount deducted'], 200);
    }


    public function fetchbalance(Request $request)
    {

        $userId = $request->user()->id; // Get authenticated user ID

        // Fetch the user's wallet
        $wallet = Wallet::where('user_id', $userId)->first();

        if (!$wallet) {
            return response()->json(['message' => 'Wallet not found for this user'], 404);
        }

        return response()->json(['balance' => $wallet->balance]);
    }
}
