@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php
    switch ($align) {
        case 'left':
            $alignmentClasses = 'origin-top-left left-0';
            break;
        case 'top':
            $alignmentClasses = 'origin-top';
            break;
        case 'right':
        default:
            $alignmentClasses = 'origin-top-right right-0';
            break;
    }

    switch ($width) {
        case '48':
            $width = 'w-48';
            break;
    }
@endphp

<div class="relative" id="{{ $attributes->get('id') }}-wrapper">
    <div onclick="toggleDropdown('{{ $attributes->get('id') }}')">
        {{ $trigger }}
    </div>

    <div id="{{ $attributes->get('id') }}"
        class="absolute z-50 mt-2 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}"
        style="display: none;">
        <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>

<script>
    function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        const wrapper = document.getElementById(id + '-wrapper');
        if (dropdown.style.display === 'none' || dropdown.style.display === '') {
            dropdown.style.display = 'block';
            document.addEventListener('click', function(event) {
                if (!wrapper.contains(event.target)) {
                    dropdown.style.display = 'none';
                }
            }, {
                once: true
            });
        } else {
            dropdown.style.display = 'none';
        }
    }
</script>
