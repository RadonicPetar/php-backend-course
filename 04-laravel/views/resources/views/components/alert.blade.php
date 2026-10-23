@php
$background='#ffeeee';
$border = 'red';

switch($type){

    case 'success':
        $background='#ddffdd';
        $border='green';
    break;
    case 'warning':
        $background='#ffffcc';
        $border='#c9a800';
    break;
    case 'danger':
        $background='#ffeeee';
        $border='red';
    break;

}

@endphp

<div
style="padding: 15px;
margin-bottom:10px;
background-color:{{$background}};
border: 2px solid {{$border}};
border-radius:5px;"
>

{{ $slot }}   
</div>