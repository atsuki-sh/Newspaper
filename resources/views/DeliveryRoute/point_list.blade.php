@foreach($points as $point)
    @if($point->point_id === null)
        {{-- 検索結果のリスト --}}
        <tr>
            <td class="align-middle text-center p-1 pl-2 pr-2">{{ $point->name }}</td>
            <td class="align-middle text-center p-1 pl-2 pr-2">
                <button type="button" class="registration btn btn-success text-nowrap"
                        data-url="" data-point-id="{{ $point->id }}">登録</button>
            </td>
        </tr>
    @else
        @if($bool)
            {{-- 登録済みポイントのリスト --}}
            <tr class="table-success">
                <td class="align-middle text-center p-1 pl-2 pr-2">{{ $point->name }}</td>
                <td class="align-middle text-center p-1 pl-2 pr-2">
                    <button type="button" class="point-delete btn btn-danger text-nowrap"
                            data-url="" data-point-id="{{ $point->id }}">削除</button>
                </td>
            </tr>
        @else
            {{-- 検索結果の登録済みポイントのリスト --}}
            <tr>
                <td class="align-middle text-center p-1 pl-2 pr-2">{{ $point->name }}</td>
                <td class="align-middle text-center p-1 pl-2 pr-2">
                    <button type="button" class="btn btn-success text-nowrap" disabled>登録済</button>
                </td>
            </tr>
        @endif
    @endif
@endforeach
