<?php

$to="egl.seminar@gmail.com";

$subject = "PHP Mail test";

$message = "Test poruka iz PHP aplikacije";

$headers = "From: egl.seminar@gmail.com";

if(mail($to,$subject,$message,$headers)){
    echo "Mail uspješno poslan";
}
else
    {
        echo "Greška kod slanja maila";
    }