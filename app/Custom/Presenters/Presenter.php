<?php namespace Custom\Presenters;

abstract class Presenter {
    /**
     *
     * @var Model
     */
    protected $entity;

    /**
     * Constructs the presenter with an instance of a Model.
     * @param type Model
     */
    function __construct($entity)
    {
        $this->entity = $entity;
    }

    /**
     * If a property does not exist on the Presenter call
     * or look for it on the instance of the Model.
     * @param type $property
     *
     */
    public function __get($property)
    {
        if(method_exists($this, $property))
        {
            return $this->{$property}();
        }

        return $this->entity->{property};
    }
}
