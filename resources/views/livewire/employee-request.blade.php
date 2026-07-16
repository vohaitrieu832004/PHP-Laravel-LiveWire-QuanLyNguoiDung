<div>
    @if (session()->has('message'))
        <div class="alert-success">✅ {{ session('message') }}</div>
    @endif

    <table class="manager-table">
        <thead>
            <tr>
                <th></th>
                <th>Người đề nghị</th>
                <th>Phòng ban</th>
                <th>Loại phiếu</th>
                <th>Vị trí máy hư</th>
                <th>Tên máy</th>
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
                    <td>{{ $req->user->department?->department_name }}</td>
                    <td>{{ $req->requestType->type_name }}</td>
                    <td>{{ $req->machine_location }}</td>
                    <td>{{ $req->detail?->machine_name ?? '—' }}</td>
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
                        @if($req->status === 'Đã phê duyệt')
                            <span class="badge badge-approved">Đã phê duyệt</span>
                        @elseif($req->status === 'Đang xử lý')
                            <span class="badge badge-processing">Đang xử lý</span>
                        @else
                            <span class="badge badge-done">Hoàn thành</span>
                        @endif
                    </td>
                    <td>
                        @if($req->status !== 'Hoàn thành')
                            <button class="btn-approve" wire:click="openUpdate({{ $req->id }})"> Cập nhật</button>
                        @else
                            <span style="color:#9ca3af; font-size:13px;">Hoàn thành</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11" style="text-align:center; color:#9ca3af; padding:30px;">Chưa có phiếu nào được giao.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Modal cập nhật trạng thái --}}
    @if($updatingId)
        <div class="modal-overlay" style="display:flex;">
            <div class="modal-box" style="width:480px;">
                <div class="modal-header">
                    <h2>Cập nhật trạng thái</h2>
                    <button class="modal-close" type="button" wire:click="closeUpdate">✕</button>
                </div>
                <div class="modal-body">
                    <div class="modal-field">
                        <label>Trạng thái <span class="required">*</span></label>
                        <select wire:model.live="newStatus">
                            <option value="">-- Chọn trạng thái --</option>
                            <option value="Đang xử lý">Đang xử lý</option>
                            <option value="Hoàn thành">Hoàn thành</option>
                        </select>
                        @error('newStatus') <span class="field-error">{{ $message }}</span> @enderror
                    </div>

                    @if($newStatus === 'Hoàn thành')
                        <div class="modal-field">
                            <label>Kết quả xử lý <span class="required">*</span></label>
                            <textarea wire:model="result" rows="4" placeholder="Nhập kết quả xử lý..."></textarea>
                            @error('result') <span class="field-error">{{ $message }}</span> @enderror
                        </div>
                    @endif

                    <div class="modal-footer">
                        <button type="button" class="btn-cancel" wire:click="closeUpdate">Hủy</button>
                        <button type="button" class="btn-submit" wire:click="update">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>