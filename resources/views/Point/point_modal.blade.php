<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="pointModalLabel">配達ポイント管理</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span id="x" aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <div class="alert alert-danger d-none" id="error-messages"></div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="input-name">ポイント名</label>
                </div>
                <input type="text" class="form-control post-data" id="input-name" name="item[name]" value="{{ $point->name }}">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="submit"
                    data-url="{{ route('point_update') }}" data-id="{{ $point->id }}">保存</button>
            <button type="button" class="btn btn-secondary" id="btn-close" data-dismiss="modal">閉じる</button>
        </div>

    </div>
</div>
