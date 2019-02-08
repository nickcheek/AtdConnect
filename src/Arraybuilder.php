<?php

namespace Nickcheek\Atdconnect;

class Arraybuilder
{
	public static $search;
	public static $location;

	public function __construct()
	{
		$config = include('config/config.php');
        self::$location = $config->location;

	}

	public function setSizeSearch($size)
    {
	    static::$search = array(
			'locationNumber' => static::$location,
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
        return static::$search;
    }
    
    public function setKeywordSearch($word)
    {
	    static::$search = array(
			'locationNumber' => static::$location,
			'keywords' => $word,
			'options' => array(
				'images' => array(
					'thumbnail'=>'1',
					'small'=> '1',
					'large'=> '1',
				)
			)
		);
        return static::$search;
    }
    
    public function setATDProductNumber($number)
    {
	    static::$search = array(
			'locationNumber' => static::$location,
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
        return static::$search;
    }
    
    
}