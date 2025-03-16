<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BookOrder;
use App\Models\Order;
use App\Models\ShippingArea;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class OrderController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
               new Middleware(middleware: 'can:orders'),
        ];
    }

    public function index()
    {
        $orders = Order::filter(request()->all())
            ->with([
                'user:id,first_name,last_name,email,phone',
                'address:id,address',
                'shippingArea:id,name'
            ])
            ->orderByDesc('id')
            ->paginate(10);
        $shippingAreas = ShippingArea::select('id','name')->get();
        return view('Dashboard.Orders.index', compact('orders' , 'shippingAreas'));
    }


    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        $books = BookOrder::where('order_id', $order->id)->with(['book:id,name'])->paginate(10);
        return view('Dashboard.Orders.books', compact('books'));
    }


    public function destroy(string $id)
    {
        Order::destroy($id);
        return redirect()->back()->with('success', __('orders.delete_success'));
    }
}
