@extends('template.base')
@section('title','Penjualan')
@section('content')
<form action="" method="post">
    <div class="row">
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="" class="form-label">Kode Transaksi</label>
                <input type="text" class="form-control" readonly name="kode_transaksi">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Kategori Produk</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="" selected>Pilih Kategori Produk</option>
                    @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>

                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Qty Product</label>
                <input type="number" class="form-control" min="0" id="product_qty">
                <input type="hidden" class="form-control" min="0" id="product_price">
                <input type="hidden" class="form-control" min="0" id="product_name">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="" class="form-label">Tanggal Transaksi</label>
                <input type="text" class="form-control" readonly name="tanggal_transaksi" value="<?=date('d/M/Y')?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Nama Produk</label>
                <select name="category_id" class="form-control" id="product_id">
                    <option value="" selected>Pilih Produk</option>
                </select>
            </div>
        </div>
    </div>
    <div class="table-transaction mt-5">
        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-primary tambah-product">Tambah Product</button>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Product</th>
                    <th>Price</th>
                    <th>QTY</th>
                    <th>Sub Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div class="row mt-2">
            <div class="col-sm-6">
                <label for="" class="form-label">Total Harga</label>
            </div>
            <div class="col-sm-6">
                <h4 class="total_price"></h4>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-6">
                <label for="" class="form-label">Di Bayar</label>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="bayar">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-6">
                <label for="" class="form-label">Kembali</label>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="kembalian" readonly>
            </div>
        </div>
    </div>
    </div>
</form>

@endsection
@section('scripts')
<script>
    $('#category_id').change(function(){
            let category_id = $(this).val(),option=""
           $.ajax({
            url:'/get-products/'+category_id,
            type:"GET",
            dataType : 'json',
            success:function(data){
                option += "<option value=''>Pilih Product</option>"
                $.each(data.product,function(key,value){
                    option +="<option value="+value.id+">"+value.product_name+"</option>"
                })
                $('#product_id').html(option)
            }
           })
        })
        $('.tambah-product').click(function(){
            let category_id = $('#category_id').val(),
            product_id = $('#product_id').val();
            if(category_id == 0){
                alert('Pilih Kategori Produk');
                return false;
            }
            if(product_id == 0){
                alert('Mohon Pilih Produk terlebih dahulu');
                return false;
            }
            let product_qty = $('#product_qty').val(),
            product_name = $('#product_name').val(),
            product_prices = $('#product_price').val()
            product_price = parseInt($('#product_price').val()),
            subtotal = product_prices * product_qty
            let newRow = ""

            newRow+= "<tr>"
                newRow+= `<td>${product_name}</td>`
                newRow+= `<td>Rp. ${ product_price.toLocaleString('id')}</td>`
                newRow+= `<td>${product_qty}</td>`
                newRow+= `<td>Rp. ${subtotal.toLocaleString('id')} <input type='hidden' class='sub_total_val' value='${subtotal}'/></td>`
                newRow+= `<td></td>`
                newRow+= "</tr>"
            $('tbody').append(newRow)

            let total = 0;
            $('.sub_total_val').each(function(){
                let sub_total = parseFloat($(this).val()) || 0;
                total += sub_total;
            })

            $('.total_price').text(total.toLocaleString('id'))
        })
        $('#product_id').change(function(){
            let product_id = $(this).val()
            $.ajax({
                url:'/get-productsbyId/'+product_id,
                type:"GET",
                dataType:"json",
                success:function(data){
                    console.log(data.product);
                    $('#product_price').val(data.product.price)
                    $('#product_name').val(data.product.product_name)
                }

            })
        })

</script>
@endsection