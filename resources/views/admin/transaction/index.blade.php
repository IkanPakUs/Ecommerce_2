@extends('admin.layout.base')

@section('transaction-list', 'active')

@section('content')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Transaction List</h4>
                        </div>
                        @include('admin.transaction.list', compact('transactions'))
                    </div> <!-- /.card -->
                </div>  <!-- /.col-lg-8 -->

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection