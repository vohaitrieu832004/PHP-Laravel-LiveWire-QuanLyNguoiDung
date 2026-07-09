<div>
    @if (session()->has('message'))
        <div class="alert-success">✅ {{ session('message') }}</div>
    @endif

    <table class="manager-table">
        <thead>
            <tr>
                <th></th>
                <th>Người đề nghị</th>
                <th>Loại phiếu</th>
                <th>Vị trí máy hư</th>
                <th>Mô tả</th>
                <th>Ưu tiên</th>
                <th>Ngày lập</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @forelse($requests as $req)
                <tr>
                    <td>{{ $req->id }}</td>
                    <td>{{ $req->user->name }}</td>
                    <td>{{ $req->requestType->type_name }}</td>
                    <td>{{ $req->machine_location }}</td>
                    <td>{{ $req->description }}</td>
                    <td>
                        @if($req->priority === 'Cao')
                            <span class="badge badge-high">🔴 Cao</span>
                        @elseif($req->priority === 'Trung bình')
                            <span class="badge badge-medium">🟡 Trung bình</span>
                        @else
                            <span class="badge badge-low">🟢 Thấp</span>
                        @endif
                    </td>
                    <td>{{ $req->request_date }}</td>
                    <td>
                        @if($req->status === 'Chờ phê duyệt')
                            <span class="badge badge-pending">Chờ phê duyệt</span>
                        @elseif($req->status === 'Đã phê duyệt')
                            <span class="badge badge-approved">Đã phê duyệt</span>
                        @elseif($req->status === 'Từ chối')
                            <span class="badge badge-rejected">Từ chối</span>
                        @elseif($req->status === 'Đang xử lý')
                            <span class="badge badge-processing">Đang xử lý</span>
                        @else
                            <span class="badge badge-done">Hoàn thành</span>
                        @endif
                    </td>
                    <td>
                        @if($req->status === 'Chờ phê duyệt')
                            <button class="btn-approve" wire:click="approve({{ $req->id }})">✔ Duyệt</button>
                            <button class="btn-reject" wire:click="openReject({{ $req->id }})">✘ Từ chối</button>
                        @else
                            <span style="color:#9ca3af; font-size:13px;">Đã xử lý</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="text-align:center; color:#9ca3af; padding:30px;">Chưa có phiếu đề nghị nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Modal từ chối --}}
    @if($rejectingId)
        <div class="modal-overlay" style="display:flex;">
            <div class="modal-box" style="width:480px;">
                <div class="modal-header">
                    <h2>✘ Lý do từ chối</h2>
                    <button class="modal-close" type="button" wire:click="closeReject">✕</button>
                </div>
                <div class="modal-body">
                    <div class="modal-field">
                        <label>Nhập lý do từ chối <span class="required">*</span></label>
                        <textarea wire:model="rejectReason" rows="4" placeholder="Nhập lý do từ chối..."></textarea>
                        @error('rejectReason') <span class="field-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-cancel" wire:click="closeReject">Hủy</button>
                        <button type="button" class="btn-submit" wire:click="reject">Xác nhận từ chối</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>