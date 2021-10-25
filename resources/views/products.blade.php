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
                    <p class="text-xl">Your Products</p>
                </div>
                <div>
                  <div class="flex bg-gray-900 text-white px-3 py-2">
                    <div class="w-1/3">Name 
                    </div>
                    <div class="w-1/5">Style</div>
                    <div class="w-1/5">Brand</div>
                    <div class="w-1/5">Skus</div>
                  </div>
                  @foreach($products as $prod)
                    <div class="flex px-3 py-2">
                      <div class="w-1/3">{{$prod['product_name']}}
                        <a href='/product/{{$prod["id"]}}/inventory'>(view inventory)</a> 
                      </div>
                      <div class="w-1/5">{{$prod['style']}}</div>
                      <div class="w-1/5">{{$prod['brand']}}</div>
                      <div class="w-1/5"> 
                        @foreach($prod["inventory"] as $k => $inv)
                          {{$inv["sku"]}}
                          @if($k + 1 < count($prod["inventory"]))
                            |
                          @endif
                        @endforeach
                      </div>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
