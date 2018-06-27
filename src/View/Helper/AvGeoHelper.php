<?php

namespace AvGeo\View\Helper;

use Cake\View\Helper;
use Cake\Utility\Hash;

/**
 * This is a CakePHP helper that helps users to create form inputs (usually select inputs)
 * with state names or abbreviations.
 * Works with Canadian provinces and Country names.
 *
 *
 * @author Kevin Wentworth
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class AvGeoHelper extends Helper {
	public $helpers = [ 
			'Html',
			'Form' 
	];
	
	/**
	 * Default config for the helper.
	 *
	 * @var array
	 */
	protected $_defaultConfig = [ ];
	
	/**
	 * List of states, data from https://gist.github.com/maxrice/2776900
	 *
	 * @var unknown $_stateList
	 */
	protected $_stateList = [ 
			'AL' => [ 
					'name' => 'Alabama',
					'lat' => 32.6010112,
					'lng' => - 86.6807365 
			],
			'AK' => [ 
					'name' => 'Alaska',
					'lat' => 61.3025006,
					'lng' => - 158.7750198 
			],
			'AZ' => [ 
					'name' => 'Arizona',
					'lat' => 34.1682185,
					'lng' => - 111.930907 
			],
			'AR' => [ 
					'name' => 'Arkansas',
					'lat' => 34.7519275,
					'lng' => - 92.1313784 
			],
			'CA' => [ 
					'name' => 'California',
					'lat' => 37.2718745,
					'lng' => - 119.2704153 
			],
			'CO' => [ 
					'name' => 'Colorado',
					'lat' => 38.9979339,
					'lng' => - 105.550567 
			],
			'CT' => [ 
					'name' => 'Connecticut',
					'lat' => 41.5187835,
					'lng' => - 72.757507 
			],
			'DE' => [ 
					'name' => 'Delaware',
					'lat' => 39.145251,
					'lng' => - 75.4189206 
			],
			'DC' => [ 
					'name' => 'District of Columbia',
					'lat' => 38.8993487,
					'lng' => - 77.0145666 
			],
			'FL' => [ 
					'name' => 'Florida',
					'lat' => 27.9757279,
					'lng' => - 83.8330166 
			],
			'GA' => [ 
					'name' => 'Georgia',
					'lat' => 32.6781248,
					'lng' => - 83.2229757 
			],
			'HI' => [ 
					'name' => 'Hawaii',
					'lat' => 20.46,
					'lng' => - 157.505 
			],
			'ID' => [ 
					'name' => 'Idaho',
					'lat' => 45.4945756,
					'lng' => - 114.1424303 
			],
			'IL' => [ 
					'name' => 'Illinois',
					'lat' => 39.739318,
					'lng' => - 89.504139 
			],
			'IN' => [ 
					'name' => 'Indiana',
					'lat' => 39.7662195,
					'lng' => - 86.441277 
			],
			'IA' => [ 
					'name' => 'Iowa',
					'lat' => 41.9383166,
					'lng' => - 93.389798 
			],
			'KS' => [ 
					'name' => 'Kansas',
					'lat' => 38.4987789,
					'lng' => - 98.3200779 
			],
			'KY' => [ 
					'name' => 'Kentucky',
					'lat' => 37.8222935,
					'lng' => - 85.7682399 
			],
			'LA' => [ 
					'name' => 'Louisiana',
					'lat' => 30.9733766,
					'lng' => - 91.4299097 
			],
			'ME' => [ 
					'name' => 'Maine',
					'lat' => 45.2185133,
					'lng' => - 69.0148656 
			],
			'MD' => [ 
					'name' => 'Maryland',
					'lat' => 38.8063524,
					'lng' => - 77.2684162 
			],
			'MA' => [ 
					'name' => 'Massachusetts',
					'lat' => 42.0629398,
					'lng' => - 71.718067 
			],
			'MI' => [ 
					'name' => 'Michigan',
					'lat' => 44.9435598,
					'lng' => - 86.4158049 
			],
			'MN' => [ 
					'name' => 'Minnesota',
					'lat' => 46.4418595,
					'lng' => - 93.3655146 
			],
			'MS' => [ 
					'name' => 'Mississippi',
					'lat' => 32.5851062,
					'lng' => - 89.8772196 
			],
			'MO' => [ 
					'name' => 'Missouri',
					'lat' => 38.3046615,
					'lng' => - 92.437099 
			],
			'MT' => [ 
					'name' => 'Montana',
					'lat' => 46.6797995,
					'lng' => - 110.044783 
			],
			'NE' => [ 
					'name' => 'Nebraska',
					'lat' => 41.5008195,
					'lng' => - 99.680902 
			],
			'NV' => [ 
					'name' => 'Nevada',
					'lat' => 38.502032,
					'lng' => - 117.0230604 
			],
			'NH' => [ 
					'name' => 'New Hampshire',
					'lat' => 44.0012306,
					'lng' => - 71.5799231 
			],
			'NJ' => [ 
					'name' => 'New Jersey',
					'lat' => 40.1430058,
					'lng' => - 74.7311156 
			],
			'NM' => [ 
					'name' => 'New Mexico',
					'lat' => 34.1662325,
					'lng' => - 106.0260685 
			],
			'NY' => [ 
					'name' => 'New York',
					'lat' => 40.7056258,
					'lng' => - 73.97968 
			],
			'NC' => [ 
					'name' => 'North Carolina',
					'lat' => 35.2145629,
					'lng' => - 79.8912675 
			],
			'ND' => [ 
					'name' => 'North Dakota',
					'lat' => 47.4678819,
					'lng' => - 100.3022655 
			],
			'OH' => [ 
					'name' => 'Ohio',
					'lat' => 40.1903624,
					'lng' => - 82.6692525 
			],
			'OK' => [ 
					'name' => 'Oklahoma',
					'lat' => 35.3097654,
					'lng' => - 98.7165585 
			],
			'OR' => [ 
					'name' => 'Oregon',
					'lat' => 44.1419049,
					'lng' => - 120.5380993 
			],
			'PA' => [ 
					'name' => 'Pennsylvania',
					'lat' => 40.9945928,
					'lng' => - 77.6046984 
			],
			'RI' => [ 
					'name' => 'Rhode Island',
					'lat' => 41.5827282,
					'lng' => - 71.5064508 
			],
			'SC' => [ 
					'name' => 'South Carolina',
					'lat' => 33.62505,
					'lng' => - 80.9470381 
			],
			'SD' => [ 
					'name' => 'South Dakota',
					'lat' => 44.2126995,
					'lng' => - 100.2471641 
			],
			'TN' => [ 
					'name' => 'Tennessee',
					'lat' => 35.830521,
					'lng' => - 85.9785989 
			],
			'TX' => [ 
					'name' => 'Texas',
					'lat' => 31.1693363,
					'lng' => - 100.0768425 
			],
			'UT' => [ 
					'name' => 'Utah',
					'lat' => 39.4997605,
					'lng' => - 111.547028 
			],
			'VT' => [ 
					'name' => 'Vermont',
					'lat' => 43.8717545,
					'lng' => - 72.4477828 
			],
			'VA' => [ 
					'name' => 'Virginia',
					'lat' => 38.0033855,
					'lng' => - 79.4587861 
			],
			'WA' => [ 
					'name' => 'Washington',
					'lat' => 38.8993487,
					'lng' => - 77.0145665 
			],
			'WV' => [ 
					'name' => 'West Virginia',
					'lat' => 38.9201705,
					'lng' => - 80.1816905 
			],
			'WI' => [ 
					'name' => 'Wisconsin',
					'lat' => 44.7862968,
					'lng' => - 89.8267049 
			],
			'WY' => [ 
					'name' => 'Wyoming',
					'lat' => 43.000325,
					'lng' => - 107.5545669 
			] 
	];
	
	/**
	 * List of Canadian Provinces
	 *
	 * @var unknown $_provinceList
	 */
	protected $_provinceList = [ 
			'AB' => [ 
					'name' => 'Alberta' 
			],
			'BC' => [ 
					'name' => 'British Columbia' 
			],
			'MB' => [ 
					'name' => 'Manitoba' 
			],
			'NB' => [ 
					'name' => 'New Brunswick' 
			],
			'NL' => [ 
					'name' => 'Newfoundland and Labrador' 
			],
			'NS' => [ 
					'name' => 'Nova Scotia' 
			],
			'ON' => [ 
					'name' => 'Ontario' 
			],
			'PE' => [ 
					'name' => 'Prince Edward Island' 
			],
			'SK' => [ 
					'name' => 'Saskatchewan' 
			],
			'QC' => [ 
					'name' => 'Quebec' 
			] 
	];
	
	/**
	 * Initialization hook method.
	 *
	 * Use this method to add common initialization code like loading helpers.
	 *
	 * e.g. `$this->loadHelper('Html');`
	 *
	 * @return void
	 */
	public function initialize(array $config) {
		parent::initialize ( $config );
	}
	
	/**
	 * Returns a list of state suitable for select/dropdowns
	 * Use in views, like so:
	 * echo $this->Form->input('state', ['type' => 'select', 'options' => $this->AvGeo->listStates(), 'empty' => true]);
	 * @param array $options
	 *     possible replacements: {{abbr}} {{name}} {{lat}} {{lng}}
	 *     keyFormat - specify format for key 
	 *     valueFormat - what user will see (in select list)
	 * @return mixed[]
	 */
	public function listStates(array $options = []) {
	    $default_options = [
	        'keyFormat' => '{{abbr}}',
	        'valueFormat' => '{{name}} ({{abbr}})',
	    ];
	    $options = Hash::merge($default_options, $options);
	    
	    $list = [];
	    foreach($this->_stateList as $abbr => $state) {
	        $key = str_ireplace('{{abbr}}', $abbr, $options['keyFormat']);
	        $value = str_ireplace('{{abbr}}', $abbr, $options['valueFormat']);
	        
	        $key = str_ireplace('{{name}}', $state['name'], $key);
	        $value = str_ireplace('{{name}}', $state['name'], $value);
	        
	        $key = str_ireplace('{{lat}}', $state['lat'], $key);
	        $value = str_ireplace('{{lat}}', $state['lat'], $value);
	        
	        $key = str_ireplace('{{lng}}', $state['lng'], $key);
	        $value = str_ireplace('{{lng}}', $state['lng'], $value);
	        
	        $list[$key] = $value;
	    }
	    
	    return $list;
	}
}