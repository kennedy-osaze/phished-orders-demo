<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailgunWebhookRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class MailgunWebhookController extends Controller
{
    public function __invoke(MailgunWebhookRequest $request): JsonResponse
    {
        $this->createOrder($request->validated());

        return new JsonResponse(['message' => 'Webhook received.']);
    }

    private function createOrder(array $data): Order
    {
        return DB::transaction(function () use ($data) {
            $user = User::firstOrCreate(
                ['email' => $data['from']['email']],
                ['name' => $data['from']['name']]
            );

            return $user->orders()->create([
                'name' => $data['subject'],
                'message_id' => $data['message_id'],
                'subject' => $data['subject'],
                'body' => $data['body'],
                'sent_at' => $data['date']
            ]);
        });
    }
}
