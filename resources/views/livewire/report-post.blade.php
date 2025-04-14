<div>
    @if ($alreadyReported)
        <button class="btn btn-secondary" disabled>Sudah Dilaporkan</button>
    @else
        <button wire:click="report" class="btn btn-danger">Laporkan</button>
    @endif

    @if (session()->has('message'))
        <div class="alert alert-success mt-2" role="alert">
            {{ session('message') }}
        </div>
    @endif
</div>
