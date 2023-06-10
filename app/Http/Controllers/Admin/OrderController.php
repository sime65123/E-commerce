<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceOrderMailable;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(Request $request)
    {
       // $todayDate = Carbon::now();
       //$orders = Order::whereDate('created_at', $todayDate)->paginate(7);

       /* $todayDate = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != null, function ($q) use ($request) {

                            return $q->whereDate('created_at', $request->date);
                        }, function ($q) use ($todayDate){

                            return $q->whereDate('created_at', $todayDate);
                        })
                        ->when($request->status != null, function ($q) use ($request) {

                            return $q->where('status_message', $request->status);
                        })
                        ->latest()->paginate(7);

        return view('admin.orders.index', compact('orders')); */

        $query = Order::query();

        if ($request->has('view_all')) {
            $orders = $query->latest()->paginate(7);
        } else {
            $todayDate = Carbon::now()->format('Y-m-d');
            $query->when($request->date != null, function ($q) use ($request) {

                return $q->whereDate('created_at', $request->date);

            }, function ($q) use ($todayDate) {

                return $q->whereDate('created_at', $todayDate);
            })
            ->when($request->status != null, function ($q) use ($request) {

                return $q->where('status_message', $request->status);
            });

            $orders = $query->latest()->paginate(7);
        }

        return view('admin.orders.index', compact('orders'));
    }

    public function show($orderId)
    {
        $order = Order::where('user_id', Auth::user()->id)->where('id', $orderId)->first();
        if ($order) {
            return view('admin.orders.view', compact('order'));
        }else{
            return redirect('admin/orders')->with('message', 'No Order Found');
        }

    }

    public function destroy(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->orderItems()->delete(); // Supprime les produits commandés associés à la commande
        $order->delete(); // Supprime la commande elle-même

        return redirect('admin/orders')->with('message', 'Order Deleted Successfully');
    }

    public function updateOrderStatus(int $orderId, Request $request)
    {
        $order = Order::where('id', $orderId)->first();
        if ($order) {
            $order->update([
                'status_message' => $request->order_status
            ]);
            return redirect('admin/orders/'.$orderId)->with('message', 'Order Status Updated');
        }else{
            return redirect('admin/orders/'.$orderId)->with('message', 'No Order Found');
        }
    }

    public function viewInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('admin.invoice.generate-invoice', compact('order'));
    }

    public function generateInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];

        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);

        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice-'.$order->id.'-'.$todayDate.'.pdf');
    }

    public function SendMailInvoivce(int $orderId)
    {
        try {
            $order = Order::findOrFail($orderId);

            Mail::to("$order->email")->send(new InvoiceOrderMailable($order));
            return redirect('admin/orders/'.$orderId)->with('message', 'Invoice Mail has been sent to '.$order->email);

        } catch (\Exception $e) {
            return redirect('admin/orders/'.$orderId)->with('message', 'Something Went Wrong.!');
        }

    }
}
