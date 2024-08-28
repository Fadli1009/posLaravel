<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body {
        margin: 20px;
        font-family: Arial, sans-serif;

    }

    .struk {
        width: 80mm;
        max-width: 100%;
        border: 1px solid black;
        padding: 10px;
        margin: 0px auto;
    }

    .struk-header,
    .struk-footer {
        text-align: center;
        margin-bottom: 10px;
    }

    .struk-header h1 {
        font-size: 18px;
        margin: 0;
    }

    .struk-body {
        margin-bottom: 10px;
    }

    .struk-body table {
        width: 100%;
        border-collapse: collapse;
    }

    .struk-body table th,
    td {
        padding: 5px;
        text-align: left;
    }

    .struk-body table th {
        border-bottom: 1px solid black;
    }

    .total {
        font-weight: bold;
        border-top: 1px solid black;
        margin-top: 10px;
    }

    .total,
    .payment,
    .change {
        display: flex;
        justify-content: space-between;
        padding: 5px 0px;
    }

    @media print {
        body {
            margin: 0;
            padding: 0;
        }

        .struk {
            width: auto;
            border: none;
            margin: 0px;
            padding: 0px;
        }

        .struk-header h1,
        .struk-footer {
            font-size: 14px;
        }

        .struk-body table th,
        td {
            padding: 2px;
            text-align: left;
        }
    }
</style>

<body>
    <div class="struk">
        <div class="struk-header">
            <h1>Toko Jajang Kurmanang</h1>
            <p>Jalan Karet Bivak Kota Jakarta Barat</p>
            <p>Telp (021) 986531312</p>
            <p>Email tokojajangkurmanang@gmail.com</p>
        </div>
        <div class="struk-body">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salesDetail as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->product->product_name }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ number_format($item->product->price) }}</td>
                        <td>Rp. {{ number_format($item->sub_total) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="total">
                <span>Total Harga</span>
                <span>Rp. {{number_format($sales->trans_total_price,0,'.',',') }}</span>
            </div>
            <div class="payment">
                <span>Bayar:</span>
                <span>Rp.{{ number_format($sales->trans_paid,0,'.',',')}}</span>
            </div>
            <div class="change">
                <span>Kembalian:</span>
                <span>Rp. {{ number_format($sales->trans_change,0,'.',',') }}</span>
            </div>
        </div>
        <div class="struk-footer">
            <p>Terima Kasih, Atas Kunjungan Anda!</p>
            <p>Selamat Berbelanja Kembali</p>
        </div>
    </div>
    <script>
        window.onload = function() {
            window.print()
        }
    </script>
</body>

</html>