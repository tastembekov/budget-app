<?php

namespace app\models;

class ContainerView
{
    private $_container = null;

    /**
     * @param Container $model
     */
    public function __construct(Container $model)
    {
        $this->_container = $model;
    }

    /**
     * Returns total on main currency
     * @return float
     */
    public function getTotalOnMainCurrency() {
        $model = $this->getContainer();
        return $model->currency->rate * $model->total;
    }

    /**
     * Returns container model
     * @return Container
     * @throws \Exception
     */
    private function getContainer()
    {
        if ($this->_container == null) {
            throw new \Exception('Container not set');
        }
        return $this->_container;
    }
}