<a {{ $attributes }} aria-current="page" class="{{ request()->fullUrlIs(url($href)) ? '' : '' }} relative">
    <span class="{{ request()->fullUrlIs(url($href)) ? 'pl-4 ' : '' }} flex items-center flex-row-reverse justify-between relative">
        {{ $slot }}
    </span>
</a>