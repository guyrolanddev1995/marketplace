<div class="col-12 col-lg-4 mt-4 mt-lg-0">
    <div class="bg-white shadow-sm">
        <div class="border-bottom" style="padding: 20px 20px 10px 10px; ">
            <h3>Votre commande</h3>
        </div>
       <div class="">
            <div style="max-height: 170px; overflow-y:auto">
                @foreach(\Cart::getContent() as $key => $item)
                    <div class="d-flex border-bottom" style="width: 100%;padding: 2px 0px;">
                        <div class="col-2">
                            <img src="{{ asset('storage/'.$item->attributes['image']) }}" alt="product-1" style="width:60px; height:60px">
                        </div>
                        <div class="col-9" style="margin-left: 20px">
                            <p style="font-size: 14px; font-weight: 400; color:black">
                                {{ $item->name }}
                            </p>
                            <p class="" style="color: #49a010; font-size: 13px;">{{ currency($item->price, 'XOF', currency()->getUserCurrency()) }}</p>
                            
                            <p style="font-size: 12px;">Qté:{{ $item->quantity}}</p>
                            
                        </div>
                    </div>  
                @endforeach
            </div>

            <div style="padding: 20px 20px 10px 10px">
               <div>
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="text-body" style="font-size: 16px">Sous-total:</h5>
                        <p style="font-size: 16px">{{ currency($subTitle, 'XOF', currency()->getUserCurrency()) }} </p>
                        
                    </div> 
                    <div class="d-flex align-items-center justify-content-between" style="margin-top: 10px">
                        <h5 class="text-body" style="font-size: 16px">Frais de livraison:</h5>
                        <p style="font-size: 16px">
                            @if($frais_livraison)
                                {{ currency($frais_livraison, 'XOF', currency()->getUserCurrency()) }}
                                
                            @else
                                Aucun
                            @endif
                        </p>
                    </div>
                    <small style="color: #49a010">
                        @if($transporteur)
                            Votre colis sera livré dans {{ $transporteur['delais'] }} jours
                        @endif
                    </small>
               </div>
               <div class="total d-flex border-top  align-items-center justify-content-between" style="margin-top: 15px; padding: 15px 0px">
                    <h5 class="" style="font-size: 16px;color: #49a010;">Total:</h5>
                    <p style="font-size: 16px">
                        @if($total)
                            {{ currency($total, 'XOF', currency()->getUserCurrency()) }} 
                        @else
                            Aucun
                        @endif
                    </p>
               </div>
            </div>
       </div>
    </div>
</div>