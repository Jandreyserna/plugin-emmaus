<?php

function Information_iglesias()
{
  $modelo_iglesias = new Modelo_promotor();
  $datas = $modelo_iglesias->traer_iglesias();
  // $data=$datas->fetchAll(PDO::FETCH_ASSOC);
  // print json_encode($datas, JSON_UNESCAPED_UNICODE);
  // echo json_encode($datas);
  return $datas;
}

?>