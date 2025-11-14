<?php

namespace App\Services;

use App\Models\User;
use App\Models\GameEvent;
use App\Models\UserEventParticipation;

class CoinService
{
    public function rewardParticipation(User $user, GameEvent $gameEvent)
    {
        // Cek atau buat record partisipasi
        $participation = UserEventParticipation::firstOrCreate(
            [
                'user_id' => $user->id,
                'game_event_id' => $gameEvent->id
            ],
            ['participation_count' => 0]
        );

        // Tambah count partisipasi
        $participation->increment('participation_count');

        // Berikan 10 koin untuk setiap partisipasi
        $coinsToAdd = 10;
        $user->addCoins($coinsToAdd);

        // Bonus untuk partisipasi berulang (setiap 5 event)
        if ($participation->participation_count % 5 == 0) {
            $bonusCoins = 50;
            $user->addCoins($bonusCoins);

            // Optional: Notifikasi bonus
            session()->flash('bonus_message', "Selamat! Anda mendapatkan bonus {$bonusCoins} koin untuk partisipasi ke-{$participation->participation_count}!");
        }

        return [
            'base_coins' => $coinsToAdd,
            'bonus_coins' => ($participation->participation_count % 5 == 0) ? 50 : 0,
            'total_coins' => $user->coins,
            'participation_count' => $participation->participation_count
        ];
    }
}
