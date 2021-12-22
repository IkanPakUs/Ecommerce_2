<div class="card-body--">
    <div class="table-stats order-table ov-h">
        <table class="table ">
            <thead>
                <tr>
                    <th class="serial">#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Grandtotal</th>
                    <th>Time Order</th>
                    <th>Action</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 0;
                @endphp
                @foreach ($transactions as $transaction)    
                    <tr>
                        <td class="serial">{{ $count++ }}</td>
                        <td>{{ $transaction->code }}</td>
                        <td><span class="name">{{ $transaction->user->name }}</span> </td>
                        <td><span class="product">{{ $transaction->grandtotal }}</span> </td>
                        <td><span class="count">{{ $transaction->created_at }}</span></td>
                        <td>
                            @if ($transaction->status == 3)
                                <form action="{{ route('admin.transaction.confirmed', ["Transaction" => $transaction->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn badge badge-info">Confirm</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            @if ($transaction->status == 1)
                                <span class="badge badge-complete">Success</span>
                            @elseif ($transaction->status == 3)
                                <span class="badge badge-warning">Pending</span>
                            @else
                                <span class="badge badge-danger">Failed</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- /.table-stats -->
</div>