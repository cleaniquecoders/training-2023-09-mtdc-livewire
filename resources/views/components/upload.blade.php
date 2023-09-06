@props(['uploadId' => 'input'])
<div>
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/>

    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
    </script>
    <div x-cloak wire:ignore x-data x-init="
        const pond = FilePond.create($refs.{{ $uploadId }}, {
            allowMultiple: {{ $attributes->has('multiple') ? 'true' : 'false' }},
            @if ($attributes->has('wire:model')) server: {
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
                },
                revert: (filename, load) => {
                    @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                },
            }, @endif
        });
        this.addEventListener('pondReset', e => {
            pond.removeFiles();
        });
    ">
        <input type="file" x-ref="{{ $uploadId }}" {!! isset($attributes['accept']) ? 'accept="' . $attributes['accept'] . '"' : '' !!}>
    </div>
</div>
