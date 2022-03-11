<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\QuotationItem;

use App\Models\Quotation;

use App\Http\Livewire\Field;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class QuotationItems extends Component
{


    public $quotationItems, $productName, $quantity,$price,$amount, $quotationItem_id;

    public $updateMode = false;

    public $inputs = [];

    public $i = 1;

      
    public function add($i)

    {

        $i = $i + 1;

        $this->i = $i;

        array_push($this->inputs ,$i);

    }

    public function remove($i)

    {

        unset($this->inputs[$i]);

    }


    public function render()
   

    {
        $this->contacts = QuotationItem::all();
        return view('livewire.quotation-items');
    }

    private function resetInputFields(){

        $this->productName = '';

        $this->quantity = '';

        $this->price = '';

        $this->amount = '';

    }


    public function store(Request $request)

    {

      

        $validatedDate = $this->validate([

                'productName.0' => 'required',  'price.0' => 'required', 

                'quantity.0' => 'required',     'amount.0' => 'required', 



            ],

            [

                'productName.0.required' => 'name field is required',   'price.0.required' => 'price field is required',


                'quantity.0.required' => 'quantity field is required', 'amount.0.required' => 'amount field is required',


               


            ]

        );

     

        foreach ($this->productName as $key => $value) {

            QuotationItem::create(['quotation_id' => $quotationID,'productName' => $this->productName[$key],'quantity' => $this->quantity[$key],'price' => $this->price[$key], 'amount' => $this->amount[$key]]);

        }

  

        $this->inputs = [];

   

        $this->resetInputFields();

       

        session()->flash('message', 'Contact Has Been Created Successfully.');

    }
}
