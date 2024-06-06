<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\DetailOrder;
use App\Models\Product;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders=Order::select('customers.name', 'customers.identification_document','orders.date','orders.price','orders.status')
        -> join ('customers','customer_id','=','orders.customer_id')->get();
        return view('orders.index', compact('orders'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::where('status', '=', '1')->orderBy('name')->get();
        $customers = Customer::where('status', '=', '1')->orderBy('name')->get();
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        return view('orders.create', compact('products', 'customers', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        DB::beginTransaction();
        try {
            $order = new Order();

            $order -> customer_id = $request->customer_id;
            $order -> date = $request->date;
            $order -> price = $request->price;
            $order -> status = $request->status;
            $order -> registerby = $request->registerby;
            $order -> route = $request->route;
            $order -> save();

            $idorder= $order ->id;
            
            $cont = 0;
            
            DB::commit();
            return redirect()->route('orders.index')->with('successMsg', 'Exitoso');

        } catch (Exception $e) {
            return redirect()->back()->with('successMsg', 'Error to register the info');
            DB::rollBack();
        }

        // $order = Order::create([
        //     'date' => Carbon::now()->toDateTimeString(),
        //     'price' => $request->price,
        //     'route' => "Por hacer",
        //     'customer_id' => Customer::find($request->customer)->id,
        // ]);

        // $order->status = 0;
        // $order->registerby = $request->registerby;

        // $price = 0;

        // $rawProductId = $request->product_id;
        // $rawQuantity = $request->quantity;
        // for ($i = 0; $i < count($rawProductId); $i++) {
        //     $product = Product::find($rawProductId[$i]);
        //     $quantity = $rawQuantity[$i];
        //     $subtotal = $product->price * $quantity;

        //     $order->orderDetails()->create([
        //         'quantity' => $quantity,
        //         'subtotal' => $subtotal,
        //             'product_id' => $product->id,
        //         ]);

        //         $price += $subtotal;
        //     }
        //     $order->price = $price;
           
            
            
            

            // Generate bill (PDF).
            $pdfName = 'uploads/bills/bill_' . $order->id . '_' . Carbon::now()->format('YmdHis') . '.pdf';

            $order = Order::find($order->id);
            $client = Customer::where("id", $order->customer_id)->first();
            $details = DetailOrder::with('product')
                ->where('detailorders.order_id', '=', $order->id)
                ->get();

            $pdf = PDF::loadView('orders.bill', compact("order", "customer", "details"))
                ->setPaper('letter')
                ->output();

            file_put_contents($pdfName, $pdf);

            $order->route = $pdfName;
            $order->save();


            return redirect()->route("orders.index")->with("success", "The orders has been created.");
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::select('customers.name', 'customer.document','orders.id', 'orders.date', 'orders.total')
        -> join ('customers','customers.id','=','orders.customer_id')->where ('orders.id','=',$id)->first();

        $detail = DetailOrder::select('products.name as product_name', 'products.price as productPrice')
        ->join('products')->where ('order_details.order_id','=',$id)->get();

        return view ('orders.index', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route("orders.index")->with("success", "The order has been deleted successfully");
    }

    public function changestatusorder(Request $request){
        $order = Order::find($request->order_id);
        $order->status = $request->status;
        $order->save();
    }
}