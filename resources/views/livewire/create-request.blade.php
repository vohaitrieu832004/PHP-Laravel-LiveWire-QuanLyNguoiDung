<div>
    @if (session()->has('message'))
        <div class="alert-success">✅ {{ session('message') }}</div>
    @endif

    <button class="btn-open-modal" onclick="document.getElementById('modal-create-request').style.display='flex'">
        + Tạo phiếu đề nghị
    </button>

    <div id="modal-create-request" class="modal-overlay">
        <div class="modal-box">

            <div class="modal-header">
                <h2>📋 Tạo phiếu đề nghị</h2>
                <button class="modal-close" type="button" onclick="document.getElementById('modal-create-request').style.display='none'">✕</button>
            </div>

            <div class="modal-body">
                <form wire:submit.prevent="save">

                    {{-- Thông tin người đề nghị --}}
                    <div class="modal-info-box">
                        <p class="modal-section-title">Thông tin người đề nghị</p>
                        <div class="modal-grid-2">
                            <div class="modal-field">
                                <label>Họ tên</label>
                                <input type="text" value="{{ auth()->user()->name }}" disabled>
                            </div>
                            <div class="modal-field">
                                <label>Phòng ban</label>
                                <input type="text" value="{{ auth()->user()->department?->department_name ?? 'Chưa có phòng ban' }}" disabled>
                            </div>
                        </div>
                    </div>

                    {{-- Form chung --}}
                    <p class="modal-section-title">Thông tin phiếu</p>

                    <div class="modal-field">
                        <label>Loại phiếu <span class="required">*</span></label>
                        <select wire:model.live="request_type_id">
                            <option value="">-- Chọn loại phiếu --</option>
                            @foreach($requestTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                            @endforeach
                        </select>
                        @error('request_type_id') <span class="field-error">{{ $message }}</span> @enderror
                    </div>

                    <div class="modal-grid-2">
                        <div class="modal-field">
                            <label>Vị trí máy hư <span class="required">*</span></label>
                            <input type="text" wire:model="machine_location" placeholder="Nhập vị trí...">
                            @error('machine_location') <span class="field-error">{{ $message }}</span> @enderror
                        </div>
                        <div class="modal-field">
                            <label>Bộ phận xử lý <span class="required">*</span></label>
                            <select wire:model="processing_department_id">
                                <option value="">-- Chọn bộ phận --</option>
                                @foreach($departments as $dept)
                                    <option value="{{ $dept->id }}">{{ $dept->department_name }}</option>
                                @endforeach
                            </select>
                            @error('processing_department_id') <span class="field-error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="modal-grid-2">
                        <div class="modal-field">
                            <label>Ngày lập <span class="required">*</span></label>
                            <input type="date" wire:model="request_date">
                            @error('request_date') <span class="field-error">{{ $message }}</span> @enderror
                        </div>
                        <div class="modal-field">
                            <label>Mức độ ưu tiên <span class="required">*</span></label>
                            <select wire:model="priority">
                                <option value="">-- Chọn mức độ --</option>
                                <option value="Thấp">🟢 Thấp</option>
                                <option value="Trung bình">🟡 Trung bình</option>
                                <option value="Cao">🔴 Cao</option>
                            </select>
                            @error('priority') <span class="field-error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="modal-field">
                        <label>Mô tả nội dung <span class="required">*</span></label>
                        <textarea wire:model="description" rows="3" placeholder="Nhập mô tả nội dung đề nghị..."></textarea>
                        @error('description') <span class="field-error">{{ $message }}</span> @enderror
                    </div>

                    {{-- Form chi tiết --}}
                    @if($request_type_id)
                        <hr class="modal-divider">
                        <p class="modal-section-title">Thông tin chi tiết</p>

                        <div class="modal-grid-2">
                            <div class="modal-field">
                                <label>Tên máy <span class="required">*</span></label>
                                <input type="text" wire:model="machine_name" placeholder="Nhập tên máy...">
                                @error('machine_name') <span class="field-error">{{ $message }}</span> @enderror
                            </div>
                            <div class="modal-field">
                                <label>Quy cách</label>
                                <input type="text" wire:model="specification" placeholder="Nhập quy cách...">
                            </div>
                        </div>

                        <div class="modal-grid-2">
                            <div class="modal-field">
                                <label>Đơn vị tính</label>
                                <input type="text" wire:model="unit" placeholder="Cái, bộ, chiếc...">
                            </div>
                            <div class="modal-field">
                                <label>Số lượng <span class="required">*</span></label>
                                <input type="number" wire:model="quantity" min="1" placeholder="0">
                                @error('quantity') <span class="field-error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="modal-field">
                            <label>Ghi chú</label>
                            <textarea wire:model="note" rows="2" placeholder="Ghi chú thêm (nếu có)..."></textarea>
                        </div>
                    @endif

                    <div class="modal-footer">
                        <button type="button" class="btn-cancel" onclick="document.getElementById('modal-create-request').style.display='none'">Hủy</button>
                        <button type="submit" class="btn-submit">Gửi phiếu ➤</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>