<?php 
namespace App\Helpers;


/**
 * 
 */
class Cart 
{
	public $items = [];
	public $total_quantity = 0;
	public $total_amount = 0 ;
	
	public function __construct()
	{

		$this->items = session('cart') ? session('cart') : [];
		$this->total_quantity = $this->total_quantity();
		$this->total_amount = $this->total_amount();
	}

	public function add($pro){
		if(isset($this->items[$pro->id])){
			$this->items[$pro->id]['quantity']+=1;
		}else{
			$this->items[$pro->id]=[
			'id'=>$pro->id,
			'name'=>$pro->name,
			'price'=>$pro->sale_price ? $pro->sale_price : $pro->price,
			'image'=>$pro->image,
			'quantity'=>1
			];
		}
		

		// dd($this->items);
		session(['cart'=>$this->items]);
		return true;



	}

	public function update($id, $quantity){
		if(isset($this->items[$id])){
			$this->items[$id]['quantity']= $quantity;
			session(['cart'=>$this->items]);
		}
	}
	public function remove($id){
		if(isset($this->items[$id])){
			unset($this->items[$id]);
			session(['cart'=>$this->items]);
		}

	}
	public function clear(){
		session(['cart'=>[]]);
	}

	protected function total_quantity(){
		$t = 0;
    	foreach ($this->items as $item) {
    		$t = $t + $item['quantity'];
    	}
    	return $t;
	}

	protected function total_amount(){
		$t = 0;
    	foreach ($this->items as $item) {
    		$t = $t + ($item['quantity']*$item['price']);
    	}
    	return $t;
	}
}

 ?>