<?php   
class Cart{



    public function add_to_cart($id, $title, $price,$stock){
        if(isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
        }else{
            $cart['products'] = [];
        }
        
       if(array_key_exists($id, $cart['products'])){
                $quantity = $cart['products'][$id]['quantity'];
                if($quantity>=$stock){
                    
                
                }else{
                    $cart['products'][$id]['quantity'] = $quantity + 1;
                }
                
                
        }else{
            $cart['products'][$id] = [
                'id' => $id,
                'title' => $title,
                'quantity' => 1,
                'price' => $price
            ];
        }  
        $_SESSION['cart'] = $cart;
    }  
    public function updateCart1($id, $title, $price,$qty,$stock){
        if(isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
        }else{
            $cart['products'] = [];
        }
        
       if(array_key_exists($id, $cart['products'])){
                $quantity = $cart['products'][$id]['quantity'];
                $checkqty=$quantity+$qty;
                if($checkqty>$stock){
                    echo '<script language="javascript">';
                    echo 'alert("Limit Exceeded ")';
                    echo '</script>';
                }else{
                    $cart['products'][$id]['quantity'] = $quantity + $qty;
                }
                
        }else{
           
                $cart['products'][$id] = [
                   'id' => $id,
                    'title' => $title,
                    'quantity' => $qty,
                   'price' => $price
               ];
       


            
        }  
        $_SESSION['cart'] = $cart;
       
    }  

    public function updateCart2($id, $title, $price,$qty,$stock){
        if(isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
        }else{
            $cart['products'] = [];
        }
     if($qty<=$stock){      

           $cart['products'][$id] = [
                'id' => $id,
                'title' => $title,
                'quantity' => $qty,
                'price' => $price
               ];  
        
    }
    $_SESSION['cart'] = $cart;
    }  
    
    public function updateCart($id, $btn, $title, $price){
        $cart = $_SESSION['cart'];
        $quantity = $cart['products'][$id]['quantity'];
        if($btn == 'Minus Btn'){
            $quantity = $quantity - 1;
            if($quantity < 1){
                unset($cart['products'][$id]);
            }else{
                $cart['products'][$id]['quantity'] = $quantity;
            }
            
        }else if($btn == 'Plus Btn'){
            if(array_key_exists($id, $cart['products'])){
                $cart['products'][$id]['quantity'] = $quantity + 1;
            }else{
                $cart['products'][$id] = [
                    'id' => $id,
                    'title' => $title,
                    'quantity' => 1,
                    'price' => $price
                ];
            }
            
        }
        $_SESSION['cart'] = $cart;
    }
    
}