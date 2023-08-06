@foreach($mang as $m)
            <li >{{$m}}</li>
@endforeach
<p1>Hello {{$name}}</p1>

<div >
 <!-- Content here -->
<x-alert :test="'test'"/>
 </div>
<div class="container">
    <div class="row">
        <x-product image="#" name="product 1" />
        <x-product image="#" name="product 2" />
        <x-product image="#" name="product 3" />


 </div>
 </div>


