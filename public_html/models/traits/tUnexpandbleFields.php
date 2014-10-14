<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Does not allow to add new fields to objects
 */
trait tUnexpandbleFields {

    /**
     * @return void
     */
    function __set($name, $value) {
        if (!isset($this->$name)) {
            throw new Exception('Could not find field: ' . $name);
        }

        $this->$name = $value;
    }

    /**
     * Sets field if value provided. Return value otherwise
     *
     * @return this|value
     */
    protected function setget($name, $value = null) {
        if ($value !== null) {
            $this->$name = $value;
            return $this;
        }

        return $this->$name;
    }
}
