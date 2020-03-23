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
	*	Found here: https://gist.github.com/DHS/1340150
	*/
	protected $_countryList = [
        "AF" => ["country" => "Afghanistan", "continent" => "Asia"],
        "AX" => ["country" => "Åland Islands", "continent" => "Europe"],
        "AL" => ["country" => "Albania", "continent" => "Europe"],
        "DZ" => ["country" => "Algeria", "continent" => "Africa"],
        "AS" => ["country" => "American Samoa", "continent" => "Oceania"],
        "AD" => ["country" => "Andorra", "continent" => "Europe"],
        "AO" => ["country" => "Angola", "continent" => "Africa"],
        "AI" => ["country" => "Anguilla", "continent" => "North America"],
        "AQ" => ["country" => "Antarctica", "continent" => "Antarctica"],
        "AG" => ["country" => "Antigua and Barbuda", "continent" => "North America"],
        "AR" => ["country" => "Argentina", "continent" => "South America"],
        "AM" => ["country" => "Armenia", "continent" => "Asia"],
        "AW" => ["country" => "Aruba", "continent" => "North America"],
        "AU" => ["country" => "Australia", "continent" => "Oceania"],
        "AT" => ["country" => "Austria", "continent" => "Europe"],
        "AZ" => ["country" => "Azerbaijan", "continent" => "Asia"],
        "BS" => ["country" => "Bahamas", "continent" => "North America"],
        "BH" => ["country" => "Bahrain", "continent" => "Asia"],
        "BD" => ["country" => "Bangladesh", "continent" => "Asia"],
        "BB" => ["country" => "Barbados", "continent" => "North America"],
        "BY" => ["country" => "Belarus", "continent" => "Europe"],
        "BE" => ["country" => "Belgium", "continent" => "Europe"],
        "BZ" => ["country" => "Belize", "continent" => "North America"],
        "BJ" => ["country" => "Benin", "continent" => "Africa"],
        "BM" => ["country" => "Bermuda", "continent" => "North America"],
        "BT" => ["country" => "Bhutan", "continent" => "Asia"],
        "BO" => ["country" => "Bolivia", "continent" => "South America"],
        "BA" => ["country" => "Bosnia and Herzegovina", "continent" => "Europe"],
        "BW" => ["country" => "Botswana", "continent" => "Africa"],
        "BV" => ["country" => "Bouvet Island", "continent" => "Antarctica"],
        "BR" => ["country" => "Brazil", "continent" => "South America"],
        "IO" => ["country" => "British Indian Ocean Territory", "continent" => "Asia"],
        "BN" => ["country" => "Brunei Darussalam", "continent" => "Asia"],
        "BG" => ["country" => "Bulgaria", "continent" => "Europe"],
        "BF" => ["country" => "Burkina Faso", "continent" => "Africa"],
        "BI" => ["country" => "Burundi", "continent" => "Africa"],
        "KH" => ["country" => "Cambodia", "continent" => "Asia"],
        "CM" => ["country" => "Cameroon", "continent" => "Africa"],
        "CA" => ["country" => "Canada", "continent" => "North America"],
        "CV" => ["country" => "Cape Verde", "continent" => "Africa"],
        "KY" => ["country" => "Cayman Islands", "continent" => "North America"],
        "CF" => ["country" => "Central African Republic", "continent" => "Africa"],
        "TD" => ["country" => "Chad", "continent" => "Africa"],
        "CL" => ["country" => "Chile", "continent" => "South America"],
        "CN" => ["country" => "China", "continent" => "Asia"],
        "CX" => ["country" => "Christmas Island", "continent" => "Asia"],
        "CC" => ["country" => "Cocos (Keeling] Islands", "continent" => "Asia"],
        "CO" => ["country" => "Colombia", "continent" => "South America"],
        "KM" => ["country" => "Comoros", "continent" => "Africa"],
        "CG" => ["country" => "Congo", "continent" => "Africa"],
        "CD" => ["country" => "The Democratic Republic of The Congo", "continent" => "Africa"],
        "CK" => ["country" => "Cook Islands", "continent" => "Oceania"],
        "CR" => ["country" => "Costa Rica", "continent" => "North America"],
        "CI" => ["country" => "Cote D'ivoire", "continent" => "Africa"],
        "HR" => ["country" => "Croatia", "continent" => "Europe"],
        "CU" => ["country" => "Cuba", "continent" => "North America"],
        "CY" => ["country" => "Cyprus", "continent" => "Asia"],
        "CZ" => ["country" => "Czech Republic", "continent" => "Europe"],
        "DK" => ["country" => "Denmark", "continent" => "Europe"],
        "DJ" => ["country" => "Djibouti", "continent" => "Africa"],
        "DM" => ["country" => "Dominica", "continent" => "North America"],
        "DO" => ["country" => "Dominican Republic", "continent" => "North America"],
        "EC" => ["country" => "Ecuador", "continent" => "South America"],
        "EG" => ["country" => "Egypt", "continent" => "Africa"],
        "SV" => ["country" => "El Salvador", "continent" => "North America"],
        "GQ" => ["country" => "Equatorial Guinea", "continent" => "Africa"],
        "ER" => ["country" => "Eritrea", "continent" => "Africa"],
        "EE" => ["country" => "Estonia", "continent" => "Europe"],
        "ET" => ["country" => "Ethiopia", "continent" => "Africa"],
        "FK" => ["country" => "Falkland Islands (Malvinas]", "continent" => "South America"],
        "FO" => ["country" => "Faroe Islands", "continent" => "Europe"],
        "FJ" => ["country" => "Fiji", "continent" => "Oceania"],
        "FI" => ["country" => "Finland", "continent" => "Europe"],
        "FR" => ["country" => "France", "continent" => "Europe"],
        "GF" => ["country" => "French Guiana", "continent" => "South America"],
        "PF" => ["country" => "French Polynesia", "continent" => "Oceania"],
        "TF" => ["country" => "French Southern Territories", "continent" => "Antarctica"],
        "GA" => ["country" => "Gabon", "continent" => "Africa"],
        "GM" => ["country" => "Gambia", "continent" => "Africa"],
        "GE" => ["country" => "Georgia", "continent" => "Asia"],
        "DE" => ["country" => "Germany", "continent" => "Europe"],
        "GH" => ["country" => "Ghana", "continent" => "Africa"],
        "GI" => ["country" => "Gibraltar", "continent" => "Europe"],
        "GR" => ["country" => "Greece", "continent" => "Europe"],
        "GL" => ["country" => "Greenland", "continent" => "North America"],
        "GD" => ["country" => "Grenada", "continent" => "North America"],
        "GP" => ["country" => "Guadeloupe", "continent" => "North America"],
        "GU" => ["country" => "Guam", "continent" => "Oceania"],
        "GT" => ["country" => "Guatemala", "continent" => "North America"],
        "GG" => ["country" => "Guernsey", "continent" => "Europe"],
        "GN" => ["country" => "Guinea", "continent" => "Africa"],
        "GW" => ["country" => "Guinea-bissau", "continent" => "Africa"],
        "GY" => ["country" => "Guyana", "continent" => "South America"],
        "HT" => ["country" => "Haiti", "continent" => "North America"],
        "HM" => ["country" => "Heard Island and Mcdonald Islands", "continent" => "Antarctica"],
        "VA" => ["country" => "Holy See (Vatican City State]", "continent" => "Europe"],
        "HN" => ["country" => "Honduras", "continent" => "North America"],
        "HK" => ["country" => "Hong Kong", "continent" => "Asia"],
        "HU" => ["country" => "Hungary", "continent" => "Europe"],
        "IS" => ["country" => "Iceland", "continent" => "Europe"],
        "IN" => ["country" => "India", "continent" => "Asia"],
        "ID" => ["country" => "Indonesia", "continent" => "Asia"],
        "IR" => ["country" => "Iran", "continent" => "Asia"],
        "IQ" => ["country" => "Iraq", "continent" => "Asia"],
        "IE" => ["country" => "Ireland", "continent" => "Europe"],
        "IM" => ["country" => "Isle of Man", "continent" => "Europe"],
        "IL" => ["country" => "Israel", "continent" => "Asia"],
        "IT" => ["country" => "Italy", "continent" => "Europe"],
        "JM" => ["country" => "Jamaica", "continent" => "North America"],
        "JP" => ["country" => "Japan", "continent" => "Asia"],
        "JE" => ["country" => "Jersey", "continent" => "Europe"],
        "JO" => ["country" => "Jordan", "continent" => "Asia"],
        "KZ" => ["country" => "Kazakhstan", "continent" => "Asia"],
        "KE" => ["country" => "Kenya", "continent" => "Africa"],
        "KI" => ["country" => "Kiribati", "continent" => "Oceania"],
        "KP" => ["country" => "Democratic People's Republic of Korea", "continent" => "Asia"],
        "KR" => ["country" => "Republic of Korea", "continent" => "Asia"],
        "KW" => ["country" => "Kuwait", "continent" => "Asia"],
        "KG" => ["country" => "Kyrgyzstan", "continent" => "Asia"],
        "LA" => ["country" => "Lao People's Democratic Republic", "continent" => "Asia"],
        "LV" => ["country" => "Latvia", "continent" => "Europe"],
        "LB" => ["country" => "Lebanon", "continent" => "Asia"],
        "LS" => ["country" => "Lesotho", "continent" => "Africa"],
        "LR" => ["country" => "Liberia", "continent" => "Africa"],
        "LY" => ["country" => "Libya", "continent" => "Africa"],
        "LI" => ["country" => "Liechtenstein", "continent" => "Europe"],
        "LT" => ["country" => "Lithuania", "continent" => "Europe"],
        "LU" => ["country" => "Luxembourg", "continent" => "Europe"],
        "MO" => ["country" => "Macao", "continent" => "Asia"],
        "MK" => ["country" => "Macedonia", "continent" => "Europe"],
        "MG" => ["country" => "Madagascar", "continent" => "Africa"],
        "MW" => ["country" => "Malawi", "continent" => "Africa"],
        "MY" => ["country" => "Malaysia", "continent" => "Asia"],
        "MV" => ["country" => "Maldives", "continent" => "Asia"],
        "ML" => ["country" => "Mali", "continent" => "Africa"],
        "MT" => ["country" => "Malta", "continent" => "Europe"],
        "MH" => ["country" => "Marshall Islands", "continent" => "Oceania"],
        "MQ" => ["country" => "Martinique", "continent" => "North America"],
        "MR" => ["country" => "Mauritania", "continent" => "Africa"],
        "MU" => ["country" => "Mauritius", "continent" => "Africa"],
        "YT" => ["country" => "Mayotte", "continent" => "Africa"],
        "MX" => ["country" => "Mexico", "continent" => "North America"],
        "FM" => ["country" => "Micronesia", "continent" => "Oceania"],
        "MD" => ["country" => "Moldova", "continent" => "Europe"],
        "MC" => ["country" => "Monaco", "continent" => "Europe"],
        "MN" => ["country" => "Mongolia", "continent" => "Asia"],
        "ME" => ["country" => "Montenegro", "continent" => "Europe"],
        "MS" => ["country" => "Montserrat", "continent" => "North America"],
        "MA" => ["country" => "Morocco", "continent" => "Africa"],
        "MZ" => ["country" => "Mozambique", "continent" => "Africa"],
        "MM" => ["country" => "Myanmar", "continent" => "Asia"],
        "NA" => ["country" => "Namibia", "continent" => "Africa"],
        "NR" => ["country" => "Nauru", "continent" => "Oceania"],
        "NP" => ["country" => "Nepal", "continent" => "Asia"],
        "NL" => ["country" => "Netherlands", "continent" => "Europe"],
        "AN" => ["country" => "Netherlands Antilles", "continent" => "North America"],
        "NC" => ["country" => "New Caledonia", "continent" => "Oceania"],
        "NZ" => ["country" => "New Zealand", "continent" => "Oceania"],
        "NI" => ["country" => "Nicaragua", "continent" => "North America"],
        "NE" => ["country" => "Niger", "continent" => "Africa"],
        "NG" => ["country" => "Nigeria", "continent" => "Africa"],
        "NU" => ["country" => "Niue", "continent" => "Oceania"],
        "NF" => ["country" => "Norfolk Island", "continent" => "Oceania"],
        "MP" => ["country" => "Northern Mariana Islands", "continent" => "Oceania"],
        "NO" => ["country" => "Norway", "continent" => "Europe"],
        "OM" => ["country" => "Oman", "continent" => "Asia"],
        "PK" => ["country" => "Pakistan", "continent" => "Asia"],
        "PW" => ["country" => "Palau", "continent" => "Oceania"],
        "PS" => ["country" => "Palestinia", "continent" => "Asia"],
        "PA" => ["country" => "Panama", "continent" => "North America"],
        "PG" => ["country" => "Papua New Guinea", "continent" => "Oceania"],
        "PY" => ["country" => "Paraguay", "continent" => "South America"],
        "PE" => ["country" => "Peru", "continent" => "South America"],
        "PH" => ["country" => "Philippines", "continent" => "Asia"],
        "PN" => ["country" => "Pitcairn", "continent" => "Oceania"],
        "PL" => ["country" => "Poland", "continent" => "Europe"],
        "PT" => ["country" => "Portugal", "continent" => "Europe"],
        "PR" => ["country" => "Puerto Rico", "continent" => "North America"],
        "QA" => ["country" => "Qatar", "continent" => "Asia"],
        "RE" => ["country" => "Reunion", "continent" => "Africa"],
        "RO" => ["country" => "Romania", "continent" => "Europe"],
        "RU" => ["country" => "Russian Federation", "continent" => "Europe"],
        "RW" => ["country" => "Rwanda", "continent" => "Africa"],
        "SH" => ["country" => "Saint Helena", "continent" => "Africa"],
        "KN" => ["country" => "Saint Kitts and Nevis", "continent" => "North America"],
        "LC" => ["country" => "Saint Lucia", "continent" => "North America"],
        "PM" => ["country" => "Saint Pierre and Miquelon", "continent" => "North America"],
        "VC" => ["country" => "Saint Vincent and The Grenadines", "continent" => "North America"],
        "WS" => ["country" => "Samoa", "continent" => "Oceania"],
        "SM" => ["country" => "San Marino", "continent" => "Europe"],
        "ST" => ["country" => "Sao Tome and Principe", "continent" => "Africa"],
        "SA" => ["country" => "Saudi Arabia", "continent" => "Asia"],
        "SN" => ["country" => "Senegal", "continent" => "Africa"],
        "RS" => ["country" => "Serbia", "continent" => "Europe"],
        "SC" => ["country" => "Seychelles", "continent" => "Africa"],
        "SL" => ["country" => "Sierra Leone", "continent" => "Africa"],
        "SG" => ["country" => "Singapore", "continent" => "Asia"],
        "SK" => ["country" => "Slovakia", "continent" => "Europe"],
        "SI" => ["country" => "Slovenia", "continent" => "Europe"],
        "SB" => ["country" => "Solomon Islands", "continent" => "Oceania"],
        "SO" => ["country" => "Somalia", "continent" => "Africa"],
        "ZA" => ["country" => "South Africa", "continent" => "Africa"],
        "GS" => ["country" => "South Georgia and The South Sandwich Islands", "continent" => "Antarctica"],
        "ES" => ["country" => "Spain", "continent" => "Europe"],
        "LK" => ["country" => "Sri Lanka", "continent" => "Asia"],
        "SD" => ["country" => "Sudan", "continent" => "Africa"],
        "SR" => ["country" => "Suriname", "continent" => "South America"],
        "SJ" => ["country" => "Svalbard and Jan Mayen", "continent" => "Europe"],
        "SZ" => ["country" => "Swaziland", "continent" => "Africa"],
        "SE" => ["country" => "Sweden", "continent" => "Europe"],
        "CH" => ["country" => "Switzerland", "continent" => "Europe"],
        "SY" => ["country" => "Syrian Arab Republic", "continent" => "Asia"],
        "TW" => ["country" => "Taiwan, Province of China", "continent" => "Asia"],
        "TJ" => ["country" => "Tajikistan", "continent" => "Asia"],
        "TZ" => ["country" => "Tanzania, United Republic of", "continent" => "Africa"],
        "TH" => ["country" => "Thailand", "continent" => "Asia"],
        "TL" => ["country" => "Timor-leste", "continent" => "Asia"],
        "TG" => ["country" => "Togo", "continent" => "Africa"],
        "TK" => ["country" => "Tokelau", "continent" => "Oceania"],
        "TO" => ["country" => "Tonga", "continent" => "Oceania"],
        "TT" => ["country" => "Trinidad and Tobago", "continent" => "North America"],
        "TN" => ["country" => "Tunisia", "continent" => "Africa"],
        "TR" => ["country" => "Turkey", "continent" => "Asia"],
        "TM" => ["country" => "Turkmenistan", "continent" => "Asia"],
        "TC" => ["country" => "Turks and Caicos Islands", "continent" => "North America"],
        "TV" => ["country" => "Tuvalu", "continent" => "Oceania"],
        "UG" => ["country" => "Uganda", "continent" => "Africa"],
        "UA" => ["country" => "Ukraine", "continent" => "Europe"],
        "AE" => ["country" => "United Arab Emirates", "continent" => "Asia"],
        "GB" => ["country" => "United Kingdom", "continent" => "Europe"],
        "US" => ["country" => "United States", "continent" => "North America"],
        "UM" => ["country" => "United States Minor Outlying Islands", "continent" => "Oceania"],
        "UY" => ["country" => "Uruguay", "continent" => "South America"],
        "UZ" => ["country" => "Uzbekistan", "continent" => "Asia"],
        "VU" => ["country" => "Vanuatu", "continent" => "Oceania"],
        "VE" => ["country" => "Venezuela", "continent" => "South America"],
        "VN" => ["country" => "Viet Nam", "continent" => "Asia"],
        "VG" => ["country" => "Virgin Islands, British", "continent" => "North America"],
        "VI" => ["country" => "Virgin Islands, U.S.", "continent" => "North America"],
        "WF" => ["country" => "Wallis and Futuna", "continent" => "Oceania"],
        "EH" => ["country" => "Western Sahara", "continent" => "Africa"],
        "YE" => ["country" => "Yemen", "continent" => "Asia"],
        "ZM" => ["country" => "Zambia", "continent" => "Africa"],
        "ZW" => ["country" => "Zimbabwe", "continent" => "Africa"]
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
	        'placeholder' => false,
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
	    
	    if($options['placeholder']) {
	        // try to "fake" a placeholder
	        $placeholder = $options['placeholder'];
	        if($placeholder === true) {
	            $placeholder = 'Choose';
	        }
	        
	        array_unshift($list, ['text' => $placeholder, 'value' => '', 'disabled' => 'disabled', 'selected' => 'selected', 'hidden' => 'hidden']);
	       // <option value="" disabled selected>Select your option</option>
	    }
	    
	    return $list;
	}
	
	
	/**
	 * Returns a list of countries suitable for select/dropdowns
	 * Use in views, like so:
	 * echo $this->Form->input('country', ['type' => 'select', 'options' => $this->AvGeo->listCountries(), 'empty' => true]);
	 * @param array $options
	 *     possible replacements: {{abbr}} {{name}} {{continent}}
	 *     keyFormat - specify format for key 
	 *     valueFormat - what user will see (in select list)
	 * @return mixed[]
	 */
	public function listCountries(array $options = []) {
	    $default_options = [
			'first' => ['US', 'CA'],	// list of states to move to the top of the list
	        'keyFormat' => '{{abbr}}',
	        'valueFormat' => '{{name}} ({{abbr}})',
	    ];
	    $options = Hash::merge($default_options, $options);
	    
	    $list = [];
	    foreach($this->_countryList as $abbr => $country) {
	        $key = str_ireplace('{{abbr}}', $abbr, $options['keyFormat']);
	        $value = str_ireplace('{{abbr}}', $abbr, $options['valueFormat']);
	        
	        $key = str_ireplace('{{name}}', $country['country'], $key);
	        $value = str_ireplace('{{name}}', $country['country'], $value);
	        
	        $key = str_ireplace('{{continent}}', $country['continent'], $key);
	        $value = str_ireplace('{{continent}}', $country['continent'], $value);
	        
	        $list[$key] = $value;
	    }
		
		if($options['first']) {
			$newList = [];
			foreach((array) $options['first'] as $key) {
				if(isset($list[$key])) {
					$newList[$key] = $list[$key];
					unset($list[$key]);
				}
			}
			
			if($newList) {
				// merge with $list
				$list = array_merge($newList, $list);
			}
			
		}
	    
	    return $list;
	}
}