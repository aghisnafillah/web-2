<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Create Pegawai</h1>
    <form wire:submit.prevent="save" class="space-y-4">
        <flux:input
            type="text"
            id="nip"
            wire:model.defer="nip"
            label="NIP Pegawai"
            placeholder="Masukkan NIP Pegawai"
            required
        />

        <flux:input
            type="text"
            id="nama"
            wire:model.defer="nama"
            label="Nama Pegawai"
            placeholder="Masukkan Nama Pegawai"
            required
        />

         <flux:select
            id="unitkerja_id"
            wire:model.defer="unit_kerja_id"
            label="Unit Kerja"
            placeholder="Pilih Unit Kerja"
            required>
            <flux:select.option value="" label="-- Pilih Unit Kerja --" />
            @foreach ($unitKerjas as $unit)
                <option value="{{ $unit->id }}">{{ $unit->nama }}</option>
            @endforeach
        </flux:select>

        <flux:button
            type="submit"
            variant="primary"
        >
            Save
        </flux:button>
    </form>
</div>
