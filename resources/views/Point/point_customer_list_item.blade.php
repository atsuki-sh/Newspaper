@foreach($customers as $customer)
    @if($customer->point_id === null)
        <tr>
            <td class="align-middle text-center p-1 pl-2 pr-2">{{ $customer->name }}</td>
            <td class="align-middle text-center p-1 pl-2 pr-2">{{ $customer->address }}</td>
            <td class="align-middle text-center p-1 pl-2 pr-2">{{ $customer->copy }}</td>
            <td class="align-middle text-center p-1 pl-2 pr-2">
                <button type="button" class="btn btn-success text-nowrap" data-url="">登録</button>
            </td>
        </tr>
    @else
        <tr class="table-success">
            <td class="align-middle text-center p-1 pl-2 pr-2">{{ $customer->name }}</td>
            <td class="align-middle text-center p-1 pl-2 pr-2">{{ $customer->address }}</td>
            <td class="align-middle text-center p-1 pl-2 pr-2">{{ $customer->copy }}</td>
            <td class="align-middle text-center p-1 pl-2 pr-2">
                <button type="button" class="btn btn-danger text-nowrap" data-url="">削除</button>
            </td>
        </tr>
    @endif
@endforeach
