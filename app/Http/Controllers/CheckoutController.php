<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Webshop\Checkout;
use App\Webshop\ShoppingCart;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
  public function __construct() {
      $this->middleware('forbidEmptyShoppingCart');
}






   public function index(){
     $checkout=Checkout::getCheckoutFromSession();
       
       return view('front.checkout.index',[
           'checkout'=>$checkout
       ]);
   }
   public function process(){
       $request=request();
       $formData=$request->validate([
           'customerName'=>'required|string|min:2',
               'customerEmail'=>'required|email',
               'customerPhone'=>'required',
               'customerCountry'=>'required',
               'customerCity'=>'required',
               'customerZip'=>'required',
               'customerAddress'=>'required',
           
            'deliveryCountry'=>'required',
               'deliveryCity'=>'required',
               'deliveryZip'=>'required',
               'deliveryAddress'=>'required',
       ]);
       $checkout=Checkout::getCheckoutFromSession();
       
       $checkout->setCustomerName($formData['customerName']);
       $checkout->setCustomerEmail($formData['customerEmail']);
       $checkout->setCustomerPhone($formData['customerPhone']);
       $checkout->setCustomerCountry($formData['customerCountry']);
       $checkout->setCustomerCity($formData['customerCity']);
       $checkout->setCustomerZip($formData['customerZip']);
       $checkout->setCustomerAddress($formData['customerAddress']);
       $checkout->setDeliveryCountry($formData['deliveryCountry']);
       $checkout->setDeliveryCity($formData['deliveryCity']);
       $checkout->setDeliveryZip($formData['deliveryZip']);
       $checkout->setDeliveryAddress($formData['deliveryAddress']);  
       
       return redirect()->route('checkout.confirmation')
               ->with('systemMessage',"OK!Please confirm your purchase!!");
   }
      public function confirmation(){
           $checkout=Checkout::getCheckoutFromSession();
           $shoppingCart= ShoppingCart::getCartFromSession();
          return view('front.checkout.confirmation',[
          'checkout'=>$checkout,
             'shoppingCart'=> $shoppingCart
          ]);
      }
      public function confirm(){
          $checkout=Checkout::getCheckoutFromSession();
          $shoppingCart=ShoppingCart::getCartFromSession();
          //create order
          $order=new Order([
              'customer_name'=>$checkout->getCustomerName(),
               'customer_email'=>$checkout->getCustomerEmail(),
               'customer_phone'=>$checkout->getCustomerPhone(),
               'customer_country'=>$checkout->getCustomerCountry(),
               'customer_city'=>$checkout->getCustomerCity(),
               'customer_zip'=>$checkout->getCustomerZip(),
               'customer_address'=>$checkout->getCustomerAddress(),
              
              'delivery_country'=>$checkout->getDeliveryCountry(),
               'delivery_city'=>$checkout->getDeliveryCity(),
               'delivery_zip'=>$checkout->getDeliveryZip(),
               'delivery_address'=>$checkout->getDeliveryAddress(),
              
              
          ]);
          $order->save();
          foreach($shoppingCart->getItems() as $shoppingCartItem){
              $orderItem=new OrderItem([
                     'order_id' => $order->id,
                     'product_id'=>$shoppingCartItem->getProductId(),
                      'product_title'=>$shoppingCartItem->getProductTitle(),
                      'product_photo_url'=>$shoppingCartItem->getProductPhotoUrl(),
                      'product_price'=>$shoppingCartItem->getProductPrice(),
                       'quantity'=>$shoppingCartItem->getQuantity(),
                      ]);
               $orderItem->save();
          }
        //send email to customer
          
          
          
          
          //clear shopping cart items
          $shoppingCart->clearItems();
          
          
          
          return redirect()->route('checkout.finish')
                      ->with('orderId',$order->id)
                 ->with('systemMessage',"Congrats!Your order has been finished!We will call you soon!");
      }
         public function finish(){
             //read order from database
             
             $order=Order::findOrFail($orderId);
             return view('front.checkout.finish',[
                 'order'=>$order
             ]);
         }
}
