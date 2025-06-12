<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Create Peminjaman</h1>
    <form wire:submit.prevent="save" class="space-y-4">
        <flux:select
            id="pegawai_id"
            wire:model.defer="pegawai_id"
            label="Pegawai"
            placeholder="Pilih Pegawai"
            required>
            <flux:select.option value="" label="-- Pilih Pegawai --" />
            @foreach ($pegawais as $pegawai)
                <flux:select.option value="{{ $pegawai->id }}" label="{{ $pegawai->nama }}" />
            @endforeach
        </flux:select>

        <flux:select
            id="ruang_id"
            wire:model.defer="ruang_id"
            label="Ruangan"
            placeholder="Pilih Ruangan"
            required>
            <flux:select.option value="" label="-- Pilih Ruangan --" />
            @foreach ($ruangs as $ruangan)
                <flux:select.option value="{{ $ruangan->id }}" label="{{ $ruangan->kode }} - {{ $ruangan->nama }}" />
            @endforeach
        </flux:select>

        <flux:input
            type="date"
            id="tanggal"
            wire:model.defer="tanggal"
            label="Tanggal"
            required
        />

        <flux:input
            type="time"
            id="jam_mulai"
            wire:model.defer="jam_mulai"
            label="Jam Mulai"
            required
        />

        <flux:input
            type="time"
            id="jam_akhir"
            wire:model.defer="jam_akhir"
            label="Jam Akhir"
            required
        />

        <flux:textarea
            id="keterangan"
            wire:model.defer="keterangan"
            label="Keterangan"
            placeholder="Masukkan Keterangan"
            rows="3"
            required
        ></flux:textarea>

        <flux:button type="submit" variant="primary">Save</flux:button>
    </form>
</div>