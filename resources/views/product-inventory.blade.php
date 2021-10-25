<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($prod['product_name'] . ": Inventory") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                  <div class="flex bg-gray-900 text-white px-3 py-2">
                    <div class="w-1/5">SKU</div>
                    <div class="w-1/5">Quantity</div>
                    <div class="w-1/5">Color</div>
                    <div class="w-1/5">Size</div>
                    <div class="w-1/5">Sale Price</div>
                    <div class="w-1/5">Cost</div>
                  </div>
                  @foreach($prod["inventory"] as $invItem)
                    <div class="flex px-3 py-2">
                      <div class="w-1/5">{{$invItem['sku']}}</div>
                      <div class="w-1/5">{{$invItem['quantity']}}</div>
                      <div class="w-1/5">{{$invItem['color']}}</div>
                      <div class="w-1/5">{{$invItem['size']}}</div>
                      <div class="w-1/5">{{$invItem['sale_price_cents'] / 100}}</div>
                      <div class="w-1/5">{{$invItem['cost_cents'] / 100}}</div>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
