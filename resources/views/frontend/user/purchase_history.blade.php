@extends('frontend.layouts.user_panel')

@section('panel_content')
    <div class="card shadow-none rounded-0 border">
        <div class="card-header border-bottom-0">
            <h5 class="mb-0 fs-20 fw-700 text-dark">{{ translate('Purchase History') }}</h5>
        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead class="text-gray fs-12">
                    <tr>
                        <th class="pl-0">{{ translate('Code')}}</th>
                        <th data-breakpoints="md">{{ translate('Date')}}</th>
                        <th>{{ translate('Amount')}}</th>
                        <th data-breakpoints="md">{{ translate('Delivery Status')}}</th>
                        <th data-breakpoints="md">{{ translate('Payment Status')}}</th>
                        <th class="text-right pr-0">{{ translate('Options')}}</th>
                    </tr>
                </thead>
                <tbody class="fs-14">
                    @foreach ($orders as $order)
                        @if (count($order->orderDetails) > 0)
                            <tr>
                                <td class="pl-0">
                                    <a href="{{ route('purchase_history.details', encrypt($order->id)) }}">{{ $order->code }}</a>
                                </td>
                                <td class="text-secondary">{{ date('d-m-Y', $order->date) }}</td>
                                <td class="fw-700">
                                    {{ single_price($order->grand_total) }}
                                </td>
                                <td class="fw-700">
                                    <span class="badge badge-inline p-3 fs-12" style="border-radius: 25px; min-width: 80px !important;
                                             background-color:
                                             @if($order->delivery_status == 'cancelled') #ef486a;
                                             @elseif($order->delivery_status == 'delivered') #85b567;
                                             @elseif($order->delivery_status == 'pending') #3490f3;
                                             @else #3490f3;
                                             @endif;
                                             color: white;">
                                        {{ translate(ucfirst(str_replace('_', ' ', $order->delivery_status))) }}
                                    </span>
                                </td>
                                <td>
                                    <span
                                        class="badge badge-inline {{ $order->payment_status == 'paid' ? 'badge-success' : 'badge-danger' }} p-3 fs-12"
                                        style="border-radius: 25px; min-width: 80px !important;">
                                        {{ translate(ucfirst($order->payment_status)) }}
                                    </span>
                                </td>

                                <td class="text-right pr-0">
                                    <a class="btn-soft-white rounded-3 btn-sm mr-1"
                                        href="{{ route('re_order', encrypt($order->id)) }}">
                                        {{ translate('Re-order') }}
                                    </a>
                                    <!-- Invoice -->
                                    <a class="btn btn-soft-secondary-base btn-icon btn-circle btn-sm hov-svg-white mt-2 mt-sm-0"
                                        href="{{ route('invoice.download', $order->id) }}"
                                        title="{{ translate('Download Invoice') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12.001" viewBox="0 0 12 12.001">
                                            <g id="Group_24807" data-name="Group 24807" transform="translate(-1341 -424.999)">
                                                <path id="Union_17" data-name="Union 17"
                                                    d="M13936.389,851.5l.707-.707,2.355,2.355V846h1v7.1l2.306-2.306.707.707-3.538,3.538Z"
                                                    transform="translate(-12592.95 -421)" fill="#f3af3d" />
                                                <rect id="Rectangle_18661" data-name="Rectangle 18661" width="12" height="1"
                                                    transform="translate(1341 436)" fill="#f3af3d" />
                                            </g>
                                        </svg>
                                    </a>
                                    @if ($order->delivery_status == 'pending' && $order->payment_status == 'unpaid')
                                        <a class="btn btn-danger btn-icon btn-circle btn-sm hov-svg-white mt-2 mt-sm-0"
                                            href="javascript:void(0);" data-toggle="modal" data-target="#cancelOrderModal"
                                            data-order-id="{{ $order->id }}" title="{{ translate('Cancel Order') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                <path fill="#fff"
                                                    d="M6 5.293L10.707.586a1 1 0 1 1 1.414 1.414L7.414 6l4.707 4.707a1 1 0 1 1-1.414 1.414L6 7.414l-4.707 4.707a1 1 0 1 1-1.414-1.414L4.586 6 .879 1.293A1 1 0 1 1 2.293.586L6 5.293z" />
                                            </svg>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

            <div class="aiz-pagination mt-2">
                {{ $orders->links() }}
            </div>
        </div>
    </div>

    <!-- Cancel Order Modal -->
    <div class="modal fade" id="cancelOrderModal" tabindex="-1" role="dialog" aria-labelledby="cancelOrderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-center p-3" style="border-radius: 12px;">
                <div class="modal-body">
                    <div class="mb-3">
                        <img src="{{ asset('photo/warning.png') }}" alt="Warning" style="width: 50px; height: 50px;">
                    </div>
                    <h5 class="fw-bold">{{ translate('Cancel Order') }}</h5>
                    <p class="text-muted">{{ translate('Do you want to cancel this order?') }}</p>

                    <form id="cancelOrderForm">
                        @csrf
                        <input type="hidden" id="cancelOrderId">
                        <style>
                            .cancel-reason-container {
                                font-size: 16px;
                                margin-left: 0;
                                /* Default for mobile */
                            }

                            @media (min-width: 768px) {

                                /* Adjust for larger screens */
                                .cancel-reason-container {
                                    margin-left: 77px;
                                }
                            }
                        </style>
                        <!-- Cancellation Reasons -->
                        <div class="text-left cancel-reason-container">
                            <div class="form-check mb-2">
                                <input class="form-check-input cancel-reason" type="radio" name="cancel_reason" id="reason1"
                                    value="not_required">
                                <label class="form-check-label"
                                    for="reason1">{{ translate('Products Not Required Now') }}</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input cancel-reason" type="radio" name="cancel_reason" id="reason2"
                                    value="delay">
                                <label class="form-check-label"
                                    for="reason2">{{ translate('Cancelling Due to Delay') }}</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input cancel-reason" type="radio" name="cancel_reason" id="reason3"
                                    value="purchased_elsewhere">
                                <label class="form-check-label"
                                    for="reason3">{{ translate('Already Purchased Elsewhere') }}</label>
                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary px-4 py-2 mx-2"
                                data-dismiss="modal">{{ translate('NO') }}</button>
                            <button type="submit" class="btn btn-danger px-4 py-2 mx-2" id="confirmCancelBtn" disabled>
                                {{ translate('YES') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script to enable the YES button when a reason is selected -->
    <script>
        document.querySelectorAll('.cancel-reason').forEach(function (radioBtn) {
            radioBtn.addEventListener('change', function () {
                document.getElementById('confirmCancelBtn').disabled = false;
            });
        });
    </script>

    @section('script')
        <script>
            $(document).ready(function () {
                $('#cancelOrderModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget);
                    var orderId = button.data('order-id');
                    $('#cancelOrderId').val(orderId);
                });

                $('#cancelOrderForm').on('submit', function (e) {
                    e.preventDefault();
                    var orderId = $('#cancelOrderId').val();
                    var url = "{{ route('purchase_history.destroy', ':id') }}".replace(':id', orderId);

                    $.ajax({
                        url: url,
                        type: "GET",
                        success: function (response) {
                            $('#cancelOrderModal').modal('hide');
                            alert("Order canceled successfully!");
                            location.reload();
                        },
                        error: function (xhr) {
                            $('#cancelOrderModal').modal('hide');
                            alert("Error canceling order. Please try again.");
                        }
                    });
                });
            });
        </script>
    @endsection
@endsection

@section('modal')
    <!-- Delete modal -->
    @include('modals.delete_modal')

@endsection
