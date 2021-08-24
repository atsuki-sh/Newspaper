@foreach($points as $point)
    <tr>
        <th scope="row" class="align-middle">{{ $loop->iteration }}</th>
        <td class="align-middle">{{ $point->name }}</td>
        <td class="align-middle">{{ $point->delivery_route_id === null ? 'なし' : $point->delivery_route_id }}</td>
        <td class="align-middle">{{ $point->north_lat }}</td>
        <td class="align-middle">{{ $point->east_lon }}</td>
        <td class="align-middle">{{ $point->updated_by }}</td>
        <td class="align-middle">
            <button type="button" class="btn btn-danger customer-info" data-url="{{ route('point_customer_modal', ['id' => $point->id]) }}">顧客情報</button>
            <button type="button" class="btn btn-success change" data-url="">変更</button>
            <button type="button" class="btn btn-secondary delete" data-url="">削除</button>
        </td>
    </tr>
@endforeach
