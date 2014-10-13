<?php

class Topic extends Eloquent {

	/**
	 * Table used by the model
	 * @var string
	 */
	public $table = 'topics';

	/**
	 * hasMany relationship with the Quote model
	 * 
	 * @return Quote
	 */
	public function quotes()
	{
		return $this->hasMany('Quote');
	}

}