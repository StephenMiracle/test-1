<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-scroll shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-xl">Your Orders ({{ count($orders) }} total)</p>
                    <p class="text-lg">Total: ${{$total}}</p>
                    <p class="text-lg">Average: ${{ round($avg, 2) }}</p>
                </div>
                <div style="width: 1200px">
                  <div class="flex bg-gray-900 text-white px-3 py-2">
                    <div class="w-28 px-4">Customer</div>
                    <div class="w-28 px-4">Email</div>
                    <div class="w-28 px-4">Product</div>
                    <div class="w-20 px-4">Color</div>
                    <div class="w-20 px-4">Size</div>
                    <div class="w-20 px-4">Status</div>
                    <div class="w-20 px-4">$</div>
                    <div class="w-20 px-4">ID</div>
                    <div class="w-20 px-4">Shipper</div>
                    <div class="w-20 px-4">#</div>
                  </div>
                  @foreach($orders as $p)
                    <div class="flex px-3 py-2">
                      <div class="w-28 overflow-scroll px-4">{{$p->name}}</div>
                      <div class="w-28 overflow-scroll px-4">{{$p->email}}</div>
                      <div class="w-28 overflow-scroll px-4">{{$p->product_name}}</div>
                      <div class="w-20 overflow-scroll px-4">{{$p->color}}</div>
                      <div class="w-20 overflow-scroll px-4">{{$p->size}}</div>
                      <div class="w-20 overflow-scroll px-4">{{$p->order_status}}</div>
                      <div class="w-20 overflow-scroll px-4">{{$p->total_cents / 100}}</div>
                      <div class="w-20 overflow-scroll px-4">{{$p->transaction_id}}</div>
                      <div class="w-20 overflow-scroll px-4">{{$p->shipper_name}}</div>
                      <div class="w-20 overflow-scroll px-4">{{$p->tracking_number}}</div>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
