<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-xl">Your Inventory ({{ count($products) }} total)</p>
                </div>
                <div>
                  <div class="flex bg-gray-900 text-white px-3 py-2">
                    <div class="w-1/5">Product</div>
                    <div class="w-1/5">SKU</div>
                    <div class="w-1/5">Quantity</div>
                    <div class="w-1/5">Color</div>
                    <div class="w-1/5">Size</div>
                    <div class="w-1/5">Price</div>
                    <div class="w-1/5">Cost</div>
                  </div>
                  @foreach($products as $p)
                    <div class="flex px-3 py-2">
                      <div class="w-1/6">{{$p->product_name}}</div>
                      <div class="w-1/6">{{$p->sku}}</div>
                      <div class="w-1/6">{{$p->quantity}}</div>
                      <div class="w-1/6">{{$p->color}}</div>
                      <div class="w-1/6">{{$p->size}}</div>
                      <div class="w-1/6">${{$p->price_cents / 100}}</div>
                      <div class="w-1/6">${{$p->cost_cents / 100}}</div>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
