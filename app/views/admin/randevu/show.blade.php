@extends('admin.layouts.master')

@section('content')
<div class="page-content-wrap">

    <div class="row">
     <div class="col-md-12">

         <div class="panel panel-default">
             <div class="panel-body">
                 <h2>{{ Lang::get('pagination.Invoice') }} <strong>{{ $list->number_of_appointments }}</strong></h2>
                 <div class="push-down-10 pull-right">
                     <button class="btn btn-default"><span class="fa fa-print"></span> Print</button>
                 </div>
                 <!-- INVOICE -->
                 <div class="invoice">

                     <div class="row">
                         <div class="col-md-4">

                             <div class="invoice-address">
                                 <h5>From</h5>
                                 <h6>Organization Name</h6>
                                 <p>{{ $list->name_surname }}</p>
                                 <p>{{ Lang::get('pagination.phone') }}: {{ $list->phone }}</p>
                             </div>

                         </div>
                         <div class="col-md-4">

                             <div class="invoice-address">
                                 <h5>To</h5>
                                 <h6>{{ $settings->firma_adi }}</h6>
                                 <p>{{ Lang::get('pagination.phone') }}: {{ $settings->phone }}</p>
                             </div>

                         </div>
                         <div class="col-md-4">

                             <div class="invoice-address">
                                 <h5>Invoice</h5>
                                 <table class="table table-striped">
                                     <tr>
                                         <td width="200">{{ Lang::get('pagination.Invoice').' '.Lang::get('pagination.Number') }}:</td><td class="text-right">#{{ $list->number_of_appointments }}</td>
                                     </tr>
                                     <tr>
                                         <td><strong>{{ Lang::get('pagination.total') }}:</strong></td><td class="text-right"><strong>{{ $list->total }}</strong></td>
                                     </tr>
                                 </table>

                             </div>

                         </div>
                     </div>

                     <div class="table-invoice">
                         <table class="table">
                             <tr>
                                 <th>{{ Lang::get('pagination.transaction') }}</th>
                                 <th class="text-center">Unit Price</th>
                                 <th class="text-center">Quantity</th>
                                 <th class="text-center">Total</th>
                             </tr>

                             <tr>
                                 <td colspan="4">
                                     <p>{{ $list->transaction }}</p>
                                 </td>
                             </tr>
                         </table>
                     </div>

                     <div class="row">
                         <div class="col-md-6">
                             <h4>{{ Lang::get('pagination.Payment_Methods') }}</h4>

                             <div class="paymant-table">
                                 <a href="#" class="active">
                                     <img src="{{ url('administrator/img/cards/paypal.png') }}"/> PayPal
                                     <p>.</p>
                                 </a>
                                 <a href="#">
                                     <img src="{{ url('administrator/img/cards/visa.png') }}"/> Visa
                                     <p></p>
                                 </a>
                                 <a href="#">
                                     <img src="{{ url('administrator/img/cards/mastercard.png') }}"/> Master Card
                                     <p></p>
                                 </a>
                             </div>

                         </div>
                         <div class="col-md-6">
                             <h4>{{ Lang::get('pagination.details') }}</h4>

                             <table class="table table-striped">
                                 <tr>
                                     <td width="200"><strong>{{ Lang::get('pagination.amount') }}:</strong></td><td class="text-right">{{ $list->amount }}</td>
                                 </tr>
                                 <tr>
                                     <td><strong>{{ Lang::get('pagination.discount') }}:</strong></td><td class="text-right">{{ $list->discount }}</td>
                                 </tr>
                                 <tr class="total">
                                     <td>{{ Lang::get('pagination.total') }}:</td><td class="text-right">{{ $list->total }}</td>
                                 </tr>
                             </table>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-md-12">
                             <div class="pull-right push-down-20">
                                 <button class="btn btn-success"><span class="fa fa-credit-card"></span> Process Payment</button>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- END INVOICE -->

             </div>
         </div>

     </div>
    </div>

    </div>
    @stop