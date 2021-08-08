@foreach($users as $user)
    <tr>
        <th scope="row" class="align-middle">{{ $loop->iteration }}</th>
        <td class="align-middle">{{ $user->name }}</td>
        <td class="align-middle">{{ $user->email }}</td>
        <td class="align-middle">080-6373-0453</td>
        <td class="align-middle">{{ $user->admin === "0" ? "一般" : "管理者" }}</td>
        <td class="align-middle" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-admin="{{ $user->admin }}">
            <button type="button" class="btn btn-success change" data-toggle="modal" data-target="#exampleModal">変更</button>
            <button type="button" class="btn btn-secondary delete">削除</button>
        </td>
    </tr>
@endforeach
