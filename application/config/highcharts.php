<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// shared_options : highcharts global settings, like interface or language
$config['shared_options'] = array(
	'chart' => array(
		'backgroundColor' => array(
			'linearGradient' => array(0, 0, 500, 500),
			'stops' => array(
				array(0, 'rgb(255, 255, 255)'),
				array(1, 'rgb(240, 240, 255)')
			)
		),
		'colors' => array(
     	 '#2f7ed8', '#0d233a', '#8bbc21', '#910000', '#1aadce', 
   '#492970', '#f28f43', '#77a1e5', '#c42525', '#a6c96a'
     ),
		'shadow' => true
	)
);

// Template Example
$config['chart_template'] = array(
	'chart' => array(
		'renderTo' => 'graph',
		'defaultSeriesType' => 'column',
		'backgroundColor' => array(
			'linearGradient' => array(0, 500, 0, 0),
			'stops' => array(
				array(0, 'rgb(255, 255, 255)'),
				array(1, 'rgb(190, 200, 255)')
			)
		),
     ),
     'colors' => array(
     	 '#ED561B', '#50B432'
     ),
     'credits' => array(
     	'enabled'=> true,
     	'text'	=> 'highcharts library on GitHub',
		'href' => 'https://github.com/ronan-gloo/codeigniter-highcharts-library'
     ),
     'title' => array(
		'text' => 'Template from config file'
     ),
     'legend' => array(
     	'enabled' => false
     ),
    'yAxis' => array(
		'title' => array(
			'text' => 'population'
		)
	),
	'xAxis' => array(
		'title' => array(
			'text' => 'Countries'
		)
	),
	'tooltip' => array(
		'shared' => true
	)
);




// Template Example
$config['template'] = array(
	'chart' => array(
		'renderTo' => 'graph',
		'defaultSeriesType' => 'bar',
		'backgroundColor' => array(
			'linearGradient' => array(0, 500, 0, 0),
			'stops' => array(
				array(0, 'rgb(255, 255, 255)'),
				array(1, 'rgb(190, 200, 255)')
			)
		),
     ),
     'colors' => array(
     	 '#ED561B', '#50B432'
     ),
     'legend' => array(
     	'enabled' => false
     ),
    'yAxis' => array(
		'title' => array(
			'text' => 'Descargas'
		)
	),
	'xAxis' => array(
		'title' => array(
			'text' => 'Objetos Aprendizaje'
		)
	),
	'tooltip' => array(
		'shared' => true
	)
);