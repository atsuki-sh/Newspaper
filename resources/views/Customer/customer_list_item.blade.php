@foreach($customers as $customer)
    <tr>
        <th scope="row" class="align-middle">{{ $loop->iteration }}</th>
        <td class="align-middle">{{ $customer->name }}</td>
        <td class="align-middle">{{ $customer->tel }}</td>
        <td class="align-middle">{{ $customer->address }}</td>
        <td class="align-middle">{{ $customer->copy }}</td>
        <td class="align-middle">
            <button type="button" class="btn btn-success" id="change" data-toggle="modal" data-target="#exampleModal">変更</button>
            <button type="button" class="btn btn-secondary" id="delete">削除</button>
        </td>
    </tr>
@endforeach
