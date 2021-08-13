@foreach($users as $user)
    {{-- 携帯電話番号をハイフンで区切るように整形 --}}
    @php
        $phone1 = mb_substr($user->phone, 0, 3);
        $phone2 = mb_substr($user->phone, 3, 4);
        $phone3 = mb_substr($user->phone, 7, 4);
    @endphp
    <tr>
        <th scope="row" class="align-middle">{{ $loop->iteration }}</th>
        <td class="align-middle">{{ $user->name }}</td>
        <td class="align-middle">{{ $user->email }}</td>
        <td class="align-middle">{{ $phone1 }}-{{ $phone2 }}-{{ $phone3 }}</td>
        <td class="align-middle">{{ $user->admin === "0" ? "一般" : "管理者" }}</td>
        <td class="align-middle" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-url="{{ route('modal_data', ['id' => $user->id]) }}">
            <button type="button" class="btn btn-success change">変更</button>
            <button type="button" class="btn btn-secondary delete">削除</button>
        </td>
    </tr>
@endforeach
