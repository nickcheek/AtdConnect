<?php

namespace Nickcheek\Atdconnect;

class Arraybuilder
{
	public  $search;
	public  $location;

	public function __construct()
	{
		$config = include('config/config.php');
        $this->$location = $config->location;

	}

	public function setSizeSearch($size)
    {
	    $this->$search = array(
			'locationNumber' => $this->$location,
			'criteria' => array(
				'entry' => array(
					'key'=> 'Size',
					'value'=>$size
				)
			),
			'options' => array(
				'price' => array(
					'cost'=>'1',
					'retail'=>'1'
				),
				'availability' => array(
					'local'=>'1'
				),
				'productSpec'=> array(
					'entry'=> array(
						'key'=>'SpeedRating'
					),
					'entry'=> array(
						'key'=>'TemperatureRating'
					)
				),
				'includeRebates'=>'1'
			)
		);
        return $this->$search;
    }
    
    public function setKeywordSearch($word)
    {
	    $this->$search = array(
			'locationNumber' => $this->$location,
			'keywords' => $word,
			'options' => array(
				'images' => array(
					'thumbnail'=>'1',
					'small'=> '1',
					'large'=> '1',
				)
			)
		);
        return $this->$search;
    }
    
    public function setATDProductNumber($number)
    {
	    $this->$search = array(
			'locationNumber' => $this->$location,
			'criteria' => array(
				'entry'=>array(
					'key'=>'ATDProductNumber',
					'value'=>$number
				)
			),
			'options' => array(
				'images' => array(
					'thumbnail'=> '1',
					'small' => '1',
					'large' => '1'
				)
			),
			'productSpec'=> array(
					'entry'=> array(
						'key'=>'SpeedRating'
					),
					'entry'=> array(
						'key'=>'TemperatureRating'
					)
				)
					
		);
        return $this->$search;
    }
    
    
}