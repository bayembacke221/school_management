@props([
    'type' => 'text',
    'label' => '',
    'name' => '',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'error' => null,
    'icon' => null,
    'helpText' => null
])

<div class="w-full mb-4">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1.5">
            {{ $label }}
            @if($required)
                <span class="text-red-500 ml-0.5">*</span>
            @endif
        </label>
    @endif

    <div class="relative rounded-lg shadow-sm">
        @if($icon)
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    {!! $icon !!}
                </svg>
            </div>
        @endif

        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            {{ $required ? 'required' : '' }}
            {{ $attributes->merge([
                'class' => 'block w-full rounded-lg border ' .
                ($error ? 'border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500') .
                ($icon ? ' pl-10' : ' pl-4') .
                ' py-2.5 sm:text-sm transition-colors duration-200 ease-in-out'
            ]) }}
        >

        @if($type === 'password')
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                <button type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none" onclick="togglePasswordVisibility('{{ $name }}')">
                    <svg class="h-5 w-5 password-eye-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>
        @endif
    </div>

    @if($helpText && !$error)
        <p class="mt-1.5 text-sm text-gray-500">{{ $helpText }}</p>
    @endif

    @if($error)
        <div class="mt-1.5 flex items-start text-sm text-red-600">
            <svg class="h-4 w-4 mr-1 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ $error }}</span>
        </div>
    @endif
</div>

@once
    @push('scripts')
        <script>
            function togglePasswordVisibility(inputId) {
                const input = document.getElementById(inputId);
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);

                // Change the icon based on visibility
                const eyeIcon = event.currentTarget.querySelector('.password-eye-icon');
                if (type === 'text') {
                    eyeIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    `;
                } else {
                    eyeIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    `;
                }
            }
        </script>
    @endpush
@endonce
