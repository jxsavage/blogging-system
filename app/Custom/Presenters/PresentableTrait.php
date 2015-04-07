<?php namespace Custom\Presenters;

use Custom\Presenters\Exceptions\PresenterException;

trait PresentableTrait{
    
    protected static $presenterInstance;
    
    
    /**
     * Returns an instance of the presenter.
     * @return \Custom\Presenters\presenter
     */
    public function present()
    {
        
        if(! $this->presenter or ! class_exists($this->presenter))
        {
            throw new PresenterException('Please set the $presenter property to your presenter path. '.$this->presenter.' is not a valid presenter path.');
        }
        
        if( ! isset(static::$presenterInstance))
        {
            static::$presenterInstance = new $this->presenter($this);
        }
        
        return static::$presenterInstance;
    }
    
}

