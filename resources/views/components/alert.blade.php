<div>
    <div class="ui purple message">
        <i class="close icon"></i>
        <div class="header">
            @if (is_object($mensaje))
                @foreach ($mensaje->all() as $error)
                    {{$error}}
                @endforeach
            @else
            {{$mensaje}}
            @endif
        </div>
    </div>
</div>
