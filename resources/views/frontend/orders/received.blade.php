@extends('frontend.layout')

@section('content')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="shop-checkout container">
            <h2 class="page-title">Proses Transaksi</h2>
            <div class="checkout-steps">
                <span class="checkout-steps__item">
                    <span class="checkout-steps__item-number">01</span>
                    <span class="checkout-steps__item-title">
                        <span>Pengiriman dan Checkout</span>
                    </span>
                </span>
                <span class="checkout-steps__item active">
                    <span class="checkout-steps__item-number">02</span>
                    <span class="checkout-steps__item-title">
                        <span>Konfirmasi Pembayaran</span>
                    </span>
                </span>
                <span class="checkout-steps__item">
                    <span class="checkout-steps__item-number">03</span>
                    <span class="checkout-steps__item-title">
                        <span>Transaksi Sukses</span>
                    </span>
                </span>
            </div>
            <div class="order-complete">
                <div class="checkout__totals-wrapper">
                    <div class="checkout__totals">
                        <h3>Detail Pesanan</h3>
                        <table class="checkout-totals">
                            <tbody>
                                <tr>
                                    <th>SUBTOTAL</th>
                                    <td>Rp{{ number_format($order->base_total_price, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>PAJAK</th>
                                    <td>Rp{{ number_format($order->tax_amount, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>ONGKIR</th>
                                    <td>Rp{{ number_format($order->shipping_cost, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>TOTAL</th>
                                    <td>Rp{{ number_format($order->grand_total, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="checkout__totals-wrapper">
                        <div class="checkout__totals">
                            <div>
                                <h4 class="text-center mb-3">Upload Bukti Pembayaran</h4>
                                <h6 class="text-center mb-3">( Batas pembayaran -
                                    {{ date('d M Y, H:i:s', strtotime($order->payment_due)) }} )</h6>
                                <ul>
                                    <li>Nomor Rekening
                                        <span>Bank BCA - 123456-x-999 - John Doe</span>
                                    </li>
                                    <li>Nomor Rekening
                                        <span>Bank Mandiri - 123456-x-838 - John Doe</span>
                                    </li>
                                    <li>Nomor Rekening
                                        <span>Bank Bri - 123456-x-3837 - John Doe</span>
                                    </li>
                                    <li>Nomor Rekening
                                        <span>Bank Bni - 123456-x-3837 - John Doe</span>
                                    </li>
                                </ul>
                            </div>

                            <form action="{{ route('pay.process') }}" enctype="multipart/form-data" method="post"
                                class="mt-4">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order->id }}" class="form-control">
                                <input type="file" name="payment_file" class="form-control">
                                <button style="border-radius: 8px;border: none;background-color: rgb(238, 77, 45);"
                                    class="d-block w-100 btn btn-dark text-center mt-3">Kirim</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
    <!-- batas -->
@endsection
