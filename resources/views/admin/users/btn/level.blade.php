<span class="
    @switch($level)
        @case ('user'):
            label-info
       @break
       @case ('vendor'):
            label-danger
       @break
       @case ('company'):
            label-primary
       @break

@endswitch
">


    {{$level}}
</span>