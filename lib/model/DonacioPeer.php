<?php

class DonacioPeer extends BaseDonacioPeer
{
  public function retrieveByNbPedido($value) {
    $c = new Criteria();
    $c->add(self::NB_PEDIDO, $value);
    return self::doSelectOne($c);
  }
}
