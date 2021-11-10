<div class="order_summary">
    <div class="summary_card">
        @foreach(session('products') as $item)
            <div class="card_item">
                <div class="product_img">
                    <img
                        src="{{$item['pic']}}"
                        alt=""/>
                </div>
                <div class="product_info">
                    <h1>{{$item['title']}}</h1>
                    <div class="close-btn">
                        <i class="fa fa-close"></i>
                    </div>
                    <div class="product_rate_info">
                        <h1>$ {{$item['price']}}</h1>
                        <span class="pqt-minus" data-item-id="{{$item['food_id']}}">-</span>
                        <span class="pqt">{{$item['count']}}</span>
                        <span class="pqt-plus" data-item-id="{{$item['food_id']}}">+</span>
                    </div>
                </div>
            </div>
        @endforeach
        <hr/>
        <div class="order_price">
            <p>Order summary</p>
            <h4>$ {{auth()->user()->currentOrderTotalPrice()}}</h4>
        </div>
    </div>
</div>
