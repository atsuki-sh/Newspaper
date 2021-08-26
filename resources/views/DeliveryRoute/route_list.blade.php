@foreach($routes as $route)
    <tr>
        <th scope="row" class="align-middle">{{ $loop->iteration }}</th>
        <td class="align-middle">{{ $route->name }}</td>
        <td class="align-middle">{{ $route->updated_by }}</td>
        <td class="align-middle text-center">
            <button type="button" class="btn btn-danger mr-auto customer-info" data-url="">ポイント情報</button>
            <button type="button" class="btn btn-success change"
                    data-url="{{ route('route_modal', ['id' => $route->id]) }}">変更</button>
            <button type="button" class="btn btn-secondary route-delete"
                    data-url="{{ route('route_delete') }}"
                    data-id="{{ $route->id }}"
                    data-name="{{ $route->name }}">削除</button>
        </td>
    </tr>
@endforeach
