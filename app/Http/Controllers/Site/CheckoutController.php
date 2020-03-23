<?php

namespace App\Http\Controllers\Site;

use Darryldecode\Cart\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;
use App\Services\PayPalService;

class CheckoutController extends Controller
{
    protected $orderRepository;
    protected $payPal;

    public function __construct(OrderContract $orderRepository, PayPalService $payPal)
    {
        $this->orderRepository = $orderRepository;
        $this->payPal = $payPal;
    }

    public function getCheckout()
    {
        return view('site3.pages.checkout');
    }

    public function placeOrder(Request $request)
    {
        // TO DO: Before storing the order implement
        // request validation !!!
        $order = $this->orderRepository->storeOrderDetails($request->all());

        //  dd($order);

        if ($order) {
            $this->payPal->processPayment($order);
        }

        return redirect()->back()->with('message','Order not placed');

    }

    public function complete(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');

        $status = $this->payPal->completePayment($paymentId, $payerId);

        $order = Order::where('order_number', $status['invoiceId'])->first();
        $order->status = 'processing';
        $order->payment_status = 1;
        $order->payment_method = 'PayPal -'.$status['salesId'];
        $order->save();

        \Cart::clear();
        return view('site3.pages.success', compact('order'));
    }

    public function completePayment($paymentId, $payerId)
    {
        $payment = Payment::get($paymentId, $this->payPal);
        $execute = new PaymentExecution();
        $execute->setPayerId($payerId);

        try {
            $result = $payment->execute($execute, $this->payPal);
        } catch (PayPalConnectionException $exception) {
            $data = json_decode($exception->getData());
            $_SESSION['message'] = 'Error, '. $data->message;
            // implement logic here to show errors from paypal
            exit;
        }

        if ($result->state === 'approved') {
            $transactions = $result->getTransactions();
            $transaction = $transactions[0];
            $invoiceId = $transaction->invoice_number;

            $relatedResources = $transactions[0]->getRelatedResources();
            $sale = $relatedResources[0]->getSale();
            $saleId = $sale->getId();

            $transactionData = ['salesId' => $saleId, 'invoiceId' => $invoiceId];

            return $transactionData;
        } else {
            echo "<h3>".$result->state."</h3>";
            var_dump($result);
            exit(1);
        }
    }
}
