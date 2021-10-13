<?php

insert_diploma($id,$program)
{
    $modelo2 = new ModeloDiplomas();
    $modelo2->insert($id,$program);
}