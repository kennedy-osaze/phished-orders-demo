<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStoreRequest;
use App\Mail\CreateOrder;
use App\Mail\ReplyOrder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(50);

        return view('orders.index', compact('orders'));
    }

    public function create(CreateStoreRequest $request)
    {
        $validated = $request->validated();

        Mail::to(config('mail.order_to.address'))->send(new CreateOrder($validated));

        return back()->with('success', 'Order has been sent successfully.');
    }

    public function show(Order $order)
    {
        if (is_null($order->opened_at)) {
            $order->update(['opened_at' => now()]);
        }

        return view('orders.show', ['order' => $order->load(['reply', 'user'])]);
    }

    public function reply(Request $request, Order $order)
    {
        $request->validate(['reply' => ['required', 'string', 'min:3', 'max:65536']]);

        $reply = $order->reply()->create(['body' => ucfirst($request->reply)]);

        Mail::to($order->user)->send(new ReplyOrder($reply->setRelation('order', $order)));

        return redirect()->route('orders.show', ['order' => $order])
            ->with('success', 'Order reply sent successfully');
    }
}
